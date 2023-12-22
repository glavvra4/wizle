<?php

declare(strict_types=1);

namespace Core\Telegram\Game\Proxy\Game;

use Core\Telegram\Game\Entity\Game;
use JetBrains\PhpStorm\ArrayShape;
use Core\Telegram\File\Proxy\PhotoSizes\IndexedArray as PhotoSizesIndexedArrayProxy;
use Core\Telegram\Message\Proxy\MessageEntities\IndexedArray as MessageEntitiesIndexedArrayProxy;
use Core\Telegram\File\Proxy\Animation\AssociativeArray as AnimationAssociativeArrayProxy;

class AssociativeArray extends Game
{
    public function __construct(
        #[ArrayShape([
            'title' => 'string',
            'description' => 'string',
            'photo' => 'array',
            'text' => 'string',
            'text_entities' => 'array',
            'animation' => 'array',
        ])] array $data
    )
    {
        parent::__construct(
            new Game\Title($data['title']),
            new Game\Description($data['description']),
            new PhotoSizesIndexedArrayProxy($data['photo']),
            isset($data['text'])
                ? new Game\Text($data['text'])
                : null,
            isset($data['text_entities'])
                ? new MessageEntitiesIndexedArrayProxy($data['text_entities'])
                : null,
            isset($data['animation'])
                ? new AnimationAssociativeArrayProxy($data['animation'])
                : null,
        );
    }
}
