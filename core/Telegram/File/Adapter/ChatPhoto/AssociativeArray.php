<?php

declare(strict_types=1);

namespace Core\Telegram\File\Adapter\ChatPhoto;

use Core\Telegram\File\Entity\ChatPhoto;
use Core\Telegram\File\Entity\File;

class AssociativeArray extends \Core\Common\Adapter\BaseAssociativeArray implements \Core\Telegram\File\Entity\ChatPhotoInterface
{
    protected ChatPhoto $chatPhoto;

    /**
     * @inheritDoc
     */
    protected function getFieldTypes(): array
    {
        return [
            'small_file_id' => 'string',
            'small_file_unique_id' => 'string',
            'big_file_id' => 'string',
            'big_file_unique_id' => 'string'
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getMandatoryFields(): array
    {
        return [
            'small_file_id',
            'small_file_unique_id',
            'big_file_id',
            'big_file_unique_id'
        ];
    }

    /**
     * @param array{small_file_id: string, small_file_unique_id: string, big_file_id: string, big_file_unique_id: string} $data
     */
    public function __construct(array $data)
    {
        $this->validateFields($data);

        $this->chatPhoto = new ChatPhoto(
            new File\Id($data['small_file_id']),
            new File\UniqueId($data['small_file_unique_id']),
            new File\Id($data['big_file_id']),
            new File\UniqueId($data['big_file_unique_id'])
        );
    }

    public function getSmallFileId(): File\Id
    {
        return $this->chatPhoto->getSmallFileId();
    }

    public function getSmallFileUniqueId(): File\UniqueId
    {
        return $this->chatPhoto->getSmallFileUniqueId();
    }

    public function getBigFileId(): File\Id
    {
        return $this->chatPhoto->getBigFileId();
    }

    public function getBigFileUniqueId(): File\UniqueId
    {
        return $this->chatPhoto->getBigFileUniqueId();
    }
}
