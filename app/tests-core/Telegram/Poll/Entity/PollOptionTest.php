<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Poll\Entity;

use Core\Telegram\Poll\Entity\PollOption;
use PHPUnit\Framework\TestCase;

class PollOptionTest extends TestCase
{
    public function testGetValues()
    {
        $object = new PollOption(
            new PollOption\Text('text'),
            new PollOption\VoterCount(10)
        );

        $this->assertEquals(
            'text',
            $object->text->getValue()
        );

        $this->assertEquals(
            10,
            $object->voterCount->getValue()
        );
    }
}
