<?php

declare(strict_types=1);

namespace Core\Telegram\File\Proxy\Document;

use Core\Telegram\File\Proxy\PhotoSize;
use Core\Telegram\File\Entity\Document;
use Core\Telegram\File\Entity\File;
use Core\Telegram\File\Entity\PhotoSizeInterface;

class AssociativeArray extends \Core\Common\Proxy\BaseAssociativeArray implements \Core\Telegram\File\Entity\DocumentInterface
{
    protected Document $document;

    /**
     * @inheritDoc
     */
    protected function getFieldTypes(): array
    {
        return [
            'file_id' => 'string',
            'file_unique_id' => 'string',
            'thumbnail' => 'array',
            'file_name'	=> 'string',
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
            'file_unique_id'
        ];
    }

    /**
     * @param array{file_id: string, file_unique_id: string, thumbnail: array|null, file_name: string|null, mime_type: string|null, file_size: int|null} $data
     *
     * @throws File\Exception\InvalidSizeException if file_size is lower than 0
     */
    public function __construct(array $data)
    {
        $this->validateFields($data);

        $this->document = new Document(
            new File\Id($data['file_id']),
            new File\UniqueId($data['file_unique_id']),
            (array_key_exists('thumbnail', $data) && $data['thumbnail'] !== null)
                ? new PhotoSize\AssociativeArray($data['thumbnail'])
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
        );
    }

    public function getFileId(): File\Id
    {
        return $this->document->getFileId();
    }

    public function getFileUniqueId(): File\UniqueId
    {
        return $this->document->getFileUniqueId();
    }

    public function getMimeType(): ?File\MimeType
    {
        return $this->document->getMimeType();
    }

    public function getFileName(): ?File\Name
    {
        return $this->document->getFileName();
    }

    public function getFileSize(): ?File\Size
    {
        return $this->document->getFileSize();
    }

    public function getThumbnail(): ?PhotoSizeInterface
    {
        return $this->document->getThumbnail();
    }
}
