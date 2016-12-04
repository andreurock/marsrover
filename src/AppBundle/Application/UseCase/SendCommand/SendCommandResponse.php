<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 02/12/16
 * Time: 15:47
 */

namespace AppBundle\Application\UseCase\SendCommand;

use AppBundle\Domain\Entity\MarsRover\MarsRover;

/**
 * Class SendCommandResponse
 * Returns the Mars Rover instance
 *
 * @package AppBundle\Application\UseCase\SendCommand
 * @author Andreu Ros
 * @version 1.0 2016
 */
final class SendCommandResponse
{
    /**
     * @return \AppBundle\Domain\Entity\MarsRover\MarsRoverInterface
     */
    public function getMarsRover()
    {
        return MarsRover::getInstance();
    }
}
