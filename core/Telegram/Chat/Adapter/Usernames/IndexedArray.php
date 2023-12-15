<?php

declare(strict_types=1);

namespace Core\Telegram\Chat\Adapter\Usernames;

use Core\Common\Adapter\BaseIndexedArray;
use Core\Telegram\Chat\Entity\Chat\Username;
use Core\Telegram\Chat\Entity\UsernamesInterface;
use Error;
use InvalidArgumentException;

class IndexedArray extends BaseIndexedArray implements UsernamesInterface
{
    private int $position = 0;

    /** @var array<UsernamesInterface>  */
    private array $container = [];

    /**
     * @param array<string> $data
     *
     * @throws InvalidArgumentException
     */
    public function __construct(array $data)
    {
        foreach ($data as $datum) {
            if (!is_string($datum)) {
                throw new InvalidArgumentException("Each element of \"data\" array must be a string");
            }

            $this->container[] = new Username($datum);
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
     * @return UsernamesInterface|null
     */
    public function offsetGet(mixed $offset): ?UsernamesInterface
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
     * @return UsernamesInterface
     */
    public function current(): UsernamesInterface
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
