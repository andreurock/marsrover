<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 02/12/16
 * Time: 12:21
 */

namespace AppBundle\Domain\Entity\MarsRover;

use AppBundle\Domain\ValueObject\Coordinates;

/**
 * Interface MarsRoverInterface
 * May implement the Singleton Pattern.
 *
 * @package AppBundle\Domain\Entity\MarsRover
 * @author Andreu Ros
 * @version 1.0 2016
 */
interface MarsRoverInterface
{
    public static function placeInMap(Coordinates $coordinates, string $direction) : ?self;

    public static function getInstance() : self;

    public static function getPosition() : Coordinates;

    public static function getDirection() : string;

    public function moveTo(Coordinates $coordinates) : bool;

    public function turnTo(string $direction);
}
