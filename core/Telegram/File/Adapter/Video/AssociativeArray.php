<?php

declare(strict_types=1);

namespace Core\Telegram\File\Adapter\Video;

use Core\Common\Adapter\BaseAssociativeArray;
use Core\Telegram\File\Adapter\PhotoSize;
use Core\Telegram\File\Entity\File;
use Core\Telegram\File\Entity\PhotoSizeInterface;
use Core\Telegram\File\Entity\Video;
use Core\Telegram\File\Entity\VideoInterface;
use DateInterval;
use Exception;

class AssociativeArray extends BaseAssociativeArray implements VideoInterface
{
    protected Video $video;

    /**
     * @inheritDoc
     */
    protected function getFieldTypes(): array
    {
        return [
            'file_id' => 'string',
            'file_unique_id' => 'string',
            'width' => 'integer',
            'height' => 'integer',
            'duration' => 'integer',
            'thumbnail' => 'array',
            'file_name' => 'string',
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
            'width',
            'height',
            'duration'
        ];
    }

    /**
     * @param array{file_id: string, file_unique_id: string, width: int, height: int, duration: int, thumbnail: array|null, file_name: string|null, mime_type: string|null, file_size: int|null} $data
     *
     * @throws File\Exception\InvalidDimensionException if width is lower than 0
     * @throws File\Exception\InvalidDimensionException if height is lower than 0
     * @throws File\Exception\InvalidSizeException if file_size is lower than 0
     * @throws Exception if invalid DateInterval data given
     */
    public function __construct(array $data)
    {
        $this->validateFields($data);

        $this->video = new Video(
            new File\Id($data['file_id']),
            new File\UniqueId($data['file_unique_id']),
            new File\Dimension($data['width']),
            new File\Dimension($data['height']),
            new File\Duration(new DateInterval('PT'.$data['duration'].'S')),
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
        return $this->video->getFileId();
    }

    public function getFileUniqueId(): File\UniqueId
    {
        return $this->video->getFileUniqueId();
    }

    public function getWidth(): File\Dimension
    {
        return $this->video->getWidth();
    }

    public function getHeight(): File\Dimension
    {
        return $this->video->getHeight();
    }

    public function getDuration(): File\Duration
    {
        return $this->video->getDuration();
    }

    public function getMimeType(): ?File\MimeType
    {
        return $this->video->getMimeType();
    }

    public function getFileName(): ?File\Name
    {
        return $this->video->getFileName();
    }

    public function getFileSize(): ?File\Size
    {
        return $this->video->getFileSize();
    }

    public function getThumbnail(): ?PhotoSizeInterface
    {
        return $this->video->getThumbnail();
    }
}
