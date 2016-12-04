<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 02/12/16
 * Time: 14:54
 */

namespace AppBundle\Domain\ValueObject\SpinAroundStrategy;


use AppBundle\Domain\Entity\MarsRover\MarsRover;
use AppBundle\Domain\ValueObject\Direction;

class SpinAroundLeftStrategy implements SpinAroundStrategy
{
    public function spinAround() : void
    {
        $marsRover = MarsRover::getInstance();
        $newDirection = null;

        switch ($marsRover::getDirection()) {
            case Direction::NORTH:
                $newDirection = Direction::WEST;
                break;
            case Direction::SOUTH:
                $newDirection = Direction::EAST;
                break;
            case Direction::EAST:
                $newDirection = Direction::NORTH;
                break;
            case Direction::WEST:
                $newDirection = Direction::SOUTH;
                break;
        }

        $marsRover->turnTo($newDirection);
    }
}
