<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 02/12/16
 * Time: 12:47
 */

namespace AppBundle\Application\DataTransformer;

use AppBundle\Domain\Entity\MarsRover\MarsRover;

class MarsRoverDataTransformerObject implements MarsRoverDataTransformer
{
    private $marsRover;

    public function write(MarsRover $marsRover)
    {
        $this->marsRover = $marsRover;
    }

    public function read()
    {
        return $this->marsRover;
    }
}
