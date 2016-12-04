<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 02/12/16
 * Time: 14:52
 */

namespace AppBundle\Domain\ValueObject\MoveStrategy;


use AppBundle\Domain\Entity\Map\Map;
use AppBundle\Domain\Entity\MarsRover\MarsRover;
use AppBundle\Domain\ValueObject\Coordinates;
use AppBundle\Domain\ValueObject\Direction;

class MoveForwardStrategy implements MoveStrategy
{
    public function move() : bool
    {
        $marsRover = MarsRover::getInstance();
        $position = $marsRover::getPosition();
        $newPosition = null;
        $limitPosition = null;

        switch ($marsRover::getDirection()) {
            case Direction::NORTH:
                $newPosition = new Coordinates($position->x(), $position->y() + 1);
                $limitPosition = new Coordinates($position->x(), Coordinates::INITIAL_COORDINATE);
                break;
            case Direction::SOUTH:
                $newPosition = new Coordinates($position->x(), $position->y() - 1);
                $limitPosition = new Coordinates($position->x(), Map::getDimension()->y());
                break;
            case Direction::EAST:
                $newPosition = new Coordinates($position->x() + 1, $position->y());
                $limitPosition = new Coordinates(Coordinates::INITIAL_COORDINATE, $position->y());
                break;
            case Direction::WEST:
                $newPosition = new Coordinates($position->x() - 1, $position->y());
                $limitPosition = new Coordinates(Map::getDimension()->x(), $position->y());
                break;
        }

        if (Map::positionIsOut($newPosition)) {
            $newPosition = $limitPosition;
        }

        return $marsRover->moveTo($newPosition);
    }
}
