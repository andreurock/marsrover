<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 02/12/16
 * Time: 14:15
 */

namespace AppBundle\Domain\Service;


use AppBundle\Domain\ValueObject\MoveStrategy\MoveDownStrategy;
use AppBundle\Domain\ValueObject\MoveStrategy\MoveUpStrategy;
use AppBundle\Domain\ValueObject\SpinAroundStrategy\SpinAroundLeftStrategy;
use AppBundle\Domain\ValueObject\SpinAroundStrategy\SpinAroundRightStrategy;

class MarsRoverRemoteControl
{
    const MOVE_UP = 1;
    const MOVE_DOWN = 2;
    const SPIN_AROUND_LEFT = 'L';
    const SPIN_AROUND_RIGHT = 'R';

    public function move(int $move)
    {
        $moveStrategy = null;

        switch ($move) {
            case self::MOVE_UP:
                $moveStrategy = new MoveUpStrategy();
                break;
            case self::MOVE_DOWN:
                $moveStrategy = new MoveDownStrategy();
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
        }

        $spinAroundStrategy->spinAround();
    }
}
