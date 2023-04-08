<?php

declare(strict_types=1);

namespace ArduinoServer\Controller;

use ArduinoServer\Core\Http\HttpResponse;
use ArduinoServer\Core\Controller;

class DeviceApiController extends Controller {

    public function sync(): HttpResponse {
        $response = new HttpResponse();
        $response->setContent("Cao Jovana");
        return $response;
    }

}
