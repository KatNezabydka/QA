<?php declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\QuestionHistoric;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $qh = (new QuestionHistoric())
            ->setQuestionId(1)
            ->setChangeDate(new \DateTime('2020-01-01 00:00:01'))
            ->setChangedFrom('test')
            ->setChangedTo('test edited')
            ->setFieldName('title');

        $manager->persist($qh);

        $manager->flush();
    }
}
