<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 02/12/16
 * Time: 12:26
 */

namespace AppBundle\Domain\Entity\MarsRover;


use AppBundle\Domain\Entity\Map\Map;
use AppBundle\Domain\Entity\Map\MapInterface;
use AppBundle\Domain\ValueObject\Coordinates;

class MarsRover implements MarsRoverInterface
{
    private static $instance;

    private static $position;

    private function __construct()
    {
    }

    public static function placeInMap(Coordinates $coordinates) : ?MarsRoverInterface
    {
        $marsRoverInstance = null;

        if (! Map::positionIsOut($coordinates)) {
            if (is_null(self::$instance)) {
                self::$position = $coordinates;
                self::$instance = new self();
                $marsRoverInstance = self::$instance;
                $map = Map::getInstance();
                $map->appendMarsRover();
            }
        }

        return $marsRoverInstance;
    }

    public static function getInstance() : MapInterface
    {
        return self::$instance;
    }
}
