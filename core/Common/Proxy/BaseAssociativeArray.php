<?php

declare(strict_types=1);

namespace Core\Common\Proxy;

use Core\Common\Proxy\Exception\EmptyProxyDataException;
use Core\Common\Proxy\Exception\InvalidProxyDataTypeException;

abstract class BaseAssociativeArray implements AssociativeArrayInterface
{
    /**
     * Returns the list of <b>'field' => 'type'</b> values, that is used for validation
     *
     * @return array<string, string>
     */
    abstract protected function getFieldTypes(): array;

    /**
     * Returns the list of field keys, that is used for validation
     *
     * @return array<string>
     */
    abstract protected function getMandatoryFields(): array;

    /**
     * @param array $data
     *
     * @return void
     *
     * @throws EmptyProxyDataException if mandatory field is not set or is null
     * @throws InvalidProxyDataTypeException if the type of given value doesn't match the type specified in getFieldTypes() method
     */
    protected function validateFields(array $data): void
    {
        foreach ($this->getMandatoryFields() as $field) {
            if (!array_key_exists($field, $data)) {
                throw new EmptyProxyDataException(
                    sprintf("Key \"%s\" is mandatory in \"data\" array and can't be empty", $field)
                );
            }
        }

        foreach ($data as $key => $value) {
            if (!$this->isFieldExist($key)) {
                continue;
            }

            if (is_null($value)) {
                if ($this->isMandatoryField($key)){
                    throw new EmptyProxyDataException(
                        sprintf("Key \"%s\" is mandatory in \"data\" array and can't be null", $key)
                    );
                }

                continue;
            }

            if (!$this->isValidFieldType($key, gettype($value))) {
                throw new InvalidProxyDataTypeException(
                    sprintf("The type of \"%s\" value in \"data\" array must be %s, %s given", $key, $this->getFieldType($key), gettype($value))
                );
            }
        }
    }

    /**
     * @param string $key
     * @return bool
     */
    protected function isMandatoryField(string $key): bool
    {
        return in_array(
            $key,
            $this->getMandatoryFields()
        );
    }

    /**
     * @param string $key
     *
     * @return string|null
     */
    protected function getFieldType(string $key): ?string
    {
        return $this->getFieldTypes()[$key] ?? null;
    }

    /**
     * @param string $key
     * @return bool
     */
    protected function isFieldExist(string $key): bool
    {
        return !is_null($this->getFieldType($key));
    }

    /**
     * @param string $key
     * @param string $type
     *
     * @return bool
     */
    protected function isValidFieldType(string $key, string $type): bool
    {
        return $this->isFieldExist($key) && ($type === $this->getFieldType($key) || ($type === 'integer' && $this->getFieldType($key) === 'double'));
    }
}
