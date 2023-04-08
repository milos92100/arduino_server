<?php

declare(strict_types=1);

namespace ArduinoServer\Core;

use ArduinoServer\Core\Abstraction\AbstractValidationResult;
use ArduinoServer\Core\Abstraction\ValidationResultInterface;

final class ResourceValidationResult extends AbstractValidationResult implements ValidationResultInterface {

    /**
     *
     * {@inheritdoc}
     * @see \ArduinoServer\Core\Abstraction\ValidationResultInterface::isValid()
     */
    public function isValid(): bool {
        return $this->isValid;
    }

    /**
     *
     * {@inheritdoc}
     * @see \ArduinoServer\Core\Abstraction\ValidationResultInterface::getErrors()
     */
    public function getErrors(): array {
        return $this->errors;
    }

}
