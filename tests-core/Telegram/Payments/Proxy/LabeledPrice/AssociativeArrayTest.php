<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Payments\Proxy\LabeledPrice;

use Core\Telegram\Payments\Proxy\LabeledPrice\AssociativeArray;
use PHPUnit\Framework\TestCase;

class AssociativeArrayTest extends TestCase
{
    public function testGetValues()
    {
        $object = new AssociativeArray([
            'label' => 'label',
            'amount' => 10,
        ]);

        $this->assertEquals(
            'label',
            $object->label->getValue()
        );

        $this->assertEquals(
            10,
            $object->amount->getValue()
        );
    }
}
