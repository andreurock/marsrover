<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 1/12/16
 * Time: 21:19
 */

namespace AppBundle\Application\DataTransformer;

use AppBundle\Domain\Entity\Map\Map;

class MapDataTransformerObject implements MapDataTransformer
{
    private $map;

    public function write(Map $map)
    {
        $this->map = $map;
    }

    public function read()
    {
        return $this->map;
    }
}
