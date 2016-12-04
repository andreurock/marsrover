<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 02/12/16
 * Time: 14:51
 */

namespace AppBundle\Domain\ValueObject\MoveStrategy;


interface MoveStrategy
{
    public function move() : bool;
}
