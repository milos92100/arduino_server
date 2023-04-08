<?php

declare(strict_types=1);

namespace ArduinoServer\Core\Http\Abstraction;

interface HttpRequestInterface {

    /**
     * Returns value from GET request by name.
     * If the value for name is not found, the given
     * default value is returned.
     *
     * @param string $name
     * @param mixed $default
     */
    public function getQuery(string $name, $default = null);

    /**
     * Returns value from POST request by name.
     * If the value for name is not found, the given
     * default value is returned.
     *
     * @param string $name
     * @param mixed $default
     */
    public function getPost(string $name, $default = null);

    /**
     * Returns value request header by name.
     * If the value for name is not found, the given
     * default value is returned.
     *
     * @param string $name
     * @param mixed $defualt
     */
    public function getHeader(string $name, $defualt = null);

    /**
     * Checks if the given header variable exists.
     *
     * @param string $name
     * @return bool
     */
    public function hasHeader(string $name): bool;

    /**
     * Checks if the given POST variable exists.
     *
     * @param string $name
     * @return bool
     */
    public function hasPost(string $name): bool;

    /**
     * Checks if the given GET variable exists.
     *
     * @param string $name
     * @return bool
     */
    public function hasQuery(string $name): bool;

    /**
     * Returns the HTTP request URL
     *
     * @return string
     */
    public function getRequestUri(): string;

    /**
     * Checks if HTTP request is executed via AJAX
     *
     * @return string
     */
    public function isAjax(): bool;
}
