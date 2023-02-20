<?php

declare(strict_types=1);

namespace Core\Tests\Common\Entity\Exception;

use Core\Color\Entity\Color;
use Core\Common\Entity\Exception\EntityException;
use PHPUnit\Framework\TestCase;

class EntityExceptionTest extends TestCase
{
    public function testCurrent()
    {
        $exception = new EntityException("test message", 0, new Color(0));

        self::assertInstanceOf(
            Color::class,
            $exception->getCurrent()
        );
    }
}
