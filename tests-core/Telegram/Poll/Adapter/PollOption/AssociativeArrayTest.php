<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Poll\Adapter\PollOption;

use Core\Telegram\Poll\Adapter\PollOption\AssociativeArray;
use PHPUnit\Framework\TestCase;

class AssociativeArrayTest extends TestCase
{
    public function testGetValues()
    {
        $object = new AssociativeArray([
            'text' => 'text',
            'voter_count' => 10
        ]);

        $this->assertEquals(
            'text',
            $object->getText()->getValue()
        );

        $this->assertEquals(
            10,
            $object->getVoterCount()->getValue()
        );
    }
}
