<?php

declare(strict_types=1);

namespace ArduinoServer\Core\Exception;

final class ComponentNotRegisteredException extends \Exception {

    public function __construct($name) {
        parent::__construct("Component: '{$name}' is not registered.");
    }

}
