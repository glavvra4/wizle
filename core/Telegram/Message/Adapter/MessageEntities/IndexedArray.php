<?php

declare(strict_types=1);

namespace Core\Telegram\Message\Adapter\MessageEntities;

use Core\Common\Adapter\BaseIndexedArray;
use Core\Telegram\Message\Adapter\MessageEntity\AssociativeArray as MessageEntityAssociativeArrayAdapter;
use Core\Telegram\Message\Entity\MessageEntitiesInterface;
use Core\Telegram\Message\Entity\MessageEntityInterface;
use Error;
use InvalidArgumentException;

class IndexedArray extends BaseIndexedArray implements MessageEntitiesInterface
{
    private int $position = 0;

    /** @var array<MessageEntityInterface>  */
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

            $this->container[] = new MessageEntityAssociativeArrayAdapter($datum);
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
     * @return MessageEntityInterface|null
     */
    public function offsetGet(mixed $offset): ?MessageEntityInterface
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
     * @return MessageEntityInterface
     */
    public function current(): MessageEntityInterface
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
