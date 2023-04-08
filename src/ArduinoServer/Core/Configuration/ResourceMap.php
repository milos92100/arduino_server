<?php

declare(strict_types=1);

namespace ArduinoServer\Core\Configuration;

use ArduinoServer\Common\Collection;
use ArduinoServer\Core\Configuration\ResourceKeyValue;

final class ResourceMap extends Collection {

    public const CONTROLLERS = "CONTROLLERS";

    public function __construct($items = array()) {
        foreach ($items as $item) {
            $this->addResource($item);
        }
    }

    public function addResource(ResourceKeyValue $item) {
        $this->add($item, $item->getKey());
        return $this;
    }

}
