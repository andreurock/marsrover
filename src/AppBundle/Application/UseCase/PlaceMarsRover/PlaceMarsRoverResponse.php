<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 02/12/16
 * Time: 12:50
 */

namespace AppBundle\Application\UseCase\PlaceMarsRover;


final class PlaceMarsRoverResponse
{
    private $marsRover;

    public function __construct($marsRover)
    {
        $this->marsRover = $marsRover;
    }

    public function getMarsRover()
    {
        return $this->marsRover;
    }
}