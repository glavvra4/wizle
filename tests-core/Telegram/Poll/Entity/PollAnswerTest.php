<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Poll\Entity;

use Core\Language\Entity\Language;
use Core\Telegram\Poll\Entity\{Poll, PollAnswer, PollOption, PollOptionIds};
use Core\Telegram\User\Entity\User;
use PHPUnit\Framework\TestCase;

class PollAnswerTest extends TestCase
{
    public function testGetValues()
    {
        $object = new PollAnswer(
            new Poll\Id('poll_id'),
            new User(
                new User\Id(10),
                new User\IsBot(false),
                new User\FirstName('first_name'),
            ),
            new PollOptionIds([new PollOption\Id(11)])
        );

        $this->assertEquals(
            'poll_id',
            $object->pollId->getValue()
        );

        $this->assertEquals(
            10,
            $object->user->id->getValue()
        );

        $this->assertEquals(
            11,
            $object->optionIds[0]->getValue()
        );
    }
}
