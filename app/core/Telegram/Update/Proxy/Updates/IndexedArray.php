<?php

declare(strict_types=1);

namespace Core\Telegram\Update\Proxy\Updates;

use Core\Telegram\Update\Entity\Updates;
use Core\Telegram\Update\Proxy\Update\AssociativeArray as UpdateAssociativeArrayProxy;
use InvalidArgumentException;

class IndexedArray extends Updates
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

            $entities[] = new UpdateAssociativeArrayProxy($datum);
        }

        parent::__construct($entities);
    }
}
