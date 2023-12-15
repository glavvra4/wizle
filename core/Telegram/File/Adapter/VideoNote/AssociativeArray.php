<?php

declare(strict_types=1);

namespace Core\Telegram\File\Adapter\VideoNote;

use Core\Common\Adapter\BaseAssociativeArray;
use Core\Telegram\File\Adapter\PhotoSize;
use Core\Telegram\File\Entity\File;
use Core\Telegram\File\Entity\PhotoSizeInterface;
use Core\Telegram\File\Entity\VideoNote;
use Core\Telegram\File\Entity\VideoNoteInterface;
use DateInterval;
use Exception;

class AssociativeArray extends BaseAssociativeArray implements VideoNoteInterface
{
    protected VideoNote $videoNote;

    /**
     * @inheritDoc
     */
    protected function getFieldTypes(): array
    {
        return [
            'file_id' => 'string',
            'file_unique_id' => 'string',
            'length' => 'integer',
            'duration' => 'integer',
            'thumbnail' => 'array',
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
            'length',
            'duration'
        ];
    }

    /**
     * @param array{file_id: string, file_unique_id: string, length: int, duration: int, thumbnail: array|null, file_size: int|null} $data
     *
     * @throws File\Exception\InvalidDimensionException if length is lower than 0
     * @throws File\Exception\InvalidSizeException if file_size is lower than 0
     * @throws Exception if invalid DateInterval data given
     */
    public function __construct(array $data)
    {
        $this->validateFields($data);

        $this->videoNote = new VideoNote(
            new File\Id($data['file_id']),
            new File\UniqueId($data['file_unique_id']),
            new File\Dimension($data['length']),
            new File\Duration(new DateInterval('PT'.$data['duration'].'S')),
            (array_key_exists('thumbnail', $data) && $data['thumbnail'] !== null)
                ? new PhotoSize\AssociativeArray($data['thumbnail'])
                : null,
            (array_key_exists('file_size', $data) && $data['file_size'] !== null)
                ? new File\Size($data['file_size'])
                : null,
        );
    }

    public function getFileId(): File\Id
    {
        return $this->videoNote->getFileId();
    }

    public function getFileUniqueId(): File\UniqueId
    {
        return $this->videoNote->getFileUniqueId();
    }

    public function getWidth(): File\Dimension
    {
        return $this->videoNote->getWidth();
    }

    public function getHeight(): File\Dimension
    {
        return $this->videoNote->getHeight();
    }

    public function getDuration(): File\Duration
    {
        return $this->videoNote->getDuration();
    }

    public function getFileSize(): ?File\Size
    {
        return $this->videoNote->getFileSize();
    }

    public function getThumbnail(): ?PhotoSizeInterface
    {
        return $this->videoNote->getThumbnail();
    }
}
