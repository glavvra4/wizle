<?php

declare(strict_types=1);

namespace Core\Telegram\Chat\Adapter\ChatLocation;

use Core\Common\Adapter\BaseAssociativeArray;
use Core\Telegram\Chat\Entity\ChatLocation;
use Core\Telegram\Chat\Entity\ChatLocationInterface;
use Core\Telegram\Location\Adapter\Location\AssociativeArray as LocationAssociativeArrayAdapter;
use Core\Telegram\Location\Entity\LocationInterface;
use Exception;

class AssociativeArray extends BaseAssociativeArray implements ChatLocationInterface
{
    protected ChatLocation $chatLocation;

    /**
     * @inheritDoc
     */
    protected function getFieldTypes(): array
    {
        return [
            'location' => 'array',
            'address' => 'string'
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getMandatoryFields(): array
    {
        return [
            'location',
            'address',
        ];
    }

    /**
     * @param array $data
     *
     * @throws Exception if invalid location data given
     */
    public function __construct(array $data)
    {
        $this->validateFields($data);

        $this->chatLocation = new ChatLocation(
            new LocationAssociativeArrayAdapter($data['location']),
            new ChatLocation\Address($data['address'])
        );
    }

    public function getLocation(): LocationInterface
    {
        return $this->chatLocation->getLocation();
    }

    public function getAddress(): ChatLocation\Address
    {
        return $this->chatLocation->getAddress();
    }
}
