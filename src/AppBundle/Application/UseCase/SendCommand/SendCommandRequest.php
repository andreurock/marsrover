<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 02/12/16
 * Time: 15:43
 */

namespace AppBundle\Application\UseCase\SendCommand;

use AppBundle\Domain\Service\MarsRoverRemoteControl;
use AppBundle\Domain\ValueObject\Command\Command;
use AppBundle\Domain\ValueObject\Command\MoveCommand;
use AppBundle\Domain\ValueObject\Command\SpinAroundCommand;

/**
 * Class SendCommandRequest
 * Takes a command and a instruction to tell the Mars Rover to perform a determined action
 *
 * @package AppBundle\Application\UseCase\SendCommand
 * @author Andreu Ros
 * @version 1.0 2016
 */
final class SendCommandRequest
{
    /**
     * @var Command
     */
    private $command;

    /**
     * @var mixed
     */
    private $instruction;

    /**
     * SendCommandRequest constructor.
     * @param $command
     * @param $instruction
     */
    public function __construct(string $command, $instruction)
    {
        switch ($command) {
            case Command::MOVE:
                $this->command = new MoveCommand(new MarsRoverRemoteControl());
                break;
            case Command::SPIN_AROUND:
                $this->command = new SpinAroundCommand(new MarsRoverRemoteControl());
                break;
        }

        $this->instruction = $instruction;
    }

    /**
     * @return Command
     */
    public function getCommand(): Command
    {
        return $this->command;
    }

    /**
     * @return mixed
     */
    public function getInstruction()
    {
        return $this->instruction;
    }
}
