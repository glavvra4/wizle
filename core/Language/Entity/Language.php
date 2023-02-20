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
        protected Language\Title $title,
        protected Language\Subtag $subtag
    )
    {
    }

    /**
     * @return Language\Title
     */
    public function getTitle(): Language\Title
    {
        return $this->title;
    }

    /**
     * @return Language\Subtag
     */
    public function getSubtag(): Language\Subtag
    {
        return $this->subtag;
    }
}
