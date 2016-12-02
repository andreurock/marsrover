<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 02/12/16
 * Time: 11:15
 */

namespace Tests\AppBundle;


use AppBundle\Application\UseCase\PlaceObstacle\PlaceObstacle;


class PlaceObstacleTest extends \PHPUnit_Framework_TestCase
{
    public function testPlaceObstacle()
    {
        $obstacleObjectDataTransformer = new ObstacleDataTransformerObject();
        $placeObstacle = new PlaceObstacle($obstacleObjectDataTransformer);
        $request = new PlaceObstacleRequest(10, 10);
        $response = $placeObstacle->execute($request);
//        $map = $response->getMap();
    }
}
