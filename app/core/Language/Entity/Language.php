<?php

declare(strict_types=1);

namespace Core\Language\Entity;

/** Language data object */
class Language implements LanguageInterface
{
    /**
     * @param Language\Title $title
     * @param Language\Subtag $subtag
     */
    public function __construct(
        public readonly Language\Title  $title,
        public readonly Language\Subtag $subtag
    )
    {
    }
}
