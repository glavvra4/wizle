<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Poll\Entity;

use Core\Telegram\Poll\Entity\Poll;
use Core\Telegram\Poll\Entity\PollAnswer;
use Core\Telegram\Poll\Entity\PollOption;
use Core\Telegram\Poll\Entity\PollOptionIds;
use Core\Telegram\User\Entity\User;
use PHPUnit\Framework\TestCase;

class PollAnswerTest extends TestCase
{
    public function testGetValues()
    {
        $userStub = $this->createStub(User::class);
        $userStub->method('getId')
            ->willReturn(new User\Id(10));

        $object = new PollAnswer(
            new Poll\Id('poll_id'),
            $userStub,
            new PollOptionIds([new PollOption\Id(11)])
        );

        $this->assertEquals(
            'poll_id',
            $object->getPollId()->getValue()
        );

        $this->assertEquals(
            10,
            $object->getUser()->getId()->getValue()
        );

        $this->assertEquals(
            11,
            $object->getOptionIds()[0]->getValue()
        );
    }
}
