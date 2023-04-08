<?php

declare(strict_types=1);

namespace ArduinoServer\Core\Abstraction;

abstract class AbstractValidationResult {

    /**
     * $isValid
     *
     * @var string
     */
    protected $isValid = false;

    /**
     * $errors
     *
     * @var array
     */
    protected $errors = array();

    /**
     * Constructor
     *
     * @param bool $isValid
     * @param array $errors
     */
    public function __construct(bool $isValid, array $errors) {
        $this->isValid = $isValid;
        $this->errors = $errors;
    }

}
