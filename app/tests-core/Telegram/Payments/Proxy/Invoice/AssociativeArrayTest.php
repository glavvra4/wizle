<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Payments\Proxy\Invoice;

use Core\Telegram\Payments\Proxy\Invoice\AssociativeArray;
use PHPUnit\Framework\TestCase;

class AssociativeArrayTest extends TestCase
{
    public function testGetValues()
    {
        $object = new AssociativeArray([
            'title' => 'title',
            'description' => 'description',
            'start_parameter' => 'start_parameter',
            'currency' => 'RUB',
            'total_amount' => 10
        ]);

        $this->assertEquals(
            'title',
            $object->title->getValue()
        );

        $this->assertEquals(
            'description',
            $object->description->getValue()
        );

        $this->assertEquals(
            'start_parameter',
            $object->startParameter->getValue()
        );

        $this->assertEquals(
            'RUB',
            $object->currency->getValue()
        );

        $this->assertEquals(
            10,
            $object->totalAmount->getValue()
        );
    }
}
