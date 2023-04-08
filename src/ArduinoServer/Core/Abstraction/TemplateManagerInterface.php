<?php
declare(strict_types = 1);

namespace ArduinoServer\Core\Abstraction;

interface TemplateManagerInterface
{

    public function render(string $page, array $args): string;
}