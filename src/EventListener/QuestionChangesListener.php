<?php declare(strict_types=1);

namespace App\EventListener;

use App\Entity\QuestionAnswer;
use App\Entity\QuestionHistoric;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\OnFlushEventArgs;
use Doctrine\ORM\Events;
use Doctrine\ORM\UnitOfWork;
use Elao\Enum\EnumInterface;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;

final class QuestionChangesListener implements EventSubscriber
{
    use HandleTrait;

    public function __construct(MessageBusInterface $messageBus)
    {
        $this->messageBus = $messageBus;
    }

    public function getSubscribedEvents(): array
    {
        return [Events::onFlush];
    }

    public function onFlush(OnFlushEventArgs $args): void
    {
        $entityManager = $args->getEntityManager();
        $unitOfWork = $entityManager->getUnitOfWork();
        $updatedEntities = $unitOfWork->getScheduledEntityUpdates();

        foreach ($updatedEntities as $updatedEntity) {
            if (!$updatedEntity instanceof QuestionAnswer) {
                continue;
            }

            if (null === $updatedEntity->getId()) {
                continue;
            }

            $this->processChanges($unitOfWork, $updatedEntity);
        }
    }

    public function processChanges(UnitOfWork $unitOfWork, QuestionAnswer $updatedEntity): void
    {
        $entityChangeSet = $unitOfWork->getEntityChangeSet($updatedEntity);

        foreach ($entityChangeSet as $changeField => $changes) {
            $changedFrom = ($changes[0] instanceof EnumInterface ?
                        $changes[0]->getValue() :
                        $changes[0]) ?? '';
            $changedTo = ($changes[1] instanceof EnumInterface ?
                        $changes[1]->getValue() :
                        $changes[1]) ?? '';

            if ($changedFrom === $changedTo) {
                continue;
            }

            $questionHistory = (new QuestionHistoric())
                ->setQuestionId($updatedEntity->getId())
                ->setFieldName($changeField)
                ->setChangedFrom($changedFrom)
                ->setChangedTo($changedTo)
                ->setChangeDate($updatedEntity->getUpdated());

//            $this->handle($questionHistory); // todo: should use queue

            $this->messageBus->dispatch($questionHistory);
        }
    }
}
