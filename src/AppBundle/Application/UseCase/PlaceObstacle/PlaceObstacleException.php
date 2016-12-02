<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 02/12/16
 * Time: 11:43
 */

namespace AppBundle\Application\UseCase\PlaceObstacle;


use AppBundle\Application\UseCase\MarsRoverException;

class PlaceObstacleException extends MarsRoverException
{
    const OBSTACLE_ALREADY_PLACED = 1;
}
