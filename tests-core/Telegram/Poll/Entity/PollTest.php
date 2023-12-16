<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Poll\Entity;

use Core\Telegram\Message\Entity\{MessageEntities, MessageEntity};
use Core\Telegram\Poll\Entity\{Poll, PollOption, PollOptions,};
use PHPUnit\Framework\TestCase;

class PollTest extends TestCase
{
    public function testGetValues()
    {
        $object = new Poll(
            new Poll\Id('id'),
            new Poll\Question('question'),
            new PollOptions([
                new PollOption(
                    new PollOption\Text('text1'),
                    new PollOption\VoterCount(10)
                ),
            ]),
            new Poll\TotalVoterCount(11),
            new Poll\IsClosed(true),
            new Poll\IsAnonymous(true),
            new Poll\Type('type'),
            new Poll\AllowsMultipleAnswers(true),
            new PollOption\Id(12),
            new Poll\Explanation('explanation'),
            new MessageEntities([
                new MessageEntity(
                    new MessageEntity\Type('pre'),
                    new MessageEntity\Offset(13),
                    new MessageEntity\Length(14),
                    null,
                    null,
                    new MessageEntity\Language('php'),
                    null
                )
            ]),
            new Poll\OpenPeriod(15),
            new Poll\Close(16)
        );

        $this->assertEquals(
            'id',
            $object->id->getValue()
        );

        $this->assertEquals(
            'question',
            $object->question->getValue()
        );

        $this->assertEquals(
            10,
            $object->options[0]->voterCount->getValue()
        );

        $this->assertEquals(
            11,
            $object->totalVoterCount->getValue()
        );

        $this->assertEquals(
            true,
            $object->isClosed->getValue()
        );

        $this->assertEquals(
            true,
            $object->isAnonymous->getValue()
        );

        $this->assertEquals(
            'type',
            $object->type->getValue()
        );

        $this->assertEquals(
            true,
            $object->allowsMultipleAnswers->getValue()
        );

        $this->assertEquals(
            12,
            $object->correctOptionId->getValue()
        );

        $this->assertEquals(
            'explanation',
            $object->explanation->getValue()
        );

        $this->assertEquals(
            'pre',
            $object->explanationEntities[0]->type->getValue()
        );

        $this->assertEquals(
            15,
            $object->openPeriod->getValue()
        );

        $this->assertEquals(
            16,
            $object->closeDate->getValue()
        );
    }
}
