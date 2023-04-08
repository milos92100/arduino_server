<?php

declare(strict_types=1);

namespace ArduinoServer\Core\Abstraction;

interface ValidationResultInterface {

    /**
     * Returns if the validation has succeeded
     *
     * @return bool
     */
    public function isValid(): bool;

    /**
     * Returns error messages if the validation failed.
     *
     * @return array
     */
    public function getErrors(): array;
}
