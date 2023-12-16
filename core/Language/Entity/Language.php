<?php

declare(strict_types=1);

namespace Core\Language\Entity;

/** Language data object */
readonly class Language implements LanguageInterface
{
    /**
     * @param Language\Title $title
     * @param Language\Subtag $subtag
     */
    public function __construct(
        public Language\Title  $title,
        public Language\Subtag $subtag
    )
    {
    }
}
