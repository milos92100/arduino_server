<?php

declare(strict_types=1);

namespace ArduinoServer\Core\Http;

final class JsonHttpResponse extends HttpResponse {

    /**
     * Constructor
     *
     * @param int $statusCode
     */
    public function __construct($content = null, $statusCode = HttpStatusCode::OK) {
        parent::__construct($statusCode);
        if (null != $content) {
            $this->setRawContent($content);
        }
        $this->addHeader("Content-Type", "application/json");
    }

    public function setRawContent($content) {
        $this->content = json_encode($content);
    }

}
