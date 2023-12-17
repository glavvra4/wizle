<?php

declare(strict_types=1);

namespace Core\Telegram\Sticker\Entity;

use Core\Telegram\File\Entity\{AbstractFile, File, PhotoSize};
use Core\Telegram\Sticker\Entity\StickerSet\Name;

readonly class Sticker extends AbstractFile implements StickerInterface
{
    /**
     * @param File\Id $fileId
     * @param File\UniqueId $fileUniqueId
     * @param Sticker\Type $type
     * @param File\Dimension $width
     * @param File\Dimension $height
     * @param Sticker\IsAnimated $isAnimated
     * @param Sticker\IsVideo $isVideo
     * @param PhotoSize|null $thumbnail
     * @param Sticker\Emoji|null $emoji
     * @param Name|null $setName
     * @param File|null $premiumAnimation
     * @param MaskPosition|null $maskPosition
     * @param Sticker\CustomEmojiId|null $customEmojiId
     * @param Sticker\NeedsRepainting|null $needsRepainting
     * @param File\Size|null $fileSize
     */
    public function __construct(
        File\Id                         $fileId,
        File\UniqueId                   $fileUniqueId,
        public Sticker\Type             $type,
        public File\Dimension           $width,
        public File\Dimension           $height,
        public Sticker\IsAnimated       $isAnimated,
        public Sticker\IsVideo          $isVideo,
        public ?PhotoSize               $thumbnail = null,
        public ?Sticker\Emoji           $emoji = null,
        public ?StickerSet\Name         $setName = null,
        public ?File                    $premiumAnimation = null,
        public ?MaskPosition            $maskPosition = null,
        public ?Sticker\CustomEmojiId   $customEmojiId = null,
        public ?Sticker\NeedsRepainting $needsRepainting = null,
        public ?File\Size               $fileSize = null,
    )
    {
        parent::__construct(
            $fileId,
            $fileUniqueId
        );
    }
}
