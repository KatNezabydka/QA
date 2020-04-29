<?php declare(strict_types=1);

namespace App\Resolver;

use App\DTO\Request\RequestDTOInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ArgumentValueResolverInterface;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;

class RequestDTOResolver implements ArgumentValueResolverInterface
{
    public function supports(Request $request, ArgumentMetadata $argument)
    {
        $classImplements = class_implements($argument->getType());

        return false !== $classImplements && in_array(RequestDTOInterface::class, array_values($classImplements), true);
//        Другой путь переопределить через рефлексию
//        $reflection = new \ReflectionClass($argument->getType());
//        if ($reflection->implementsInterface(RequestDTOInterface::class)) {
//            return true;
//        }

//        return false;
    }

    public function resolve(Request $request, ArgumentMetadata $argument)
    {
        // creating new instance of custom request DTO
        $class = $argument->getType();
        yield new $class($request);
    }
}
