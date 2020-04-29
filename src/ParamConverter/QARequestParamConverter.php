<?php declare(strict_types=1);

namespace App\ParamConverter;

use App\DTO\Request\CreateQARequest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class QARequestParamConverter.
 */
class QARequestParamConverter implements ParamConverterInterface
{
    public function apply(Request $request, ParamConverter $configuration)
    {
        $name = $configuration->getName();

        $request->attributes->set($name, new CreateQARequest($request));

        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function supports(ParamConverter $configuration)
    {
        return CreateQARequest::class === $configuration->getClass();
    }
}
