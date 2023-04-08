<?php

declare(strict_types=1);

namespace ArduinoServer\Controller;

use ArduinoServer\Core\Controller;
use ArduinoServer\Core\Http\Abstraction\HttpRequestInterface;
use ArduinoServer\Core\Http\HttpResponse;
use ArduinoServer\Core\Http\Abstraction\HttpResponseInterface;

class HomeController extends Controller {

    public function index(HttpRequestInterface $request): HttpResponseInterface {
        $response = new HttpResponse();
        $response->setContent("Wellcome to Arduino control center");
        return $response;
    }

}
