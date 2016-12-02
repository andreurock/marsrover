<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 02/12/16
 * Time: 11:15
 */

namespace Tests\AppBundle;


use AppBundle\Application\DataTransformer\MapDataTransformerObject;
use AppBundle\Application\DataTransformer\ObstacleDataTransformerObject;
use AppBundle\Application\UseCase\CreateMap\CreateMap;
use AppBundle\Application\UseCase\CreateMap\CreateMapException;
use AppBundle\Application\UseCase\CreateMap\CreateMapRequest;
use AppBundle\Application\UseCase\PlaceObstacle\PlaceObstacle;
use AppBundle\Application\UseCase\PlaceObstacle\PlaceObstacleRequest;


class PlaceObstacleTest extends \PHPUnit_Framework_TestCase
{
    public function testPlaceObstacle()
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

        $obstacleObjectDataTransformer = new ObstacleDataTransformerObject();
        $placeObstacle = new PlaceObstacle($obstacleObjectDataTransformer);
        $request = new PlaceObstacleRequest(2, 4);
        $response = $placeObstacle->execute($request);
        $obstacle = $response->getObstacle();

        $this->assertInstanceOf('AppBundle\Domain\Entity\Obstacle\Obstacle', $obstacle);
        $this->assertInstanceOf('AppBundle\Domain\ValueObject\Coordinates', $obstacle->getCoordinates());
        $this->assertEquals(2, $obstacle->getCoordinates()->x());
        $this->assertEquals(4, $obstacle->getCoordinates()->y());
    }

    /**
     * @expectedException AppBundle\Application\UseCase\PlaceObstacle\PlaceObstacleException
     * @expectedExceptionCode AppBundle\Application\UseCase\PlaceObstacle\PlaceObstacleException::OBSTACLE_ALREADY_PLACED
     */
    public function testPlaceObstacleOutOfMap()
    {
        $obstacleObjectDataTransformer = new ObstacleDataTransformerObject();
        $placeObstacle = new PlaceObstacle($obstacleObjectDataTransformer);
        $request = new PlaceObstacleRequest(16, 4);
        $placeObstacle->execute($request);
    }

    /**
     * @expectedException AppBundle\Application\UseCase\PlaceObstacle\PlaceObstacleException
     * @expectedExceptionCode AppBundle\Application\UseCase\PlaceObstacle\PlaceObstacleException::OBSTACLE_ALREADY_PLACED
     */
    public function testPlaceObstacleAlreadyPlaced()
    {
        $obstacleObjectDataTransformer = new ObstacleDataTransformerObject();
        $placeObstacle = new PlaceObstacle($obstacleObjectDataTransformer);
        $request = new PlaceObstacleRequest(2, 4);
        $placeObstacle->execute($request);
    }
}
