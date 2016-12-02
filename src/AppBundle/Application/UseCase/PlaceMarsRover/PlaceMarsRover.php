<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 02/12/16
 * Time: 12:20
 */

namespace AppBundle\Application\UseCase\PlaceMarsRover;

use AppBundle\Application\DataTransformer\MarsRoverDataTransformer;
use AppBundle\Domain\Entity\MarsRover\MarsRover;
use AppBundle\Domain\ValueObject\Coordinates;

final class PlaceMarsRover
{
    private $marsRoverDataTransformer;

    /**
     * PlaceMarsRover constructor.
     * @param MarsRoverDataTransformer $marsRoverDataTransformer
     */
    public function __construct(MarsRoverDataTransformer $marsRoverDataTransformer)
    {
        $this->marsRoverDataTransformer = $marsRoverDataTransformer;
    }

    public function execute(PlaceMarsRoverRequest $request) : PlaceMarsRoverResponse
    {
        $x = $request->getX();
        $y = $request->getY();
        $direction = $request->getDirection();
        $coordinates = new Coordinates($x, $y);
        $marsRover = MarsRover::placeInMap($coordinates, $direction);

        if (is_null($marsRover)) {
            throw new PlaceMarsRoverException(
                "Attempted to place Mars Rover out of limits or onto an obstacle",
                PlaceMarsRoverException::INVALID_PLACE
            );
        }

        $this->marsRoverDataTransformer->write($marsRover);

        return new PlaceMarsRoverResponse($this->marsRoverDataTransformer->read());
    }
}
