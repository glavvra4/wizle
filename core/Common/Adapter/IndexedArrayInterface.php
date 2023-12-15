<?php

declare(strict_types=1);

namespace Core\Common\Adapter;

use Core\Common\Adapter\Exception\EmptyAdapterDataException;
use Core\Common\Adapter\Exception\InvalidAdapterDataTypeException;

interface IndexedArrayInterface
{
    public function __construct(array $data);
}
