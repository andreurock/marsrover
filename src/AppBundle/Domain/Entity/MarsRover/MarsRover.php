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


class MarsRover implements MarsRoverInterface
{
    private static $instance;

    private static $position;

    private static $direction;

    private function __construct()
    {
    }

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

    public function moveTo(Coordinates $newPosition) : bool
    {
        if (self::collisionWithObject($newPosition)) {
            return false;
        }

        self::$position = $newPosition;

        return true;
    }

    public function turnTo(string $direction)
    {
        self::$direction = $direction;
    }

    public static function getInstance() : MarsRoverInterface
    {
        return self::$instance;
    }

    public static function getPosition() : Coordinates
    {
        return self::$position;
    }

    public static function getDirection() : string
    {
        return self::$direction;
    }

    public static function destroy() : void
    {
        self::$instance = null;
    }

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
