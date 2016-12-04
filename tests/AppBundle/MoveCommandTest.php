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
use AppBundle\Application\DataTransformer\ObstacleDataTransformerObject;
use AppBundle\Application\UseCase\CreateMap\CreateMap;
use AppBundle\Application\UseCase\CreateMap\CreateMapRequest;
use AppBundle\Application\UseCase\PlaceMarsRover\PlaceMarsRover;
use AppBundle\Application\UseCase\PlaceMarsRover\PlaceMarsRoverRequest;
use AppBundle\Application\UseCase\PlaceObstacle\PlaceObstacle;
use AppBundle\Application\UseCase\PlaceObstacle\PlaceObstacleRequest;
use AppBundle\Application\UseCase\SendCommand\SendCommand;
use AppBundle\Application\UseCase\SendCommand\SendCommandRequest;
use AppBundle\Domain\Entity\Map\Map;
use AppBundle\Domain\Entity\MarsRover\MarsRover;
use AppBundle\Domain\Service\MarsRoverRemoteControl;
use AppBundle\Domain\ValueObject\Command\Command;
use AppBundle\Domain\ValueObject\Direction;


class MoveCommandTest extends \PHPUnit_Framework_TestCase
{
    public function testSendCommandMoveForwardNorth()
    {
        Map::destroyMap();
        $mapObjectDataTransformer = new MapDataTransformerObject();
        $createMap = new CreateMap($mapObjectDataTransformer);
        $request = new CreateMapRequest(10, 10);
        $createMap->execute($request);

        $marsRoverObjectDataTransformer = new MarsRoverDataTransformerObject();
        $placeMarsRover = new PlaceMarsRover($marsRoverObjectDataTransformer);
        $request = new PlaceMarsRoverRequest(8, 3, Direction::NORTH);
        $placeMarsRover->execute($request);

        $sendCommandRequest = new SendCommandRequest(Command::MOVE, MarsRoverRemoteControl::MOVE_FORWARD);
        $sendCommand = new SendCommand();
        $sendCommand->execute($sendCommandRequest);
        $position = MarsRover::getPosition();

        $this->assertEquals(8, $position->x());
        $this->assertEquals(4, $position->y());
        $this->assertEquals(Direction::NORTH, MarsRover::getDirection());
    }

    public function testSendCommandMoveBackwardNorthLimit()
    {
        Map::destroyMap();
        $mapObjectDataTransformer = new MapDataTransformerObject();
        $createMap = new CreateMap($mapObjectDataTransformer);
        $request = new CreateMapRequest(10, 10);
        $createMap->execute($request);

        $marsRoverObjectDataTransformer = new MarsRoverDataTransformerObject();
        $placeMarsRover = new PlaceMarsRover($marsRoverObjectDataTransformer);
        $request = new PlaceMarsRoverRequest(8, 1, Direction::NORTH);
        $placeMarsRover->execute($request);

        $sendCommandRequest = new SendCommandRequest(Command::MOVE, MarsRoverRemoteControl::MOVE_BACKWARD);
        $sendCommand = new SendCommand();
        $sendCommand->execute($sendCommandRequest);
        $position = MarsRover::getPosition();

        $this->assertEquals(8, $position->x());
        $this->assertEquals(10, $position->y());
        $this->assertEquals(Direction::NORTH, MarsRover::getDirection());
    }

    public function testSendCommandMoveForwardEastLimit()
    {
        Map::destroyMap();
        $mapObjectDataTransformer = new MapDataTransformerObject();
        $createMap = new CreateMap($mapObjectDataTransformer);
        $request = new CreateMapRequest(10, 10);
        $createMap->execute($request);

        $marsRoverObjectDataTransformer = new MarsRoverDataTransformerObject();
        $placeMarsRover = new PlaceMarsRover($marsRoverObjectDataTransformer);
        $request = new PlaceMarsRoverRequest(10, 5, Direction::EAST);
        $placeMarsRover->execute($request);

        $sendCommandRequest = new SendCommandRequest(Command::MOVE, MarsRoverRemoteControl::MOVE_FORWARD);
        $sendCommand = new SendCommand();
        $sendCommand->execute($sendCommandRequest);
        $position = MarsRover::getPosition();

        $this->assertEquals(1, $position->x());
        $this->assertEquals(5, $position->y());
        $this->assertEquals(Direction::EAST, MarsRover::getDirection());
    }

    public function testSendCommandMoveBackwardWest()
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

        $sendCommandRequest = new SendCommandRequest(Command::MOVE, MarsRoverRemoteControl::MOVE_BACKWARD);
        $sendCommand = new SendCommand();
        $sendCommand->execute($sendCommandRequest);
        $position = MarsRover::getPosition();

        $this->assertEquals(10, $position->x());
        $this->assertEquals(3, $position->y());
        $this->assertEquals(Direction::WEST, MarsRover::getDirection());
    }

    /**
     * @expectedException AppBundle\Application\UseCase\SendCommand\SendCommandException
     * @expectedExceptionCode AppBundle\Application\UseCase\SendCommand\SendCommandException::OBSTACLE_FOUND
     */
    public function testCollisionWithObject()
    {
        Map::destroyMap();
        $mapObjectDataTransformer = new MapDataTransformerObject();
        $createMap = new CreateMap($mapObjectDataTransformer);
        $request = new CreateMapRequest(10, 10);
        $createMap->execute($request);

        $obstacleObjectDataTransformer = new ObstacleDataTransformerObject();
        $placeObstacle = new PlaceObstacle($obstacleObjectDataTransformer);
        $request = new PlaceObstacleRequest(6, 5);
        $response = $placeObstacle->execute($request);

        $marsRoverObjectDataTransformer = new MarsRoverDataTransformerObject();
        $placeMarsRover = new PlaceMarsRover($marsRoverObjectDataTransformer);
        $request = new PlaceMarsRoverRequest(5, 5, Direction::WEST);
        $placeMarsRover->execute($request);

        $sendCommandRequest = new SendCommandRequest(Command::MOVE, MarsRoverRemoteControl::MOVE_BACKWARD);
        $sendCommand = new SendCommand();
        $sendCommand->execute($sendCommandRequest);
    }
}
