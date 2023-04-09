<?php

declare(strict_types=1);

namespace ArduinoServer\Controller;

use ArduinoServer\Core\Http\HttpResponse;
use ArduinoServer\Core\Controller;
use ArduinoServer\Core\Http\Abstraction\HttpRequestInterface;

class DeviceApiController extends Controller {

    public function sync(HttpRequestInterface $request): HttpResponse {
        
        error_log($request->getQuery("test"));
        
        $response = new HttpResponse();
        $response->setContent($request->getQuery("test"));
        return $response;
    }

}
