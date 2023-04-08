<?php

declare(strict_types=1);

namespace ArduinoServer\Core\Exception;

final class ArgumentIsNullException extends \InvalidArgumentException {

    public function __construct($argumentName) {
        parent::__construct("$argumentName must not be null.");
    }

}
