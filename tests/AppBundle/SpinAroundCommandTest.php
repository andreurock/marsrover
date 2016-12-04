<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 4/12/16
 * Time: 11:40
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


class SpinAroundCommandTest extends \PHPUnit_Framework_TestCase
{
    public function testSpinAroundRightNorth()
    {
        Map::destroyMap();
        $mapObjectDataTransformer = new MapDataTransformerObject();
        $createMap = new CreateMap($mapObjectDataTransformer);
        $request = new CreateMapRequest(10, 10);
        $createMap->execute($request);

        $marsRoverObjectDataTransformer = new MarsRoverDataTransformerObject();
        $placeMarsRover = new PlaceMarsRover($marsRoverObjectDataTransformer);
        $request = new PlaceMarsRoverRequest(9, 3, Direction::NORTH);
        $placeMarsRover->execute($request);

        $sendCommandRequest = new SendCommandRequest(Command::SPIN_AROUND, MarsRoverRemoteControl::SPIN_AROUND_RIGHT);
        $sendCommand = new SendCommand();
        $sendCommand->execute($sendCommandRequest);

        $this->assertEquals(Direction::EAST, MarsRover::getDirection());
        $this->assertEquals(9, MarsRover::getPosition()->x());
        $this->assertEquals(3, MarsRover::getPosition()->y());
    }

    public function testSpinAroundLeftWest()
    {
        Map::destroyMap();
        $mapObjectDataTransformer = new MapDataTransformerObject();
        $createMap = new CreateMap($mapObjectDataTransformer);
        $request = new CreateMapRequest(10, 10);
        $createMap->execute($request);

        $marsRoverObjectDataTransformer = new MarsRoverDataTransformerObject();
        $placeMarsRover = new PlaceMarsRover($marsRoverObjectDataTransformer);
        $request = new PlaceMarsRoverRequest(9, 3, Direction::WEST);
        $placeMarsRover->execute($request);

        $sendCommandRequest = new SendCommandRequest(Command::SPIN_AROUND, MarsRoverRemoteControl::SPIN_AROUND_LEFT);
        $sendCommand = new SendCommand();
        $sendCommand->execute($sendCommandRequest);

        $this->assertEquals(Direction::SOUTH, MarsRover::getDirection());
        $this->assertEquals(9, MarsRover::getPosition()->x());
        $this->assertEquals(3, MarsRover::getPosition()->y());
    }

    public function testSpinAroundRightWest()
    {
        Map::destroyMap();
        $mapObjectDataTransformer = new MapDataTransformerObject();
        $createMap = new CreateMap($mapObjectDataTransformer);
        $request = new CreateMapRequest(10, 10);
        $createMap->execute($request);

        $marsRoverObjectDataTransformer = new MarsRoverDataTransformerObject();
        $placeMarsRover = new PlaceMarsRover($marsRoverObjectDataTransformer);
        $request = new PlaceMarsRoverRequest(9, 3, Direction::WEST);
        $placeMarsRover->execute($request);

        $sendCommandRequest = new SendCommandRequest(Command::SPIN_AROUND, MarsRoverRemoteControl::SPIN_AROUND_RIGHT);
        $sendCommand = new SendCommand();
        $sendCommand->execute($sendCommandRequest);

        $this->assertEquals(Direction::NORTH, MarsRover::getDirection());
        $this->assertEquals(9, MarsRover::getPosition()->x());
        $this->assertEquals(3, MarsRover::getPosition()->y());
    }

    public function testSpinAroundLeftSouth()
    {
        Map::destroyMap();
        $mapObjectDataTransformer = new MapDataTransformerObject();
        $createMap = new CreateMap($mapObjectDataTransformer);
        $request = new CreateMapRequest(10, 10);
        $createMap->execute($request);

        $marsRoverObjectDataTransformer = new MarsRoverDataTransformerObject();
        $placeMarsRover = new PlaceMarsRover($marsRoverObjectDataTransformer);
        $request = new PlaceMarsRoverRequest(9, 3, Direction::SOUTH);
        $placeMarsRover->execute($request);

        $sendCommandRequest = new SendCommandRequest(Command::SPIN_AROUND, MarsRoverRemoteControl::SPIN_AROUND_LEFT);
        $sendCommand = new SendCommand();
        $sendCommand->execute($sendCommandRequest);

        $this->assertEquals(Direction::EAST, MarsRover::getDirection());
        $this->assertEquals(9, MarsRover::getPosition()->x());
        $this->assertEquals(3, MarsRover::getPosition()->y());
    }
}
