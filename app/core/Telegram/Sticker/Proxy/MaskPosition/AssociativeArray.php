<?php

declare(strict_types=1);

namespace Core\Telegram\Sticker\Proxy\MaskPosition;

use Core\Telegram\Sticker\Entity\MaskPosition;
use JetBrains\PhpStorm\ArrayShape;

readonly class AssociativeArray extends MaskPosition
{
    public function __construct(
        #[ArrayShape([
            'point' => 'string',
            'x_shift' => 'float',
            'y_shift' => 'float',
            'scale' => 'float',
        ])] array $data
    )
    {
        parent::__construct(
            new MaskPosition\Point($data['point']),
            new MaskPosition\XShift($data['x_shift']),
            new MaskPosition\YShift($data['y_shift']),
            new MaskPosition\Scale($data['scale'])
        );
    }
}
