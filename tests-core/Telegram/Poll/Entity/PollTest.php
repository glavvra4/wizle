<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Poll\Entity;

use Core\Telegram\Message\Entity\MessageEntities;
use Core\Telegram\Message\Entity\MessageEntity;
use Core\Telegram\Poll\Entity\Poll;
use Core\Telegram\Poll\Entity\PollOption;
use Core\Telegram\Poll\Entity\PollOptions;
use DateInterval;
use DateTimeImmutable;
use PHPUnit\Framework\TestCase;

class PollTest extends TestCase
{
    public function testGetValues()
    {
        $pollOptionStub = $this->createStub(PollOption::class);
        $pollOptionStub->method('getVoterCount')
            ->willReturn(new PollOption\VoterCount(10));

        $explanationEntityStub = $this->createStub(MessageEntity::class);
        $explanationEntityStub->method('getType')
            ->willReturn(new MessageEntity\Type('hashtag'));

        $object = new Poll(
            new Poll\Id('id'),
            new Poll\Question('question'),
            new PollOptions([$pollOptionStub]),
            new Poll\TotalVoterCount(11),
            new Poll\IsClosed(true),
            new Poll\IsAnonymous(true),
            new Poll\Type('type'),
            new Poll\AllowsMultipleAnswers(true),
            new PollOption\Id(12),
            new Poll\Explanation('explanation'),
            new MessageEntities([$explanationEntityStub]),
            new Poll\OpenPeriod(new DateInterval('PT13S')),
            new Poll\CloseDate((new DateTimeImmutable())->setTimestamp(1677337596))
        );

        $this->assertEquals(
            'id',
            $object->getId()->getValue()
        );

        $this->assertEquals(
            'question',
            $object->getQuestion()->getValue()
        );

        $this->assertEquals(
            10,
            $object->getOptions()[0]->getVoterCount()->getValue()
        );

        $this->assertEquals(
            11,
            $object->getTotalVoterCount()->getValue()
        );

        $this->assertEquals(
            true,
            $object->getIsClosed()->getValue()
        );

        $this->assertEquals(
            true,
            $object->getIsAnonymous()->getValue()
        );

        $this->assertEquals(
            'type',
            $object->getType()->getValue()
        );

        $this->assertEquals(
            true,
            $object->getAllowsMultipleAnswers()->getValue()
        );

        $this->assertEquals(
            12,
            $object->getCorrectOptionId()->getValue()
        );

        $this->assertEquals(
            'explanation',
            $object->getExplanation()->getValue()
        );

        $this->assertEquals(
            'hashtag',
            $object->getExplanationEntities()[0]->getType()->getValue()
        );

        $this->assertEquals(
            13,
            $object->getOpenPeriod()->getValue()->s
        );

        $this->assertEquals(
            1677337596,
            $object->getCloseDate()->getValue()->getTimestamp()
        );
    }
}
