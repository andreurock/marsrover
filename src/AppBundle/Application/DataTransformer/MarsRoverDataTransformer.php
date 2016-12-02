<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 02/12/16
 * Time: 12:47
 */

namespace AppBundle\Application\DataTransformer;


use AppBundle\Domain\Entity\MarsRover\MarsRover;

interface MarsRoverDataTransformer
{
    public function write(MarsRover $marsRover);

    public function read();
}
