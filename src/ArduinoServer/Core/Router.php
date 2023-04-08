<?php

declare(strict_types=1);

namespace ArduinoServer\Core;

use ArduinoServer\Core\Abstraction\RouterInterface;
use ArduinoServer\Core\Abstraction\ResourceValidatorInterface;
use ArduinoServer\Core\Http\Abstraction\HttpRequestInterface;
use ArduinoServer\Core\Http\Abstraction\HttpResponseInterface;
use ArduinoServer\Core\Http\HttpResult;
use ArduinoServer\Core\Http\JsonHttpResponse;
use ArduinoServer\Core\Http\HttpStatusCode;
use ArduinoServer\Core\Exception\ComponentNotRegisteredException;
use ArduinoServer\Controller\AuthenticationController;
use ArduinoServer\Controller\HomeController;


final class Router implements RouterInterface {

    public const CONTROLLER_NAMESPACE = "ArduinoServer\\Controller\\";

    private $validator;

    public function __construct(ResourceValidatorInterface $validator) {
        $this->validator = $validator;
    }

    public function handleRequest(HttpRequestInterface $request): void {
        $route = new Route($request->getRequestUri());

        if (false == $route->isActionDefined()) {
            $this->handelUndefinedAction($request);
            return;
        }
        $validationReult = $this->validator->validateRoute($route);

        if ($validationReult->isValid()) {

            $controllerName = self::CONTROLLER_NAMESPACE . $route->getControllerName();
            $controller = new $controllerName();
            if (null == $controller) {
                throw new ComponentNotRegisteredException($route->getControllerName());
            }

            $action = $route->getActionName();
            $response = $controller->$action($request);
            $this->dispatch($response);
        } else {
            $this->handleInvalidRequest($request, $validationReult->getErrors());
        }
    }

    /**
     * Handles the request when the action is not defined
     *
     * @param HttpRequestInterface $request
     */
    private function handelUndefinedAction(HttpRequestInterface $request) {
        if ($this->isAuthorized()) {
            $this->sendToHomePage($request);
        } else {
            $this->notAuthorized($request);
        }
    }

    /**
     * Creates and dispatches the not outhorized response
     *
     * @param HttpRequestInterface $request
     */
    private function notAuthorized(HttpRequestInterface $request): void {
        if ($request->isAjax()) {
            $response = new JsonHttpResponse();
            $response->setStatusCode(HttpStatusCode::UNAUTHORIZED);
            $response->setContent(HttpResult::Error(array(
                        "Not authorized to access {$request->getRequestUri()}"
            )));

            $this->dispatch($response);
        } else {
            $auth = $this->container->get(AuthenticationController::class);
            $auth->index($request);
        }
    }

    private function isAuthorized(): bool {
        return true;
    }

    private function dispatch(HttpResponseInterface $response): void {
        $response->send();
    }

    /**
     * Handles the request if its not valid
     *
     * @param HttpRequestInterface $request
     * @param array $errors
     */
    private function handleInvalidRequest(HttpRequestInterface $request, array $errors) {
        if ($request->isAjax()) {
            $response = new JsonHttpResponse();
            $response->setStatusCode(HttpStatusCode::NOT_FOUND);
            $response->setContent(HttpResult::Error($errors));

            $this->dispatch($response);
        } else {
            $this->sendToPageNotFound(join($errors));
        }
    }

    private function sendToHomePage(HttpRequestInterface $request) {
        $home = new HomeController();
        $response = $home->index($request);
        $response->send();
    }

    private function sendToPageNotFound($msg): void {
        echo "Page not found: {$msg}";
    }

}
