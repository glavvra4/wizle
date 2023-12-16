<?php

declare(strict_types=1);

namespace Core\Tests\Telegram\Game\Entity;

use Core\Telegram\File\Entity\{
    Animation,
    File,
    PhotoSize,
    PhotoSizes
};
use Core\Telegram\Game\Entity\Game;
use Core\Telegram\Message\Entity\{
    MessageEntities,
    MessageEntity
};
use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    public function testGetValues()
    {
        $object = new Game(
            new Game\Title('title'),
            new Game\Description('description'),
            new PhotoSizes([
                new PhotoSize(
                    new File\Id('photo_file_id1'),
                    new File\UniqueId('photo_file_unique_id1'),
                    new File\Dimension(10),
                    new File\Dimension(11)
                )
            ]),
            new Game\Text('text'),
            new MessageEntities([
                new MessageEntity(
                    new MessageEntity\Type('text_entities_type1'),
                    new MessageEntity\Offset(12),
                    new MessageEntity\Length(13),
                ),
            ]),
            new Animation(
                new File\Id('animation_file_id'),
                new File\UniqueId('animation_file_unique_id'),
                new File\Dimension(14),
                new File\Dimension(15),
                new File\Duration(16),
            )
        );

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
