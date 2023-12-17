<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Poll\Proxy\Poll;

use Core\Telegram\Poll\Proxy\Poll\AssociativeArray;
use Exception;
use PHPUnit\Framework\TestCase;

class AssociativeArrayTest extends TestCase
{
    public function testGetValues()
    {
        $object = new AssociativeArray([
            'id' => 'id',
            'question' => 'question',
            'options' => [
                [
                    'text' => 'text',
                    'voter_count' => 10
                ],
                [
                    'text' => 'text',
                    'voter_count' => 11
                ]
            ],
            'total_voter_count' => 12,
            'is_closed' => true,
            'is_anonymous' => true,
            'type' => 'type',
            'allows_multiple_answers' => true,
            'correct_option_id' => 13,
            'explanation' => 'explanation',
            'explanation_entities' => [
                [
                    'type' => 'hashtag',
                    'offset' => 14,
                    'length' => 15,
                ]
            ],
            'open_period' => 16,
            'close_date' => 17
        ]);

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
            12,
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
            13,
            $object->correctOptionId->getValue()
        );

        $this->assertEquals(
            'explanation',
            $object->explanation->getValue()
        );

        $this->assertEquals(
            'hashtag',
            $object->explanationEntities[0]->type->getValue()
        );

        $this->assertEquals(
            16,
            $object->openPeriod->getValue()
        );

        $this->assertEquals(
            17,
            $object->closeDate->getValue()
        );
    }
}
