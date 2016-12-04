<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 1/12/16
 * Time: 21:23
 */

namespace AppBundle\Application\UseCase\CreateMap;

use AppBundle\Domain\Entity\Map\MapInterface;

/**
 * Class CreateMapResponse
 * Returns the new map created
 *
 * @package AppBundle\Application\UseCase\CreateMap
 * @author Andreu Ros
 * @version 1.0 2016
 */
final class CreateMapResponse
{
    private $map;

    /**
     * CreateMapResponse constructor.
     * @param $map
     */
    public function __construct($map)
    {
        $this->map = $map;
    }

    /**
     * @return mixed
     */
    public function getMap()
    {
        return $this->map;
    }
}
