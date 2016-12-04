<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 02/12/16
 * Time: 11:18
 */

namespace AppBundle\Domain\Entity\Obstacle;

use AppBundle\Domain\ValueObject\Coordinates;

/**
 * Interface ObstacleInterface
 * Obstacle placed in a determined position of the map.
 *
 * @package AppBundle\Domain\Entity\Obstacle
 * @author Andreu Ros
 * @version 1.0 2016
 */
interface ObstacleInterface
{
    public function __construct(Coordinates $coordinates);

    public function placeInMap();

    public function getId(): string;

    public function getCoordinates(): Coordinates;

    public function equals(self $obstacle) : bool;
}
