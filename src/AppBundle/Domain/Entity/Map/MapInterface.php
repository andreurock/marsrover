<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 1/12/16
 * Time: 20:30
 */

namespace AppBundle\Domain\Entity\Map;

use AppBundle\Domain\ValueObject\Coordinates;

interface MapInterface
{
    public static function create(Coordinates $coordinates);

    public static function getInstance();

    public static function getDimension() : Coordinates;
}
