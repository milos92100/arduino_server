<?php

declare(strict_types=1);

namespace ArduinoServer\Core\Configuration;

final class ResourceKeyValue {

    /**
     * Key
     *
     * @var string
     */
    private $key = null;

    /**
     * Value
     *
     * @var string
     */
    private $value = null;

    /**
     * Constructor
     *
     * @param string $key
     * @param string $value
     * @throws \InvalidArgumentException
     */
    public function __construct(string $key, string $value) {
        if (empty($key)) {
            throw new \InvalidArgumentException();
        }

        if (empty($value)) {
            throw new \InvalidArgumentException();
        }

        $this->key = $key;
        $this->value = $value;
    }

    /**
     * Returns the key
     *
     * @return string
     */
    public function getKey(): string {
        return $this->key;
    }

    /**
     * Returns the value
     *
     * @return string
     */
    public function getValue(): string {
        return $this->value;
    }

}
