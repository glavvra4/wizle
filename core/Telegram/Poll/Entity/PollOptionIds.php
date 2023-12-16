<?php

declare(strict_types=1);

namespace Core\Telegram\Poll\Entity;

use Error;
use InvalidArgumentException;

class PollOptionIds implements PollOptionIdsInterface
{
    private int $position;

    /** @var array<PollOption\Id> */
    private array $container;

    /**
     * @param array<PollOption\Id> $entities
     */
    public function __construct(array $entities)
    {
        foreach ($entities as $entity) {
            if (!$entity instanceof PollOption\Id) {
                throw new InvalidArgumentException("Each element of \"entities\" array must be an instance of Id");
            }

            $this->container[] = $entity;
        }

        $this->position = 0;
    }

    /**
     * @param mixed $offset
     *
     * @return PollOption\Id|null
     */
    public function offsetGet(mixed $offset): ?PollOption\Id
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
     * @return PollOption\Id
     */
    public function current(): PollOption\Id
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
