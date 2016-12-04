<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 02/12/16
 * Time: 11:18
 */

namespace AppBundle\Domain\Entity\Obstacle;

use AppBundle\Domain\ValueObject\Coordinates;

interface ObstacleInterface
{
    public function __construct(Coordinates $coordinates);

    public function placeInMap();

    public function getId(): string;

    public function getCoordinates(): Coordinates;

    public function equals(self $obstacle) : bool;
}
