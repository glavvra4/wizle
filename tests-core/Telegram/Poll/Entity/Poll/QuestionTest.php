<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Poll\Entity\Poll;

use Core\Telegram\Poll\Entity\Poll\{Exception\InvalidQuestionException, Question};
use PHPUnit\Framework\TestCase;

class QuestionTest extends TestCase
{
    public function testGetValue()
    {
        $object = new Question('question');

        $this->assertEquals(
            'question',
            $object->getValue()
        );
    }

    public function testException()
    {
        $this->expectException(InvalidQuestionException::class);
        new Question('');
    }
}
