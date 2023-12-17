<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Poll\Entity\Poll;

use Core\Telegram\Poll\Entity\Poll\{Exception\InvalidExplanationException, Explanation};
use PHPUnit\Framework\TestCase;

class ExplanationTest extends TestCase
{
    public function testGetValue()
    {
        $object = new Explanation('explanation');

        $this->assertEquals(
            'explanation',
            $object->getValue()
        );
    }

    public function testException()
    {
        $this->expectException(InvalidExplanationException::class);
        new Explanation('Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec.');
    }
}
