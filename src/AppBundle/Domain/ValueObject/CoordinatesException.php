<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 02/12/16
 * Time: 12:01
 */

namespace AppBundle\Domain\ValueObject;


use AppBundle\Application\UseCase\MarsRoverException;

class CoordinatesException extends MarsRoverException
{
    const INVALID_COORDINATES = 1;
}
