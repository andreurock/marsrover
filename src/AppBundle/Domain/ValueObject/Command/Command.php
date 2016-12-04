<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 02/12/16
 * Time: 14:42
 */

namespace AppBundle\Domain\ValueObject\Command;

use AppBundle\Domain\Service\MarsRoverRemoteControl;

/**
 * Class Command
 * Implements the Command Pattern. Tells to the Mars Rover Remote Control what command must perform and how.
 *
 * @package AppBundle\Domain\ValueObject\Command
 * @author Andreu Ros
 * @version 1.0 2016
 */
abstract class Command
{
    const MOVE = 'move';
    const SPIN_AROUND = 'spinaround';

    /**
     * @var MarsRoverRemoteControl
     */
    protected $marsRoverRemoteControl;

    /**
     * Command constructor.
     * @param MarsRoverRemoteControl $marsRoverRemoteControl
     */
    function __construct(MarsRoverRemoteControl $marsRoverRemoteControl)
    {
        $this->marsRoverRemoteControl = $marsRoverRemoteControl;
    }

    /**
     * @param $instruction
     * @return mixed
     */
    abstract function execute($instruction);
}
