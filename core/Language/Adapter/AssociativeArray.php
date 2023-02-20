<?php

declare(strict_types=1);

namespace Core\Language\Adapter;

use Core\Common\Adapter\InvalidAdapterDataException;
use Core\Language\Entity\Language;
use Core\Language\Entity\LanguageInterface;

readonly class AssociativeArray extends Language implements LanguageInterface
{
    private const TYPES_MAPPING = [
        'title' => 'string',
        'subtag' => 'string'
    ];

    /**
     * @param array{title: string, subtag: string} $data
     */
    public function __construct(array $data)
    {
        foreach (self::TYPES_MAPPING as $key => $type) {
            if (!array_key_exists($key, $data)) {
                throw new InvalidAdapterDataException(
                    sprintf("Key \"%s\" is mandatory in \"data\" array", $key)
                );
            }

            if (gettype($data[$key]) !== $type) {
                throw new InvalidAdapterDataException(
                    sprintf("The type of \"%s\" value in \"data\" array must be %s, %s given", $key, $type, gettype($data[$key]))
                );
            }
        }

        parent::__construct(
            new Language\Title($data['title']),
            new Language\Subtag($data['subtag'])
        );
    }
}
