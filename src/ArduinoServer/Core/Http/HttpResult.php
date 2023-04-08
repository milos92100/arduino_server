<?php

declare(strict_types=1);

namespace ArduinoServer\Core\Http;

final class HttpResult implements \JsonSerializable {

    protected $data = null;
    protected $success = false;
    protected $errors = array();

    /**
     * Constructor
     *
     * @param mixed $data
     * @param bool $success
     * @param array $errors
     */
    public function __construct($data, bool $success, array $errors) {
        $this->data = $data;
        $this->success = $success;
        $this->errors = $errors;
    }

    public static function Success($data): HttpResult {
        return new self($data, true, array());
    }

    public static function Error(...$errors): HttpResult {
        return new self(null, false, $errors);
    }

    public function getData() {
        return $this->data;
    }

    public function isSuccess() {
        return $this->success;
    }

    public function getErrors() {
        return $this->errors;
    }

    public function jsonSerialize() {
        return array(
            "data" => $this->data,
            "success" => $this->success,
            "errors" => $this->errors
        );
    }

}
