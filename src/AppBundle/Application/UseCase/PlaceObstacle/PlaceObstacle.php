<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 02/12/16
 * Time: 11:33
 */

namespace AppBundle\Application\UseCase\PlaceObstacle;


use AppBundle\Application\DataTransformer\ObstacleDataTransformer;
use AppBundle\Domain\Entity\Obstacle\Obstacle;
use AppBundle\Domain\Entity\Obstacle\ObstacleException;
use AppBundle\Domain\ValueObject\Coordinates;

final class PlaceObstacle
{
    private $obstacleDataTransformer;

    /**
     * PlaceObstacle constructor.
     * @param $obstacleDataTransformer
     */
    public function __construct(ObstacleDataTransformer $obstacleDataTransformer)
    {
        $this->obstacleDataTransformer = $obstacleDataTransformer;
    }

    /**
     * @param PlaceObstacleRequest $request
     * @return PlaceObstacleResponse
     * @throws PlaceObstacleException
     */
    public function execute(PlaceObstacleRequest $request) : PlaceObstacleResponse
    {
        $x = $request->getX();
        $y = $request->getY();
        $coordinates = new Coordinates($x, $y);
        $obstacle = new Obstacle($coordinates);

        if (! $obstacle->placeInMap()) {
            throw new PlaceObstacleException(
                "Obstacle already placed in that position or out of limits!",
                PlaceObstacleException::OBSTACLE_ALREADY_PLACED
            );
        }

        $this->obstacleDataTransformer->write($obstacle);

        return new PlaceObstacleResponse($this->obstacleDataTransformer->read());
    }
}
