<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 02/12/16
 * Time: 12:21
 */

namespace AppBundle\Domain\Entity\MarsRover;


use AppBundle\Domain\ValueObject\Coordinates;


interface MarsRoverInterface
{
    public static function placeInMap(Coordinates $coordinates, string $direction) : ?self;

    public static function getInstance() : self;

    public static function getPosition() : Coordinates;

    public static function getDirection() : string;

    public function moveTo(Coordinates $coordinates) : bool;

    public function turnTo(string $direction);
}
