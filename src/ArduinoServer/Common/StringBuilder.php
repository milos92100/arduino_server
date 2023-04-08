<?php

declare(strict_types=1);

namespace ArduinoServer\Common;

class StringBuilder {

    /**
     * $partials
     *
     * @var array
     */
    private $partials;

    /**
     * Constructor
     *
     * @param string $str
     */
    public function __construct(string $str = null) {
        $this->partials = array();

        if ($str != null) {
            $this->partials[] = $str;
        }
    }

    /**
     * Appends to the string
     *
     * @param string $str
     */
    public function append(string $str) {
        $this->partials[] = (string) $str;
        return $this;
    }

    /**
     * Returns the created string
     *
     * @return string
     */
    public function toString($glew = ""): string {
        return join($glew, $this->partials);
    }

    public function __toString(): string {
        return $this->toString();
    }

}
