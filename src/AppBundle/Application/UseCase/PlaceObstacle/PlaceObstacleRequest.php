<?php
namespace AppBundle\Application\UseCase\PlaceObstacle;

/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 02/12/16
 * Time: 11:31
 */
final class PlaceObstacleRequest
{
    private $x;

    private $y;

    /**
     * CreateMapRequest constructor.
     * @param $x
     * @param $y
     */
    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * @return mixed
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * @return mixed
     */
    public function getY()
    {
        return $this->y;
    }
}
