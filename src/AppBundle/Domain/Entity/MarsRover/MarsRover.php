<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 02/12/16
 * Time: 12:26
 */

namespace AppBundle\Domain\Entity\MarsRover;

use AppBundle\Domain\Entity\Map\Map;
use AppBundle\Domain\ValueObject\Coordinates;

/**
 * Class MarsRover
 * A Mars Rover implementation. Implements the Singleton Pattern, as the Mars Rover is a unique instance on the map.
 *
 * @package AppBundle\Domain\Entity\MarsRover
 * @author Andreu Ros
 * @version 1.0 2016
 */
class MarsRover implements MarsRoverInterface
{
    /**
     * @var MarsRover
     */
    private static $instance;

    /**
     * @var Coordinates
     */
    private static $position;

    /**
     * @var string
     */
    private static $direction;

    /**
     * MarsRover constructor.
     */
    private function __construct()
    {
    }

    /**
     * Creates and places the Mars Rover on the map
     *
     * @param Coordinates $coordinates
     * @param string $direction
     * @return MarsRoverInterface|null
     */
    public static function placeInMap(Coordinates $coordinates, string $direction) : ?MarsRoverInterface
    {
        $marsRoverInstance = null;

        if (! Map::positionIsOut($coordinates) && ! self::collisionWithObject($coordinates) && is_null(self::$instance)) {
            self::$position = $coordinates;
            self::$direction = $direction;
            self::$instance = new self();
            $marsRoverInstance = self::$instance;
            $map = Map::getInstance();
            $map->appendMarsRover();
        }

        return $marsRoverInstance;
    }

    /**
     * Moves the Mars Rover to a determined position if there's not a collision with an object
     *
     * @param Coordinates $newPosition
     * @return bool
     */
    public function moveTo(Coordinates $newPosition) : bool
    {
        if (self::collisionWithObject($newPosition)) {
            return false;
        }

        self::$position = $newPosition;

        return true;
    }

    /**
     * Makes the Mars Rover turn to a determined direction
     * @param string $direction
     */
    public function turnTo(string $direction)
    {
        self::$direction = $direction;
    }

    /**
     * @return MarsRoverInterface
     */
    public static function getInstance() : MarsRoverInterface
    {
        return self::$instance;
    }

    /**
     * @return Coordinates
     */
    public static function getPosition() : Coordinates
    {
        return self::$position;
    }

    /**
     * @return string
     */
    public static function getDirection() : string
    {
        return self::$direction;
    }

    /**
     * Destroys the mars rover unique instance
     */
    public static function destroy() : void
    {
        self::$instance = null;
    }

    /**
     * Checks if there will be a collision with an object
     *
     * @param Coordinates $coordinates
     * @return bool
     */
    private static function collisionWithObject(Coordinates $coordinates) : bool
    {
        $map = Map::getInstance();
        $placedObstacles = $map->getObstacles();

        foreach ($placedObstacles as $obstacle) {
            if ($coordinates->equals($obstacle->getCoordinates())) {
                return true;
            }
        }

        return false;
    }
}
