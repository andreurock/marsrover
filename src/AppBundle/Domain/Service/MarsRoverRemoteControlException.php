<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 4/12/16
 * Time: 11:29
 */

namespace AppBundle\Domain\Service;


use AppBundle\Application\UseCase\MarsRoverException;

class MarsRoverRemoteControlException extends MarsRoverException
{
    const INVALID_MOVE = 1;
    const INVALID_SPIN = 2;
}
