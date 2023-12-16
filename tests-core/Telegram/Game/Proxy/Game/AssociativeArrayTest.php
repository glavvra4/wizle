<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Game\Proxy\Game;

use Core\Telegram\Game\Proxy\Game\AssociativeArray;
use PHPUnit\Framework\TestCase;

class AssociativeArrayTest extends TestCase
{
    public function testGetValues()
    {
        $object = new AssociativeArray([
            'title' => 'title',
            'description' => 'description',
            'photo' => [
                [
                    'file_id' => 'photo_file_id1',
                    'file_unique_id' => 'photo_file_unique_id1',
                    'width' => 10,
                    'height' => 11,
                ]
            ],
            'text' => 'text',
            'text_entities' => [
                [
                    'type' => 'text_entities_type1',
                    'offset' => 12,
                    'length' => 13,
                ]
            ],
            'animation' => [
                'file_id' => 'animation_file_id',
                'file_unique_id' => 'animation_file_unique_id',
                'width' => 14,
                'height' => 15,
                'duration' => 16
            ],
        ]);

        $this->assertEquals(
            'title',
            $object->title->getValue()
        );

        $this->assertEquals(
            'description',
            $object->description->getValue()
        );

        $this->assertEquals(
            'photo_file_id1',
            $object->photo[0]->fileId->getValue()
        );

        $this->assertEquals(
            'text',
            $object->text->getValue()
        );

        $this->assertEquals(
            'text_entities_type1',
            $object->textEntities[0]->type->getValue()
        );

        $this->assertEquals(
            'animation_file_id',
            $object->animation->fileId->getValue()
        );
    }
}
