<?php

declare(strict_types=1);

namespace Core\Telegram\File\Proxy\PhotoSize;

use Core\Common\Proxy\BaseAssociativeArray;
use Core\Telegram\File\Entity\File;
use Core\Telegram\File\Entity\PhotoSize;
use Core\Telegram\File\Entity\PhotoSizeInterface;

class AssociativeArray extends BaseAssociativeArray implements PhotoSizeInterface
{
    protected PhotoSize $photoSize;

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
        ];
    }

    /**
     * @param array{file_id: string, file_unique_id: string, width: int, height: int, file_size: int|null} $data
     *
     * @throws File\Exception\InvalidDimensionException if width is lower than 0
     * @throws File\Exception\InvalidDimensionException if height is lower than 0
     * @throws File\Exception\InvalidSizeException if file_size is lower than 0
     */
    public function __construct(array $data)
    {
       $this->validateFields($data);

       $this->photoSize = new PhotoSize(
           new File\Id($data['file_id']),
           new File\UniqueId($data['file_unique_id']),
           new File\Dimension($data['width']),
           new File\Dimension($data['height']),
           (array_key_exists('file_size', $data) && $data['file_size'] !== null)
               ? new File\Size($data['file_size'])
               : null,
       );
    }

    public function getFileId(): File\Id
    {
        return $this->photoSize->getFileId();
    }

    public function getFileUniqueId(): File\UniqueId
    {
        return $this->photoSize->getFileUniqueId();
    }

    public function getWidth(): File\Dimension
    {
        return $this->photoSize->getWidth();
    }

    public function getHeight(): File\Dimension
    {
        return $this->photoSize->getHeight();
    }

    public function getFileSize(): ?File\Size
    {
        return $this->photoSize->getFileSize();
    }
}
