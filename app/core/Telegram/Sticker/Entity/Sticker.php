<?php

declare(strict_types=1);

namespace Core\Telegram\Sticker\Entity;

use Core\Telegram\File\Entity\{AbstractFile, File, PhotoSize};
use Core\Telegram\Sticker\Entity\StickerSet\Name;

class Sticker extends AbstractFile implements StickerInterface
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
        public readonly Sticker\Type             $type,
        public readonly File\Dimension           $width,
        public readonly File\Dimension           $height,
        public readonly Sticker\IsAnimated       $isAnimated,
        public readonly Sticker\IsVideo          $isVideo,
        public readonly ?PhotoSize               $thumbnail = null,
        public readonly ?Sticker\Emoji           $emoji = null,
        public readonly ?StickerSet\Name         $setName = null,
        public readonly ?File                    $premiumAnimation = null,
        public readonly ?MaskPosition            $maskPosition = null,
        public readonly ?Sticker\CustomEmojiId   $customEmojiId = null,
        public readonly ?Sticker\NeedsRepainting $needsRepainting = null,
        public readonly ?File\Size               $fileSize = null,
    )
    {
        parent::__construct(
            $fileId,
            $fileUniqueId
        );
    }
}
