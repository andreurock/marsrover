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

class MoveDownStrategy implements MoveStrategy
{
    public function move() : bool
    {
        $marsRover = MarsRover::getInstance();
        $position = $marsRover::getPosition();
        $newPosition = new Coordinates($position->x(), $position->y() - 1);

        if (Map::positionIsOut($newPosition)) {
            $newPosition = new Coordinates($position->x(), Map::getDimension()->y());
        }

        return $marsRover->moveTo($newPosition);
    }
}
