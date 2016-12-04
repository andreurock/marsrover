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

/**
 * Class Obstacle
 * An obstacle implementation.
 *
 * @package AppBundle\Domain\Entity\Obstacle
 * @author Andreu Ros
 * @version 1.0 2016
 */
class Obstacle implements ObstacleInterface
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var Coordinates
     */
    private $coordinates;

    /**
     * Obstacle constructor.
     * @param Coordinates $coordinates
     */
    public function __construct(Coordinates $coordinates)
    {
        $this->id = uniqid();
        $this->coordinates = $coordinates;
    }

    /**
     * @return bool
     */
    public function placeInMap() : bool
    {
        $map = Map::getInstance();
        $placedObstacles = $map->getObstacles();

        if (Map::positionIsOut($this->coordinates)) {
            return false;
        }

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

    /**
     * Checks if two obstacles are the same
     *
     * @param ObstacleInterface $obstacle
     * @return bool
     */
    public function equals(ObstacleInterface $obstacle) : bool
    {
        return $this->getCoordinates()->equals($obstacle->getCoordinates());
    }
}
