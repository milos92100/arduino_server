<?php
declare(strict_types = 1);

namespace ArduinoServer\Core;

use ArduinoServer\Core\Http\HttpResult;
use ArduinoServer\Core\Http\HttpStatusCode;
use ArduinoServer\Core\Http\JsonHttpResponse;
use ArduinoServer\Core\Http\Abstraction\HttpRequestInterface;

abstract class Controller
{

    /**
     * Constructs a not authorized response.
     *
     * @param HttpRequestInterface $request
     * @return JsonHttpResponse
     */
    protected function getNotOuthorized(HttpRequestInterface $request): JsonHttpResponse
    {
        $response = new JsonHttpResponse();
        $response->setStatusCode(HttpStatusCode::UNAUTHORIZED);
        $response->setContent(HttpResult::Error(array(
            "Not authorized to access {$request->getRequestUri()}"
        )));
    }
}
