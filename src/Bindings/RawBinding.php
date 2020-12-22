<?php

namespace uMotif\JsonDecoder\Bindings;

use uMotif\JsonDecoder\Binding;
use uMotif\JsonDecoder\JsonDecoder;
use uMotif\JsonDecoder\Property;

class RawBinding extends Binding
{
    /**
     * RawBinding constructor.
     */
    public function __construct(string $property)
    {
        parent::__construct($property, null, null, false);
    }

    /**
     * {@inheritdoc}
     */
    public function validate(array $jsonData): bool
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function bind(JsonDecoder $jsonDecoder, ?array $jsonData, Property $property)
    {
        if (array_key_exists($this->property, $jsonData)) {
            $property->set($jsonData[$this->property]);
        }
    }
}
