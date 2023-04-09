<?php
namespace ArduinoServer\Core\Http;

use ArduinoServer\Core\Http\Abstraction\HttpRequestInterface;

final class HttpRequest implements HttpRequestInterface
{

    /**
     *
     * {@inheritdoc}
     * @see \ArduinoServer\Core\Http\Abstraction\HttpRequestInterface::getRequestUri()
     */
    public function getRequestUri(): string
    {
        return $_SERVER['REQUEST_URI'];
    }

    /**
     *
     * {@inheritdoc}
     * @see \ArduinoServer\Core\Http\Abstraction\HttpRequestInterface::getPost()
     */
    public function getPost(string $name, $default = null)
    {
        return $this->get($_POST, $name, $default);
    }

    /**
     *
     * {@inheritdoc}
     * @see \ArduinoServer\Core\Http\Abstraction\HttpRequestInterface::hasHeader()
     */
    public function hasHeader(string $name): bool
    {
        return $this->has($_SERVER, $name);
    }

    /**
     *
     * {@inheritdoc}
     * @see \ArduinoServer\Core\Http\Abstraction\HttpRequestInterface::hasPost()
     */
    public function hasPost(string $name): bool
    {
        return $this->has($_POST, $name);
    }

    /**
     *
     * {@inheritdoc}
     * @see \ArduinoServer\Core\Http\Abstraction\HttpRequestInterface::getQuery()
     */
    public function getQuery(string $name, $default = null)
    {
        return $this->get($_GET, $name, $default);
    }

    /**
     *
     * {@inheritdoc}
     * @see \ArduinoServer\Core\Http\Abstraction\HttpRequestInterface::hasQuery()
     */
    public function hasQuery(string $name): bool
    {
        return $this->has($_GET, $name);
    }

    /**
     *
     * {@inheritdoc}
     * @see \ArduinoServer\Core\Http\Abstraction\HttpRequestInterface::getHeader()
     */
    public function getHeader(string $name, $defualt = null)
    {
        return $this->get($_SERVER, $name, $defualt);
    }

    /**
     *
     * {@inheritdoc}
     * @see \ArduinoServer\Core\Http\Abstraction\HttpRequestInterface::isAjax()
     */
    public function isAjax(): bool
    {
        return 'XMLHttpRequest' == ($_SERVER['HTTP_X_REQUESTED_WITH'] ?? '');
    }

    /**
     * Picks value by name from given source.If not found it returns default.
     *
     * @param array $source
     * @param string $name
     * @param mixed $default
     * @return mixed
     */
    private function get(array $source, string $name, $default = null)
    {
        if (empty([$name])) {
            return $default;
        }
        return $source[$name];
    }

    /**
     * Checks if value by name exists in given source
     *
     * @param array $source
     * @param string $name
     * @return bool
     */
    private function has($source, $name): bool
    {
        return !empty($source[$name]);
    }
}

