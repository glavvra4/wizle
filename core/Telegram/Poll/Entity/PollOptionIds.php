<?php

declare(strict_types=1);

namespace Core\Telegram\Poll\Entity;

use Core\Telegram\Poll\Entity\PollOption\Id as PollOptionId;
use Error;
use InvalidArgumentException;

class PollOptionIds implements PollOptionIdsInterface
{
    private int $position = 0;

    /** @var array<PollOptionId>  */
    private array $container = [];

    /**
     * @param array<PollOptionId> $entities
     *
     * @throws InvalidArgumentException
     */
    public function __construct(array $entities)
    {
        foreach ($entities as $entity) {
            if (!$entity instanceof PollOptionId) {
                throw new InvalidArgumentException("Each element of \"entities\" array must be an instance of Id");
            }

            $this->container[] = $entity;
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
     * @return PollOptionId|null
     */
    public function offsetGet(mixed $offset): ?PollOptionId
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
     * @return PollOptionId
     */
    public function current(): PollOptionId
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
