<?php

declare(strict_types=1);

namespace Core\Telegram\File\Proxy\Voice;

use Core\Common\Proxy\BaseAssociativeArray;
use Core\Telegram\File\Entity\File;
use Core\Telegram\File\Entity\Voice;
use Core\Telegram\File\Entity\VoiceInterface;
use DateInterval;
use Exception;

class AssociativeArray extends BaseAssociativeArray implements VoiceInterface
{
    protected Voice $voice;

    /**
     * @inheritDoc
     */
    protected function getFieldTypes(): array
    {
        return [
            'file_id' => 'string',
            'file_unique_id' => 'string',
            'duration' => 'integer',
            'mime_type' => 'string',
            'file_size' => 'integer'
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
     * @param array{file_id: string, file_unique_id: string, duration: int, mime_type: string|null, file_size: int|null} $data
     *
     * @throws File\Exception\InvalidSizeException if file_size is lower than 0
     * @throws Exception if invalid DateInterval data given
     */
    public function __construct(array $data)
    {
        $this->validateFields($data);

        $this->voice = new Voice(
            new File\Id($data['file_id']),
            new File\UniqueId($data['file_unique_id']),
            new File\Duration(new DateInterval('PT'.$data['duration'].'S')),
            (array_key_exists('mime_type', $data) && $data['mime_type'] !== null)
                ? new File\MimeType($data['mime_type'])
                : null,
            (array_key_exists('file_size', $data) && $data['file_size'] !== null)
                ? new File\Size($data['file_size'])
                : null,
        );
    }

    public function getFileId(): File\Id
    {
        return $this->voice->getFileId();
    }

    public function getFileUniqueId(): File\UniqueId
    {
        return $this->voice->getFileUniqueId();
    }

    public function getDuration(): File\Duration
    {
        return $this->voice->getDuration();
    }

    public function getMimeType(): ?File\MimeType
    {
        return $this->voice->getMimeType();
    }

    public function getFileSize(): ?File\Size
    {
        return $this->voice->getFileSize();
    }
}
