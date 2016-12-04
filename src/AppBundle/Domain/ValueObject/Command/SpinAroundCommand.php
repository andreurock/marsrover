<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 02/12/16
 * Time: 14:45
 */

namespace AppBundle\Domain\ValueObject\Command;

/**
 * Class SpinAroundCommand.
 * Implements the Command Pattern.
 * Tells the Mars Rover Remote Control that the command to perform is Spin Around.
 *
 * @package AppBundle\Domain\ValueObject\Command
 * @author Andreu Ros
 * @version 1.0 2016
 */
class SpinAroundCommand extends Command
{
    /**
     * @param $instruction
     * @return bool
     */
    public function execute($instruction)
    {
        return $this->marsRoverRemoteControl->spinAround($instruction);
    }
}
