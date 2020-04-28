<?php declare(strict_types=1);

namespace App\Util;

use JMS\Serializer\ArrayTransformerInterface;
use JMS\Serializer\DeserializationContext;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerInterface;

trait JMSSerializerAwareTrait
{
    /**
     * @var ArrayTransformerInterface|SerializerInterface
     */
    private $jmsSerializer;

    /**
     * @required
     *
     * @param SerializerInterface $jmsSerializer
     */
    public function setSerializer(SerializerInterface $jmsSerializer): void
    {
        $this->jmsSerializer = $jmsSerializer;
    }

    /**
     * @param mixed                     $data
     * @param string                    $format
     * @param SerializationContext|null $context
     * @param string|null               $type
     *
     * @return string
     */
    public function serialize($data, string $format, ?SerializationContext $context = null, ?string $type = null): string
    {
        return $this->jmsSerializer->serialize($data, $format, $context, $type);
    }

    /**
     * @param string                      $data
     * @param string                      $type
     * @param string                      $format
     * @param DeserializationContext|null $context
     *
     * @return mixed
     */
    public function deserialize(string $data, string $type, string $format, ?DeserializationContext $context = null)
    {
        return $this->jmsSerializer->deserialize($data, $type, $format, $context);
    }

    /**
     * @param mixed                     $data
     * @param SerializationContext|null $context
     * @param string|null               $type
     *
     * @return array
     */
    public function toArray($data, ?SerializationContext $context = null, ?string $type = null): array
    {
        return $this->jmsSerializer->toArray($data, $context, $type);
    }

    /**
     * @param array                       $data
     * @param string                      $type
     * @param DeserializationContext|null $context
     *
     * @return mixed
     */
    public function fromArray(array $data, string $type, ?DeserializationContext $context = null)
    {
        return $this->jmsSerializer->fromArray($data, $type, $context);
    }
}
