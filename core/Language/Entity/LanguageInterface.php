<?php

declare(strict_types=1);

namespace Core\Language\Entity;

interface LanguageInterface
{
    public function getTitle(): Language\Title;
    public function getSubtag(): Language\Subtag;
}
