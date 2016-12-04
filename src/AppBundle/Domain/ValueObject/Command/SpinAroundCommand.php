<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 02/12/16
 * Time: 14:45
 */

namespace AppBundle\Domain\ValueObject\Command;


class SpinAroundCommand extends Command
{
    public function execute($instruction)
    {
        $this->marsRoverRemoteControl->spinAround($instruction);
    }
}
