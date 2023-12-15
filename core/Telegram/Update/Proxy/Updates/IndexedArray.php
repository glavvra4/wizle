<?php

declare(strict_types=1);

namespace Core\Telegram\Update\Proxy\Updates;

use Core\Common\Proxy\BaseIndexedArray;
use Core\Telegram\Update\Proxy\Update\AssociativeArray as UpdateAssociativeArrayProxy;
use Core\Telegram\Update\Entity\UpdateInterface;
use Core\Telegram\Update\Entity\UpdatesInterface;
use Error;
use InvalidArgumentException;

class IndexedArray extends BaseIndexedArray implements UpdatesInterface
{
    private int $position = 0;

    /** @var array<UpdateInterface>  */
    private array $container = [];

    /**
     * @param array<array> $data
     *
     * @throws InvalidArgumentException
     */
    public function __construct(array $data)
    {
        foreach ($data as $datum) {
            if (!is_array($datum)) {
                throw new InvalidArgumentException("Each element of \"data\" array must be an array");
            }

            $this->container[] = new UpdateAssociativeArrayProxy($datum);
        }

        $this->position = 0;
    }

    /**
     * @param mixed $offset
     *
     * @return bool
     */
    public function offsetExists(mixed $offset): bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * @param mixed $offset
     *
     * @return UpdateInterface|null
     */
    public function offsetGet(mixed $offset): ?UpdateInterface
    {
        return ($this->offsetExists($offset))
            ? $this->container[$offset]
            : null;
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     *
     * @return void
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        throw new Error("Can't set");
    }

    /**
     * @param mixed $offset
     *
     * @return void
     */
    public function offsetUnset(mixed $offset): void
    {
        throw new Error("Can't unset");
    }

    /**
     * @return UpdateInterface
     */
    public function current(): UpdateInterface
    {
        return $this->container[$this->position];
    }

    /**
     * @return void
     */
    public function next(): void
    {
        ++$this->position;
    }

    /**
     * @return int
     */
    public function key(): int
    {
        return $this->position;
    }

    /**
     * @return bool
     */
    public function valid(): bool
    {
        return isset($this->container[$this->position]);
    }

    /**
     * @return void
     */
    public function rewind(): void
    {
        $this->position = 0;
    }
}
