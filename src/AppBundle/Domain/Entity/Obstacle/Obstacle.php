<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 02/12/16
 * Time: 11:21
 */

namespace AppBundle\Domain\Entity\Obstacle;


use AppBundle\Domain\Entity\Map\Map;
use AppBundle\Domain\ValueObject\Coordinates;

class Obstacle implements ObstacleInterface
{
    private $id;

    private $coordinates;

    public function __construct(Coordinates $coordinates)
    {
        $this->id = uniqid();
        $this->coordinates = $coordinates;
    }

    public function placeInMap() : bool
    {
        $map = Map::getInstance();
        $placedObstacles = $map->getObstacles();

        foreach ($placedObstacles as $obstacle) {
            if ($this->equals($obstacle)) {
                return false;
            }
        }

        $map->appendObstacle($this);
        return true;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return Coordinates
     */
    public function getCoordinates(): Coordinates
    {
        return $this->coordinates;
    }

    public function equals(self $obstacle) : bool
    {
        return $this->getCoordinates()->equals($obstacle->getCoordinates());
    }
}
