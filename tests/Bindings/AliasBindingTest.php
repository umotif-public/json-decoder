<?php

namespace uMotif\JsonDecoder\Tests\Bindings;

use uMotif\JsonDecoder\Bindings\AliasBinding;
use uMotif\JsonDecoder\JsonDecoder;
use uMotif\JsonDecoder\Property;
use uMotif\JsonDecoder\Tests\Fakes\Person;
use PHPUnit\Framework\TestCase;

class AliasBindingTest extends TestCase
{
    /** @test */
    public function it_aliases_a_field()
    {
        $binding  = new AliasBinding('firstname', 'first-name');
        $person   = new Person();
        $property = Property::create($person, 'firstname');

        $binding->bind(new JsonDecoder(), ['first-name' => 'John'], $property);

        $this->assertEquals('John', $person->firstname());
    }

    /** @test */
    public function it_skips_a_not_available_field()
    {
        $binding  = new AliasBinding('lastname', 'lastname');
        $person   = new Person();
        $property = Property::create($person, 'firstname');

        $binding->bind(new JsonDecoder(), ['first-name' => 'John'], $property);

        $this->assertNull($person->firstname());
        $this->assertNull($person->lastname());
    }
}
