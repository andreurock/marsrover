<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 02/12/16
 * Time: 15:33
 */

namespace Tests\AppBundle;


use AppBundle\Application\DataTransformer\MapDataTransformerObject;
use AppBundle\Application\DataTransformer\MarsRoverDataTransformerObject;
use AppBundle\Application\UseCase\CreateMap\CreateMap;
use AppBundle\Application\UseCase\CreateMap\CreateMapRequest;
use AppBundle\Application\UseCase\PlaceMarsRover\PlaceMarsRover;
use AppBundle\Application\UseCase\PlaceMarsRover\PlaceMarsRoverRequest;
use AppBundle\Application\UseCase\SendCommand\SendCommand;
use AppBundle\Application\UseCase\SendCommand\SendCommandRequest;
use AppBundle\Domain\Entity\Map\Map;
use AppBundle\Domain\Entity\MarsRover\MarsRover;
use AppBundle\Domain\Service\MarsRoverRemoteControl;
use AppBundle\Domain\ValueObject\Command\Command;
use AppBundle\Domain\ValueObject\Direction;


class SendCommandTest extends \PHPUnit_Framework_TestCase
{
    public function testSendCommandMoveUp()
    {
        Map::destroyMap();
        $mapObjectDataTransformer = new MapDataTransformerObject();
        $createMap = new CreateMap($mapObjectDataTransformer);
        $request = new CreateMapRequest(10, 10);
        $createMap->execute($request);

        $marsRoverObjectDataTransformer = new MarsRoverDataTransformerObject();
        $placeMarsRover = new PlaceMarsRover($marsRoverObjectDataTransformer);
        $request = new PlaceMarsRoverRequest(8, 3, Direction::EAST);
        $placeMarsRover->execute($request);

        $sendCommandRequest = new SendCommandRequest(Command::MOVE, MarsRoverRemoteControl::MOVE_UP);
        $sendCommand = new SendCommand();
        $sendCommand->execute($sendCommandRequest);
        $position = MarsRover::getPosition();

        $this->assertEquals(8, $position->x());
        $this->assertEquals(4, $position->y());
    }

    public function testSendCommandMoveDownLimit()
    {
        Map::destroyMap();
        $mapObjectDataTransformer = new MapDataTransformerObject();
        $createMap = new CreateMap($mapObjectDataTransformer);
        $request = new CreateMapRequest(10, 10);
        $createMap->execute($request);

        $marsRoverObjectDataTransformer = new MarsRoverDataTransformerObject();
        $placeMarsRover = new PlaceMarsRover($marsRoverObjectDataTransformer);
        $request = new PlaceMarsRoverRequest(8, 1, Direction::EAST);
        $placeMarsRover->execute($request);

        $sendCommandRequest = new SendCommandRequest(Command::MOVE, MarsRoverRemoteControl::MOVE_UP);
        $sendCommand = new SendCommand();
        $sendCommand->execute($sendCommandRequest);
        $position = MarsRover::getPosition();

        $this->assertEquals(8, $position->x());
        $this->assertEquals(4, $position->y());
    }
}
