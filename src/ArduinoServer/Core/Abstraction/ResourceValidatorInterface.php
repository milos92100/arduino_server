<?php

declare(strict_types=1);

namespace ArduinoServer\Core\Abstraction;

interface ResourceValidatorInterface {

    /**
     * Returns array if errors
     *
     * @param RouteInterface $route
     * @return string []
     */
    public function validateRoute(RouteInterface $route): ValidationResultInterface;
}
