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

/**
 * Class Map
 * A map implementation. Implements the Singleton Pattern, as the map is a unique instance.
 *
 * @package AppBundle\Domain\Entity\Map
 * @author Andreu Ros
 * @version 1.0 2016
 */
class Map implements MapInterface
{
    /**
     * @var MapInterface
     */
    private static $instance;

    /**
     * @var Coordinates
     */
    private static $dimension;

    /**
     * @var array
     */
    private $obstacles = array();

    /**
     * @var MarsRoverInterface
     */
    private $marsRover = null;


    private function __construct()
    {
    }

    /**
     * @param Coordinates $coordinates
     * @return MapInterface|null
     */
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

    /**
     * @return MapInterface
     */
    public static function getInstance() : MapInterface
    {
        return self::$instance;
    }

    /**
     * @return Coordinates
     */
    public static function getDimension() : Coordinates
    {
        return self::$dimension;
    }

    /**
     * Places an obstacle on the map
     * @param ObstacleInterface $obstacle
     */
    public function appendObstacle(ObstacleInterface $obstacle) : void
    {
        $this->obstacles[] = $obstacle;
    }

    /**
     * Places the Mars Rover on the map
     */
    public function appendMarsRover() : void
    {
        $this->marsRover = MarsRover::getInstance();
    }

    /**
     * Says if a determined pair of coordinates are out of the map
     *
     * @param Coordinates $coordinates
     * @return bool
     */
    public static function positionIsOut(Coordinates $coordinates) : bool
    {
        return ($coordinates->x() > self::$dimension->x()
            || $coordinates->y() > self::$dimension->y()
            || $coordinates->x() < Coordinates::INITIAL_COORDINATE
            || $coordinates->y() < Coordinates::INITIAL_COORDINATE
        );
    }

    /**
     * @return array
     */
    public function getObstacles(): array
    {
        return $this->obstacles;
    }

    /**
     * Destroys the map unique instance
     */
    public static function destroyMap()
    {
        MarsRover::destroy();
        self::$instance = null;
    }
}
