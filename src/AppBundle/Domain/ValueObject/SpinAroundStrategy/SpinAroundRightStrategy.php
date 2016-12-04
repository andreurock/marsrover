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

/**
 * Class SpinAroundRightStrategy
 * Spin around to the right
 *
 * @package AppBundle\Domain\ValueObject\SpinAroundStrategy
 * @author Andreu Ros
 * @version 1.0 2016
 */
class SpinAroundRightStrategy implements SpinAroundStrategy
{
    public function spinAround() : bool
    {
        $marsRover = MarsRover::getInstance();
        $newDirection = null;

        switch ($marsRover::getDirection()) {
            case Direction::NORTH:
                $newDirection = Direction::EAST;
                break;
            case Direction::SOUTH:
                $newDirection = Direction::WEST;
                break;
            case Direction::EAST:
                $newDirection = Direction::SOUTH;
                break;
            case Direction::WEST:
                $newDirection = Direction::NORTH;
                break;
        }

        $marsRover->turnTo($newDirection);
        return true;
    }
}
