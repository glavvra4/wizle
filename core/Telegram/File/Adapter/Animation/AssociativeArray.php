<?php

declare(strict_types=1);

namespace Core\Telegram\File\Adapter\Animation;

use Core\Common\Adapter\BaseAssociativeArray;
use Core\Telegram\File\Entity\Animation;
use Core\Telegram\File\Entity\AnimationInterface;
use Core\Telegram\File\Entity\File;
use Core\Telegram\File\Adapter\PhotoSize;
use Core\Telegram\File\Entity\PhotoSizeInterface;
use DateInterval;
use Exception;

class AssociativeArray extends BaseAssociativeArray implements AnimationInterface
{
    protected Animation $animation;

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

        $this->animation = new Animation(
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
        return $this->animation->getFileId();
    }

    public function getFileUniqueId(): File\UniqueId
    {
        return $this->animation->getFileUniqueId();
    }

    public function getWidth(): File\Dimension
    {
        return $this->animation->getWidth();
    }

    public function getHeight(): File\Dimension
    {
        return $this->animation->getHeight();
    }

    public function getDuration(): File\Duration
    {
        return $this->animation->getDuration();
    }

    public function getMimeType(): ?File\MimeType
    {
        return $this->animation->getMimeType();
    }

    public function getFileName(): ?File\Name
    {
        return $this->animation->getFileName();
    }

    public function getFileSize(): ?File\Size
    {
        return $this->animation->getFileSize();
    }

    public function getThumbnail(): ?PhotoSizeInterface
    {
        return $this->animation->getThumbnail();
    }
}
