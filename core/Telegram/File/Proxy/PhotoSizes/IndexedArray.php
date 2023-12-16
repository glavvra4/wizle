<?php

declare(strict_types=1);

namespace Core\Telegram\File\Proxy\PhotoSizes;

use Core\Telegram\File\Entity\PhotoSizes;
use Core\Telegram\File\Proxy\PhotoSize\AssociativeArray as PhotoSizeAssociativeArrayProxy;
use InvalidArgumentException;

class IndexedArray extends PhotoSizes
{
    /**
     * @param array<array> $data
     */
    public function __construct(array $data)
    {
        $entities = [];
        foreach ($data as $datum) {
            if (!is_array($datum)) {
                throw new InvalidArgumentException("Each element of \"data\" array must be an array");
            }

            $entities[] = new PhotoSizeAssociativeArrayProxy($datum);
        }

        parent::__construct($entities);
    }
}
