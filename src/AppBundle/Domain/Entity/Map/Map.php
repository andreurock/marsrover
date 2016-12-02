<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 1/12/16
 * Time: 20:28
 */

namespace AppBundle\Domain\Entity\Map;

use AppBundle\Domain\ValueObject\Coordinates;

class Map implements MapInterface
{
    private static $instance;

    private static $dimension;

    private function __construct()
    {
    }

    public static function create(Coordinates $coordinates) : self
    {
        $mapInstance = null;

        if (is_null(self::$instance)) {
            self::$dimension = $coordinates;
            self::$instance = new self();
            $mapInstance = self::$instance;
        }

        return $mapInstance;
    }

    public static function getInstance() : self
    {
        return self::$instance;
    }

    public static function getDimension() : Coordinates
    {
        return self::$dimension;
    }
}
