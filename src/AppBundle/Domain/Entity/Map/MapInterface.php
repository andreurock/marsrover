<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 1/12/16
 * Time: 20:30
 */

namespace AppBundle\Domain\Entity\Map;

use AppBundle\Domain\Entity\Obstacle\ObstacleInterface;
use AppBundle\Domain\ValueObject\Coordinates;

/**
 * Interface MapInterface
 * May implement the Singleton Pattern, as the map is a unique instance.
 *
 * @package AppBundle\Domain\Entity\Map
 * @author Andreu Ros
 * @version 1.0 2016
 */
interface MapInterface
{
    public static function create(Coordinates $coordinates) : ?self;

    public static function getInstance() : self;

    public static function getDimension() : Coordinates;

    public function getObstacles(): array;

    public function appendObstacle(ObstacleInterface $obstacle) : void;

    public function appendMarsRover() : void;

    public static function positionIsOut(Coordinates $coordinates) : bool;
}
