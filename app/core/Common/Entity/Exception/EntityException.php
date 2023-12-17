<?php

declare(strict_types=1);

namespace Core\Common\Entity\Exception;

use DomainException;

class EntityException extends DomainException
{
    protected ?object $current;

    /**
     * @param string $message
     * @param int $code
     * @param object|null $current
     */
    public function __construct(string $message = "", int $code = 0, object $current = null)
    {
        $this->current = $current;

        parent::__construct($message, $code);
    }

    /**
     * @return object|null
     */
    public function getCurrent(): ?object
    {
        return $this->current;
    }
}
