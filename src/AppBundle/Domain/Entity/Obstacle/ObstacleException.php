<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 02/12/16
 * Time: 12:08
 */

namespace AppBundle\Domain\Entity\Obstacle;


use AppBundle\Application\UseCase\MarsRoverException;

class ObstacleException extends MarsRoverException
{
    const IS_OUT = 1;
}
