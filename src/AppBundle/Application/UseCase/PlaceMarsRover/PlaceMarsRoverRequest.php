<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 02/12/16
 * Time: 12:49
 */

namespace AppBundle\Application\UseCase\PlaceMarsRover;


final class PlaceMarsRoverRequest
{
    private $x;

    private $y;

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
     * @return mixed
     */
    public function getX() : int
    {
        return $this->x;
    }

    /**
     * @return mixed
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