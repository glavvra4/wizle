<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Payments\Proxy\ShippingOption;

use Core\Telegram\Payments\Proxy\ShippingOption\AssociativeArray;
use PHPUnit\Framework\TestCase;

class AssociativeArrayTest extends TestCase
{
    public function testGetValues()
    {
        $object = new AssociativeArray([
            'id' => 'id',
            'title' => 'title',
            'prices' => [
                [
                    'label' => 'label1',
                    'amount' => 10,
                ],
            ]
        ]);

        $this->assertEquals(
            'id',
            $object->id->getValue()
        );

        $this->assertEquals(
            'title',
            $object->title->getValue()
        );

        $this->assertEquals(
            'label1',
            $object->prices[0]->label->getValue()
        );
    }
}
