<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 1/12/16
 * Time: 21:23
 */

namespace AppBundle\Application\UseCase\CreateMap;

use AppBundle\Domain\Entity\Map\MapInterface;

final class CreateMapResponse
{
    private $map;

    public function __construct($map)
    {
        $this->map = $map;
    }

    public function getMap()
    {
        return $this->map;
    }
}
