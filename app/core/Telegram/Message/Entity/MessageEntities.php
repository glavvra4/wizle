<?php

declare(strict_types=1);

namespace Core\Telegram\Message\Entity;

use InvalidArgumentException;
use LogicException;

class MessageEntities implements MessageEntitiesInterface
{
    private int $position;

    /** @var array<MessageEntity> */
    private array $container;

    /**
     * @param array<MessageEntity> $entities
     */
    public function __construct(array $entities)
    {
        foreach ($entities as $entity) {
            if (!$entity instanceof MessageEntity) {
                throw new InvalidArgumentException("Each element of \"entities\" array must be an instance of MessageEntity");
            }

            $this->container[] = $entity;
        }

        $this->position = 0;
    }

    /**
     * @param mixed $offset
     *
     * @return MessageEntity|null
     */
    public function offsetGet(mixed $offset): ?MessageEntity
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
     * @return MessageEntity
     */
    public function current(): MessageEntity
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
