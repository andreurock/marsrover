<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 1/12/16
 * Time: 21:17
 */

namespace AppBundle\Application\DataTransfomer;

use AppBundle\Domain\Entity\Map\Map;

interface MapDataTransfomer
{
    public function write(Map $centre);

    public function read();
}
