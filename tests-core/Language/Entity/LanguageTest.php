<?php

declare(strict_types=1);

namespace Core\Tests\Language\Entity;

use Core\Language\Entity\Language;
use PHPUnit\Framework\TestCase;

class LanguageTest extends TestCase
{
    public function testGetValue()
    {
        $object = new Language(
            new Language\Title('Arabic'),
            new Language\Subtag('ar')
        );

        $this->assertEquals(
            'Arabic',
            $object->getTitle()->getValue()
        );

        $this->assertEquals(
            'ar',
            $object->getSubtag()->getValue()
        );
    }
}
