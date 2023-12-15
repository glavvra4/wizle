<?php

declare(strict_types=1);

namespace Core\Telegram\File\Proxy\Audio;

use Core\Common\Proxy\BaseAssociativeArray;
use Core\Telegram\File\Proxy\PhotoSize;
use Core\Telegram\File\Entity\Audio;
use Core\Telegram\File\Entity\File;
use Core\Telegram\File\Entity\PhotoSizeInterface;
use DateInterval;
use Exception;

class AssociativeArray extends BaseAssociativeArray implements \Core\Telegram\File\Entity\AudioInterface
{
    protected Audio $audio;

    /**
     * @inheritDoc
     */
    protected function getFieldTypes(): array
    {
        return [
            'file_id' => 'string',
            'file_unique_id' => 'string',
            'duration' => 'integer',
            'performer' => 'string',
            'title'	=> 'string',
            'file_name'	=> 'string',
            'mime_type' => 'string',
            'file_size' => 'integer',
            'thumbnail' => 'array'
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getMandatoryFields(): array
    {
        return [
            'file_id',
            'file_unique_id',
            'duration'
        ];
    }

    /**
     * @param array{file_id: string, file_unique_id: string, duration: int, performer: string, title: string, file_name: string|null, mime_type: string|null, file_size: int|null, thumbnail: array|null} $data
     *
     * @throws File\Exception\InvalidSizeException if file_size is lower than 0
     * @throws Exception if invalid DateInterval data given
     */
    public function __construct(array $data)
    {
        $this->validateFields($data);

        $this->audio = new Audio(
            new File\Id($data['file_id']),
            new File\UniqueId($data['file_unique_id']),
            new File\Duration(new DateInterval('PT'.$data['duration'].'S')),
            (array_key_exists('performer', $data) && $data['performer'] !== null)
                ? new Audio\Performer($data['performer'])
                : null,
            (array_key_exists('title', $data) && $data['title'] !== null)
                ? new Audio\Title($data['title'])
                : null,
            (array_key_exists('file_name', $data) && $data['file_name'] !== null)
                ? new File\Name($data['file_name'])
                : null,
            (array_key_exists('mime_type', $data) && $data['mime_type'] !== null)
                ? new File\MimeType($data['mime_type'])
                : null,
            (array_key_exists('file_size', $data) && $data['file_size'] !== null)
                ? new File\Size($data['file_size'])
                : null,
            (array_key_exists('thumbnail', $data) && $data['thumbnail'] !== null)
                ? new PhotoSize\AssociativeArray($data['thumbnail'])
                : null,
        );
    }

    public function getFileId(): File\Id
    {
        return $this->audio->getFileId();
    }

    public function getFileUniqueId(): File\UniqueId
    {
        return $this->audio->getFileUniqueId();
    }

    public function getDuration(): File\Duration
    {
        return $this->audio->getDuration();
    }

    public function getMimeType(): ?File\MimeType
    {
        return $this->audio->getMimeType();
    }

    public function getFileName(): ?File\Name
    {
        return $this->audio->getFileName();
    }

    public function getFileSize(): ?File\Size
    {
        return $this->audio->getFileSize();
    }

    public function getThumbnail(): ?PhotoSizeInterface
    {
        return $this->audio->getThumbnail();
    }

    public function getPerformer(): ?Audio\Performer
    {
        return $this->audio->getPerformer();
    }

    public function getTitle(): ?Audio\Title
    {
        return $this->audio->getTitle();
    }
}
