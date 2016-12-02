<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 02/12/16
 * Time: 12:58
 */

namespace Tests\AppBundle;


use AppBundle\Application\DataTransformer\MapDataTransformerObject;
use AppBundle\Application\DataTransformer\MarsRoverDataTransformerObject;
use AppBundle\Application\DataTransformer\ObstacleDataTransformerObject;
use AppBundle\Application\UseCase\CreateMap\CreateMap;
use AppBundle\Application\UseCase\CreateMap\CreateMapException;
use AppBundle\Application\UseCase\CreateMap\CreateMapRequest;
use AppBundle\Application\UseCase\PlaceMarsRover\PlaceMarsRover;
use AppBundle\Application\UseCase\PlaceMarsRover\PlaceMarsRoverRequest;
use AppBundle\Application\UseCase\PlaceObstacle\PlaceObstacle;
use AppBundle\Application\UseCase\PlaceObstacle\PlaceObstacleException;
use AppBundle\Application\UseCase\PlaceObstacle\PlaceObstacleRequest;


class PlaceMarsRoverTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException AppBundle\Application\UseCase\PlaceMarsRover\PlaceMarsRoverException
     * @expectedExceptionCode AppBundle\Application\UseCase\PlaceMarsRover\PlaceMarsRoverException::INVALID_PLACE
     */
    public function testPlaceMarsRoverOutOfMap()
    {
        $mapObjectDataTransformer = new MapDataTransformerObject();
        $createMap = new CreateMap($mapObjectDataTransformer);
        $request = new CreateMapRequest(10, 10);

        try {
            $createMap->execute($request);
        }
        catch (CreateMapException $exception) {
            // Map already created, that's OK!
        }

        $marsRoverObjectDataTransformer = new MarsRoverDataTransformerObject();
        $placeMarsRover = new PlaceMarsRover($marsRoverObjectDataTransformer);
        $request = new PlaceMarsRoverRequest(11, 3);
        $response = $placeMarsRover->execute($request);
        $response->getMarsRover();
//
//        $this->assertInstanceOf('AppBundle\Domain\Entity\Obstacle\Obstacle', $marsRover);
//        $this->assertInstanceOf('AppBundle\Domain\ValueObject\Coordinates', $marsRover->getPosition());
//        $this->assertEquals(2, $marsRover->getPosition()->x());
//        $this->assertEquals(4, $marsRover->getPosition()->y());
    }

    public function testPlaceMarsRoverOntoObstacle()
    {
        $obstacleObjectDataTransformer = new ObstacleDataTransformerObject();
        $placeObstacle = new PlaceObstacle($obstacleObjectDataTransformer);
        $request = new PlaceObstacleRequest(2, 4);

        try {
            $placeObstacle->execute($request);
        }
        catch (PlaceObstacleException $exception) {
            // Obstacle already created, that's OK!
        }


    }
}
