<?php

declare(strict_types=1);

namespace Core\Common\Proxy;

use Core\Common\Proxy\Exception\EmptyProxyDataException;
use Core\Common\Proxy\Exception\InvalidProxyDataTypeException;

interface IndexedArrayInterface
{
    public function __construct(array $data);
}
