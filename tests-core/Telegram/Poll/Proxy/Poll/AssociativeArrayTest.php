<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Poll\Proxy\Poll;

use Core\Telegram\Poll\Proxy\Poll\AssociativeArray;
use Exception;
use PHPUnit\Framework\TestCase;

class AssociativeArrayTest extends TestCase
{
    /**
     * @throws Exception
     */
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
            'close_date' => 1677337596
        ]);

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
            12,
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
            13,
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
            16,
            $object->getOpenPeriod()->getValue()->s
        );

        $this->assertEquals(
            1677337596,
            $object->getCloseDate()->getValue()->getTimestamp()
        );
    }
}
