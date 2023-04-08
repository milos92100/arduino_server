<?php

declare(strict_types=1);

namespace ArduinoServer\Core\Exception;

final class RoutePathEmptyException extends \InvalidArgumentException {

    public function __construct() {
        parent::__construct("Route path must not be empty.");
    }

}
