<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 02/12/16
 * Time: 12:53
 */

namespace AppBundle\Application\UseCase\PlaceMarsRover;


use AppBundle\Application\UseCase\MarsRoverException;

class PlaceMarsRoverException extends MarsRoverException
{
    const INVALID_PLACE = 1;
}