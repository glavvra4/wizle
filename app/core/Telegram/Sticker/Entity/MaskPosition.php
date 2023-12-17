<?php

declare(strict_types=1);

namespace Core\Telegram\Sticker\Entity;

readonly class MaskPosition implements MaskPositionInterface
{
    /**
     * @param MaskPosition\Point $point
     * @param MaskPosition\XShift $xShift
     * @param MaskPosition\YShift $yShift
     * @param MaskPosition\Scale $scale
     */
    public function __construct(
        public MaskPosition\Point  $point,
        public MaskPosition\XShift $xShift,
        public MaskPosition\YShift $yShift,
        public MaskPosition\Scale  $scale
    )
    {
    }
}
