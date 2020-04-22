<?php declare(strict_types=1);

namespace App\Resolver;

use App\DTO\Request\RequestDTOInterface;
use App\Util\ValidatorAwareTrait;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ArgumentValueResolverInterface;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;

class RequestDTOResolver implements ArgumentValueResolverInterface
{
    use ValidatorAwareTrait;

    /**
     * @param Request $request
     * @param ArgumentMetadata $argument
     * @return bool
     */
    public function supports(Request $request, ArgumentMetadata $argument)
    {
        try {
            $classImplements = class_implements($argument->getType());

            return $classImplements !== false && in_array(RequestDTOInterface::class, array_values($classImplements), true);
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * @param Request $request
     * @param ArgumentMetadata $argument
     * @return \Generator
     */
    public function resolve(Request $request, ArgumentMetadata $argument): \Generator
    {
        $class = $argument->getType();
        $dto = new $class($request);
        $this->validator->validate($dto);

        yield $dto;
    }
}
