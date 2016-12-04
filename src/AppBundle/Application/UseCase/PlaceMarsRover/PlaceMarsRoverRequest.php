<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 02/12/16
 * Time: 12:49
 */

namespace AppBundle\Application\UseCase\PlaceMarsRover;

/**
 * Class PlaceMarsRoverRequest
 * Takes two coordinates x and y, and the direction to place the Mars Rover
 *
 * @package AppBundle\Application\UseCase\PlaceMarsRover
 * @author Andreu Ros
 * @version 1.0 2016
 */
final class PlaceMarsRoverRequest
{
    /**
     * @var int
     */
    private $x;

    /**
     * @var int
     */
    private $y;

    /**
     * @var string
     */
    private $direction;

    /**
     * PlaceMarsRoverRequest constructor.
     * @param int $x
     * @param int $y
     * @param string $direction
     */
    public function __construct(int $x, int $y, string $direction)
    {
        $this->x = $x;
        $this->y = $y;
        $this->direction = $direction;
    }

    /**
     * @return int
     */
    public function getX() : int
    {
        return $this->x;
    }

    /**
     * @return int
     */
    public function getY() : int
    {
        return $this->y;
    }

    /**
     * @return string
     */
    public function getDirection(): string
    {
        return $this->direction;
    }
}
