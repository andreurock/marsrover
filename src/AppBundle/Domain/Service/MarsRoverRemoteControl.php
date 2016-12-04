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

/**
 * Class MarsRoverRemoteControl
 * Controls and sends commands to the Mars Rover
 *
 * @package AppBundle\Domain\Service
 * @author Andreu Ros
 * @version 1.0 2016
 */
class MarsRoverRemoteControl
{
    const MOVE_FORWARD = 1;
    const MOVE_BACKWARD = 2;
    const SPIN_AROUND_LEFT = 'L';
    const SPIN_AROUND_RIGHT = 'R';

    /**
     * Moves the Mars Rover to a determined position
     *
     * @param int $move
     * @return bool
     * @throws MarsRoverRemoteControlException
     */
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

        return $moveStrategy->move();
    }

    /**
     * Spins around the Mars Rover to a determined direction
     *
     * @param string $direction
     * @return bool
     * @throws MarsRoverRemoteControlException
     */
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

        return $spinAroundStrategy->spinAround();
    }
}
