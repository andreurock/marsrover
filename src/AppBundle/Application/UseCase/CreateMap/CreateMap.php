<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 1/12/16
 * Time: 21:03
 */

namespace AppBundle\Application\UseCase\CreateMap;

use AppBundle\Application\DataTransformer\MapDataTransformer;
use AppBundle\Domain\Entity\Map\Map;
use AppBundle\Domain\ValueObject\Coordinates;

final class CreateMap
{
    private $mapDataTransformer;

    public function __construct(MapDataTransformer $mapDataTransformer)
    {
        $this->mapDataTransformer = $mapDataTransformer;
    }

    public function execute(CreateMapRequest $request) : CreateMapResponse
    {
        $x = $request->getX();
        $y = $request->getY();
        $coordinates = new Coordinates($x, $y);
        $map = Map::create($coordinates);

        if (is_null($map)) {
            throw new CreateMapException("Map already created!", CreateMapException::MAP_ALREADY_CREATED);
        }

        $this->mapDataTransformer->write($map);

        return new CreateMapResponse($this->mapDataTransformer->read());
    }
}
