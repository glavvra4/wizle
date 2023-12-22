<?php

declare(strict_types=1);

namespace Core\Telegram\Sticker\Entity;

class MaskPosition implements MaskPositionInterface
{
    /**
     * @param MaskPosition\Point $point
     * @param MaskPosition\XShift $xShift
     * @param MaskPosition\YShift $yShift
     * @param MaskPosition\Scale $scale
     */
    public function __construct(
        public readonly MaskPosition\Point  $point,
        public readonly MaskPosition\XShift $xShift,
        public readonly MaskPosition\YShift $yShift,
        public readonly MaskPosition\Scale  $scale
    )
    {
    }
}
