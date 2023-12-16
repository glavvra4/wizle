<?php

declare(strict_types=1);

namespace Core\Telegram\Payments\Proxy\LabeledPrices;

use Core\Telegram\Payments\Entity\LabeledPrices;
use Core\Telegram\Payments\Proxy\LabeledPrice\AssociativeArray as LabeledPriceAssociativeArrayProxy;
use InvalidArgumentException;

class IndexedArray extends LabeledPrices
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

            $entities[] = new LabeledPriceAssociativeArrayProxy($datum);
        }

        parent::__construct($entities);
    }
}
