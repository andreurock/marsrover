<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 1/12/16
 * Time: 21:10
 */

namespace AppBundle\Application\UseCase\CreateMap;

/**
 * Class CreateMapRequest
 * Takes two coordinates to determine the dimension of the map
 *
 * @package AppBundle\Application\UseCase\CreateMap
 * @author Andreu Ros
 * @version 1.0 2016
 */
final class CreateMapRequest
{
    /**
     * @var int
     */
    private $x;

    /**
     * @var int
     */
    private $y;

    /**
     * CreateMapRequest constructor.
     * @param int $x
     * @param int $y
     */
    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * @return int
     */
    public function getX() : int
    {
        return $this->x;
    }

    /**
     * @return int
     */
    public function getY() : int
    {
        return $this->y;
    }
}
