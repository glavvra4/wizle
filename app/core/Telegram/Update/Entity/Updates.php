<?php

declare(strict_types=1);

namespace Core\Telegram\Update\Entity;

use InvalidArgumentException;
use LogicException;

class Updates implements UpdatesInterface
{
    private int $position = 0;

    /** @var array<Update> */
    private array $container = [];

    /**
     * @param array<Update> $entities
     */
    public function __construct(array $entities)
    {
        foreach ($entities as $entity) {
            if (!$entity instanceof Update) {
                throw new InvalidArgumentException("Each element of \"entities\" array must be an instance of Update");
            }

            $this->container[] = $entity;
        }

        $this->position = 0;
    }

    /**
     * @param mixed $offset
     *
     * @return Update|null
     */
    public function offsetGet(mixed $offset): ?Update
    {
        return ($this->offsetExists($offset))
            ? $this->container[$offset]
            : null;
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
     * @param mixed $value
     *
     * @return void
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        throw new LogicException("Can't set");
    }

    /**
     * @param mixed $offset
     *
     * @return void
     */
    public function offsetUnset(mixed $offset): void
    {
        throw new LogicException("Can't unset");
    }

    /**
     * @return Update
     */
    public function current(): Update
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

    /**
     * @return int
     */
    public function count(): int
    {
        return count($this->container);
    }
}
