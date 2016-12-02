<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 1/12/16
 * Time: 21:19
 */

namespace AppBundle\Application\DataTransfomer;

use AppBundle\Domain\Entity\Map\Map;

class MapDataTransformerObject implements MapDataTransfomer
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
