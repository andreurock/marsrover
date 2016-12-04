<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 4/12/16
 * Time: 12:07
 */

namespace AppBundle\Application\UseCase\SendCommand;


use AppBundle\Application\UseCase\MarsRoverException;

class SendCommandException extends MarsRoverException
{
    const OBSTACLE_FOUND = 1;
}
