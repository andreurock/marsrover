<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 02/12/16
 * Time: 14:42
 */

namespace AppBundle\Domain\ValueObject\Command;


use AppBundle\Domain\Service\MarsRoverRemoteControl;

abstract class Command
{
    const MOVE = 'move';

    const SPIN_AROUND = 'spinaround';

    protected $marsRoverRemoteControl;

    function __construct(MarsRoverRemoteControl $marsRoverRemoteControl)
    {
        $this->marsRoverRemoteControl = $marsRoverRemoteControl;
    }

    abstract function execute($instruction);
}
