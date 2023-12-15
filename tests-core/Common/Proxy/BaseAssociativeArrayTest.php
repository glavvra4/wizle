<?php

declare(strict_types=1);

namespace Core\Tests\Common\Proxy;

use Core\Common\Proxy\BaseAssociativeArray;
use Core\Common\Proxy\Exception\EmptyProxyDataException;
use Core\Common\Proxy\Exception\InvalidProxyDataTypeException;
use PHPUnit\Framework\TestCase;

class BaseAssociativeArrayTest extends TestCase
{
    private function getObject(): BaseAssociativeArray
    {
        return new class extends BaseAssociativeArray{
            protected function getFieldTypes(): array
            {
                return [
                    'mandatoryValue' => 'integer',
                    'optionalValue' => 'string'
                ];
            }

            protected function getMandatoryFields(): array
            {
                return ['mandatoryValue'];
            }

            public function executeFieldsValidation(array $data): true
            {
                $this->validateFields($data);

                return true;
            }
        };
    }

    public function testValidateFields()
    {
        $object = $this->getObject();

        if (!method_exists($object, 'executeFieldsValidation')) {
            return;
        }

        $this->assertTrue(
            $object->executeFieldsValidation([
                'mandatoryValue' => 123,
                'optionalValue' => 'string'
            ])
        );

        $this->assertTrue(
            $object->executeFieldsValidation([
                'mandatoryValue' => 123,
                'optionalValue' => null
            ])
        );

        $this->assertTrue(
            $object->executeFieldsValidation([
                'mandatoryValue' => 123
            ])
        );

        $this->assertTrue(
            $object->executeFieldsValidation([
                'mandatoryValue' => 123,
                'optionalValue' => null,
                'notExistingValue' => 'notExistingValue'
            ])
        );
    }

    public function testValidateFieldsEmptyFieldException()
    {
        $object = $this->getObject();

        if (!method_exists($object, 'executeFieldsValidation')) {
            return;
        }

        $this->expectException(EmptyProxyDataException::class);
        $this->assertTrue(
            $object->executeFieldsValidation([
            ])
        );
    }

    public function testValidateFieldsNullFieldException()
    {
        $object = $this->getObject();

        if (!method_exists($object, 'executeFieldsValidation')) {
            return;
        }

        $this->expectException(EmptyProxyDataException::class);
        $this->assertTrue(
            $object->executeFieldsValidation([
                'mandatoryValue' => null
            ])
        );
    }

    public function testValidateFieldsInvalidFieldTypeException()
    {
        $object = $this->getObject();

        if (!method_exists($object, 'executeFieldsValidation')) {
            return;
        }

        $this->expectException(InvalidProxyDataTypeException::class);
        $this->assertTrue(
            $object->executeFieldsValidation([
                'mandatoryValue' => 'invalidType'
            ])
        );
    }
}
