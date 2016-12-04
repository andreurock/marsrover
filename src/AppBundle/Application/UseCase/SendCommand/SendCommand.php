<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 02/12/16
 * Time: 15:32
 */

namespace AppBundle\Application\UseCase\SendCommand;

/**
 * Class SendCommand
 * Performs a command sent to the Mars Rover
 *
 * @package AppBundle\Application\UseCase\SendCommand
 * @author Andreu Ros
 * @version 1.0 2016
 */
final class SendCommand
{
    /**
     * @param SendCommandRequest $request
     * @return SendCommandResponse
     * @throws SendCommandException
     */
    public function execute(SendCommandRequest $request) : SendCommandResponse
    {
        $command = $request->getCommand();
        $instruction = $request->getInstruction();

        $ok = $command->execute($instruction);

        if (! $ok) {
            throw new SendCommandException("Couldn't move: There's an obstacle!", SendCommandException::OBSTACLE_FOUND);
        }

        return new SendCommandResponse();
    }
}
