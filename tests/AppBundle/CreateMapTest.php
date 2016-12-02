<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 1/12/16
 * Time: 20:14
 */

namespace Tests\AppBundle;


use AppBundle\Application\DataTransformer\MapDataTransformerObject;
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

        $this->assertInstanceOf('AppBundle\Domain\Entity\Map\Map', $map);
        $this->assertInstanceOf('AppBundle\Domain\ValueObject\Coordinates', $map::getDimension());
        $this->assertEquals(10, $map::getDimension()->x());
        $this->assertEquals(10, $map::getDimension()->y());
    }

    /**
     * @expectedException AppBundle\Application\UseCase\CreateMap\CreateMapException
     * @expectedExceptionCode AppBundle\Application\UseCase\CreateMap\CreateMapException::MAP_ALREADY_CREATED
     */
    public function testMapAlreadyCreated()
    {
        $mapObjectDataTransformer = new MapDataTransformerObject();
        $createMap = new CreateMap($mapObjectDataTransformer);
        $request = new CreateMapRequest(15, 15);
        $createMap->execute($request);
    }
}
