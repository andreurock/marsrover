<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 02/12/16
 * Time: 11:17
 */

namespace AppBundle\Application\DataTransformer;


use AppBundle\Domain\Entity\Obstacle\Obstacle;

interface ObstacleDataTransformer
{
    public function write(Obstacle $obstacle);

    public function read();
}
