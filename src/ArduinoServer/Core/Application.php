<?php

declare(strict_types=1);

namespace ArduinoServer\Core;

use ArduinoServer\Core\Http\HttpRequest;
use ArduinoServer\Core\Router;
use ArduinoServer\Core\ResourceValidator;
use ArduinoServer\Core\Configuration\ResourceMap;
use ArduinoServer\Core\Configuration\ResourceKeyValue;

final class Application {

    private $router = null;

    public function __construct() {
        $resourceMap = new ResourceMap(array(
            new ResourceKeyValue(ResourceMap::CONTROLLERS, __DIR__ . "/../Controller/")
        ));

        $validator = new ResourceValidator($resourceMap);

        $this->router = new Router($validator);
    }

    public function run(): void {
        $request = new HttpRequest();
        $this->router->handleRequest($request);
    }

}
