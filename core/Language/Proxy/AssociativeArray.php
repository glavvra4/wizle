<?php

declare(strict_types=1);

namespace Core\Language\Proxy;

use Core\Common\Proxy\BaseAssociativeArray;
use Core\Language\Entity\Language;
use Core\Language\Entity\LanguageInterface;

class AssociativeArray extends BaseAssociativeArray implements LanguageInterface
{
    protected Language $language;

    protected function getFieldTypes(): array
    {
        return [
            'title' => 'string',
            'subtag' => 'string'
        ];
    }

    protected function getMandatoryFields(): array
    {
        return [
            'title',
            'subtag'
        ];
    }

    /**
     * @param array{title: string, subtag: string} $data
     */
    public function __construct(array $data)
    {
        $this->validateFields($data);

        $this->language = new Language(
            new Language\Title($data['title']),
            new Language\Subtag($data['subtag'])
        );
    }

    public function getTitle(): Language\Title
    {
        return $this->language->getTitle();
    }

    public function getSubtag(): Language\Subtag
    {
        return $this->language->getSubtag();
    }
}
