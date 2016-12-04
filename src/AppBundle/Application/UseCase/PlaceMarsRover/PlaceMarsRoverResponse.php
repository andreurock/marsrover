<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 02/12/16
 * Time: 12:50
 */

namespace AppBundle\Application\UseCase\PlaceMarsRover;

/**
 * Class PlaceMarsRoverResponse
 * Returns the instance of the Mars Rover
 *
 * @package AppBundle\Application\UseCase\PlaceMarsRover
 * @author Andreu Ros
 * @version 1.0 2016
 */
final class PlaceMarsRoverResponse
{
    private $marsRover;

    /**
     * PlaceMarsRoverResponse constructor.
     * @param $marsRover
     */
    public function __construct($marsRover)
    {
        $this->marsRover = $marsRover;
    }

    public function getMarsRover()
    {
        return $this->marsRover;
    }
}