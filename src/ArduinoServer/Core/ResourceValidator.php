<?php

declare(strict_types=1);

namespace ArduinoServer\Core;

use ArduinoServer\Core\Abstraction\ResourceValidatorInterface;
use ArduinoServer\Core\Abstraction\RouteInterface;
use ArduinoServer\Core\Abstraction\ValidationResultInterface;
use ArduinoServer\Core\Configuration\ResourceMap;

class ResourceValidator implements ResourceValidatorInterface {

    private $resourceMap = null;

    /**
     * Constructor
     *
     * @param ResourceMap $resourceMap
     * @throws \InvalidArgumentException
     */
    public function __construct(ResourceMap $resourceMap) {
        if (null == $resourceMap) {
            throw new \InvalidArgumentException("resourceMap must not be null.");
        }

        $this->resourceMap = $resourceMap;
    }

    /**
     *
     * {@inheritdoc}
     * @see \PostOffice\Core\Abstraction\ResourceValidatorInterface::validateRoute()
     */
    public function validateRoute(RouteInterface $route): ValidationResultInterface {
        $errors = array();

        if (false == $this->controllerExists($route->getControllerName())) {
            $errors[] = "Controller {$route->getControllerName()} not found.";
        }
       
        if (false == $this->actionExists(Router::CONTROLLER_NAMESPACE . $route->getControllerName(), $route->getActionName())) {
            $errors[] = "Action {$route->getActionName()} does not exist";
        }

        return new ResourceValidationResult(empty($errors), $errors);
    }

    /**
     * Checks if the given controller action exists.
     *
     * @param string $controller
     * @param string $action
     * @return boolean
     */
    private function actionExists($controller, $action) {
        return method_exists($controller, $action);
    }

    /**
     * Checks if the given controller exists
     *
     * @return boolean
     */
    private function controllerExists($name) {
        return file_exists("{$this->resourceMap->get(ResourceMap::CONTROLLERS)->getValue()}/{$name}.php");
    }

}
