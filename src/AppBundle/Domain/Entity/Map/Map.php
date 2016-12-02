<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 1/12/16
 * Time: 20:28
 */

namespace AppBundle\Domain\Entity\Map;

use AppBundle\Domain\Entity\MarsRover\MarsRover;
use AppBundle\Domain\Entity\MarsRover\MarsRoverInterface;
use AppBundle\Domain\Entity\Obstacle\ObstacleInterface;
use AppBundle\Domain\ValueObject\Coordinates;

class Map implements MapInterface
{
    private static $instance;

    private static $dimension;

    private $obstacles = array();

    private $marsRover = null;

    private function __construct()
    {
    }

    public static function create(Coordinates $coordinates) : ?MapInterface
    {
        $mapInstance = null;

        if (is_null(self::$instance)) {
            self::$dimension = $coordinates;
            self::$instance = new self();
            $mapInstance = self::$instance;
        }

        return $mapInstance;
    }

    public static function getInstance() : MapInterface
    {
        return self::$instance;
    }

    public static function getDimension() : Coordinates
    {
        return self::$dimension;
    }

    public function appendObstacle(ObstacleInterface $obstacle) : void
    {
        $this->obstacles[] = $obstacle;
    }

    public function appendMarsRover() : void
    {
        $this->marsRover = MarsRover::getInstance();
    }

    public static function positionIsOut(Coordinates $coordinates) : bool
    {
        return $coordinates->x() > self::$dimension->x() || $coordinates->y() > self::$dimension->y();
    }

    /**
     * @return array
     */
    public function getObstacles(): array
    {
        return $this->obstacles;
    }

    public static function destroyMap()
    {
        MarsRover::destroy();
        self::$instance = null;
    }
}
