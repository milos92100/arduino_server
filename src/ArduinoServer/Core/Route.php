<?php
declare(strict_types = 1);
namespace ArduinoServer\Core;

use ArduinoServer\Core\Abstraction\RouteInterface;
use ArduinoServer\Core\Exception\ArgumentIsNullException;

class Route implements RouteInterface
{

    /**
     * Full name-space with name
     *
     * @var string
     */
    private $controller;

    /**
     * Controller function name
     *
     * @var string
     */
    private $action;

    /**
     * Action is defined
     *
     * @var boolean
     */
    private $actionIsDefined = false;

    /**
     * Constructor
     *
     * @param string $path
     */
    public function __construct(string $path)
    {
        if (null == $path) {
            throw new ArgumentIsNullException("path");
        }

        $this->constructRoute($path);
    }

    /**
     *
     * {@inheritdoc}
     * @see \ArduinoServer\Core\Abstraction\RouteInterface::getControllerName()
     */
    public function getControllerName(): string
    {
        return $this->controller;
    }

    /**
     *
     * {@inheritdoc}
     * @see \ArduinoServer\Core\Abstraction\RouteInterface::getActionName()
     */
    public function getActionName(): string
    {
        return $this->action;
    }

    /**
     *
     * {@inheritdoc}
     * @see \ArduinoServer\Core\Abstraction\RouteInterface::isActionDefined()
     */
    public function isActionDefined(): bool
    {
        return $this->actionIsDefined;
    }

    private function setAction($args)
    {
        $this->controller = $args[0] . "Controller";

        if (count($args) < 2) {
            $this->action = "index";
        } else {
            $this->action = $args[1];
        }
    }

    private function constructRoute(string $path)
    {
        $routeArgs = array_filter(explode("/", trim($path)), function ($value) {
            return $value !== '';
        });

        // reindex
        $reindexedRouteArgs = array_values($routeArgs);
        
        if (count($reindexedRouteArgs) < 1) {
            $this->actionIsDefined = false;
            return;
        }

        $this->actionIsDefined = true;

        $this->setAction($reindexedRouteArgs);
    }
}