<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 02/12/16
 * Time: 15:32
 */

namespace AppBundle\Application\UseCase\SendCommand;


final class SendCommand
{
    public function execute(SendCommandRequest $request) : SendCommandResponse
    {
        $command = $request->getCommand();
        $instruction = $request->getInstruction();

        $command->execute($instruction);

        return new SendCommandResponse();
    }
}
