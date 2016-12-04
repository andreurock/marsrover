<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 02/12/16
 * Time: 14:15
 */

namespace AppBundle\Domain\Service;


use AppBundle\Domain\ValueObject\MoveStrategy\MoveBackwardStrategy;
use AppBundle\Domain\ValueObject\MoveStrategy\MoveForwardStrategy;
use AppBundle\Domain\ValueObject\SpinAroundStrategy\SpinAroundLeftStrategy;
use AppBundle\Domain\ValueObject\SpinAroundStrategy\SpinAroundRightStrategy;

class MarsRoverRemoteControl
{
    const MOVE_FORWARD = 1;
    const MOVE_BACKWARD = 2;
    const SPIN_AROUND_LEFT = 'L';
    const SPIN_AROUND_RIGHT = 'R';

    public function move(int $move)
    {
        $moveStrategy = null;

        switch ($move) {
            case self::MOVE_FORWARD:
                $moveStrategy = new MoveForwardStrategy();
                break;
            case self::MOVE_BACKWARD:
                $moveStrategy = new MoveBackwardStrategy();
                break;
            default:
                throw new MarsRoverRemoteControlException("Invalid move", MarsRoverRemoteControlException::INVALID_MOVE);
                break;
        }

        $moveStrategy->move();
    }

    public function spinAround(string $direction)
    {
        $spinAroundStrategy = null;

        switch ($direction) {
            case self::SPIN_AROUND_LEFT:
                $spinAroundStrategy = new SpinAroundLeftStrategy();
                break;
            case self::SPIN_AROUND_RIGHT:
                $spinAroundStrategy = new SpinAroundRightStrategy();
                break;
            default:
                throw new MarsRoverRemoteControlException("Invalid spin", MarsRoverRemoteControlException::INVALID_SPIN);
                break;

        }

        $spinAroundStrategy->spinAround();
    }
}
