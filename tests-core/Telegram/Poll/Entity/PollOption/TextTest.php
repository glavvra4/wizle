<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Poll\Entity\PollOption;

use Core\Telegram\Poll\Entity\PollOption\Exception\InvalidTextException;
use Core\Telegram\Poll\Entity\PollOption\Text;
use PHPUnit\Framework\TestCase;

class TextTest extends TestCase
{
    public function testGetValue()
    {
        $object = new Text('text');

        $this->assertEquals(
            'text',
            $object->getValue()
        );
    }

    public function testException()
    {
        $this->expectException(InvalidTextException::class);
        new Text('');
    }
}
