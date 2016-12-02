<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 1/12/16
 * Time: 20:14
 */

namespace Tests\AppBundle\Application\UseCase;


use AppBundle\Application\DataTransfomer\MapDataTransformerObject;
use AppBundle\Application\UseCase\CreateMap\CreateMap;
use AppBundle\Application\UseCase\CreateMap\CreateMapException;
use AppBundle\Application\UseCase\CreateMap\CreateMapRequest;


class CreateMapTest extends \PHPUnit_Framework_TestCase
{
    public function testNewMap()
    {
        $mapObjectDataTransformer = new MapDataTransformerObject();
        $createMap = new CreateMap($mapObjectDataTransformer);
        $request = new CreateMapRequest(10, 10);
        $response = $createMap->execute($request);
        $map = $response->getMap();
    }

    public function testMapAlreadyCreated()
    {

    }
}
