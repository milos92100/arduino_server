<?php

declare(strict_types=1);

namespace ArduinoServer\Core\Http;

use ArduinoServer\Core\Http\Abstraction\HttpResponseInterface;

class HttpResponse implements HttpResponseInterface {

    /**
     * Constructor
     *
     * @param int $statusCode
     */
    public function __construct(int $statusCode = HttpStatusCode::OK) {
        $this->statusCode = $statusCode;
    }

    /**
     * HTTP status code
     *
     * @var int
     */
    protected $statusCode;

    /**
     * Response headers
     *
     * @var array
     */
    protected $headers = array();

    /**
     * Response content
     *
     * @var string
     */
    protected $content = null;

    /**
     * Sets the response content
     *
     * @param string $content
     */
    public function setContent(string $content) {
        $this->content = $content;
    }

    /**
     * Sets the status code
     *
     * @param int $statusCode
     */
    public function setStatusCode(int $statusCode) {
        $this->statusCode = $statusCode;
    }

    /**
     * Adds response header
     *
     * @param string $name
     * @param string $value
     */
    public function addHeader(string $name, string $value) {
        $this->headers[$name] = $value;
    }

    /**
     *
     * {@inheritdoc}
     * @see \PostOffice\Core\Http\Abstraction\HttpResponseInterface::send()
     */
    public function send(): void {
        ob_clean();
        $this->applyHeaders();
        http_response_code($this->statusCode);
        echo $this->content;
    }

    /**
     * Sets the response headers
     */
    protected function applyHeaders(): void {
        foreach ($this->headers as $key => $value) {
            header("{$key}: {$value}");
        }
    }

    /**
     *
     * @return number
     */
    public final function getStatusCode() {
        return $this->statusCode;
    }

    /**
     *
     * @return array
     */
    public final function getHeaders() {
        return $this->headers;
    }

    /**
     *
     * @return string
     */
    public final function getContent() {
        return $this->content;
    }

}
