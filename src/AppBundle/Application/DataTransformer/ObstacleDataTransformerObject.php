<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 02/12/16
 * Time: 11:30
 */

namespace AppBundle\Application\DataTransformer;


use AppBundle\Domain\Entity\Obstacle\Obstacle;

class ObstacleDataTransformerObject implements ObstacleDataTransformer
{
    private $obstacle;

    public function write(Obstacle $obstacle)
    {
        $this->obstacle = $obstacle;
    }

    public function read()
    {
        return $this->obstacle;
    }
}