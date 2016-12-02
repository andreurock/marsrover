<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 1/12/16
 * Time: 21:37
 */

namespace AppBundle\Application\UseCase\CreateMap;

use AppBundle\Application\UseCase\MarsRoverException;

class CreateMapException extends MarsRoverException
{
    const MAP_ALREADY_CREATED = 1;
}
