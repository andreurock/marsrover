<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 02/12/16
 * Time: 11:44
 */

namespace AppBundle\Application\UseCase\PlaceObstacle;


final class PlaceObstacleResponse
{
    private $obstacle;

    public function __construct($obstacle)
    {
        $this->obstacle = $obstacle;
    }

    public function getObstacle()
    {
        return $this->obstacle;
    }
}
