<?php

namespace uMotif\JsonDecoder\Tests\Bindings;

use uMotif\JsonDecoder\Bindings\RawBinding;
use uMotif\JsonDecoder\JsonDecoder;
use uMotif\JsonDecoder\Property;
use uMotif\JsonDecoder\Tests\Fakes\Person;
use PHPUnit\Framework\TestCase;

class RawBindingTest extends TestCase
{
    /** @test */
    public function it_sets_a_raw_value()
    {
        $binding  = new RawBinding('firstname');
        $person   = new Person();
        $property = Property::create($person, 'firstname');

        $binding->bind(new JsonDecoder(), ['firstname' => 'John'], $property);

        $this->assertEquals('John', $person->firstname());
    }

    /** @test */
    public function it_ignores_a_not_existing_property()
    {
        $binding  = new RawBinding('firstname');
        $person   = new Person();
        $property = Property::create($person, 'firstname');

        $binding->bind(new JsonDecoder(), [], $property);

        $this->assertNull($person->firstname());
    }

    /** @test */
    public function it_always_validates_to_true()
    {
        $binding = new RawBinding('firstname');

        $this->assertTrue($binding->validate([]));
    }
}
