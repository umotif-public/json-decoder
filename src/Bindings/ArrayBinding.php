<?php

namespace uMotif\JsonDecoder\Bindings;

use uMotif\JsonDecoder\Binding;
use uMotif\JsonDecoder\JsonDecoder;
use uMotif\JsonDecoder\Property;

class ArrayBinding extends Binding
{
    /**
     * {@inheritdoc}
     */
    public function bind(JsonDecoder $jsonDecoder, ?array $jsonData, Property $property)
    {
        if (array_key_exists($this->jsonField, $jsonData)) {
            $data   = $jsonData[$this->jsonField];
            $values = [];

            if (is_array($data)) {
                foreach ($data as $item) {
                    $values[] = $jsonDecoder->decodeArray($item, $this->type);
                }

                $property->set($values);
            }
        }
    }
}
