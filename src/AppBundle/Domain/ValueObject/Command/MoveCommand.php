<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 02/12/16
 * Time: 14:44
 */

namespace AppBundle\Domain\ValueObject\Command;


class MoveCommand extends Command
{
    public function execute($instruction)
    {
        $this->marsRoverRemoteControl->move($instruction);
    }
}
