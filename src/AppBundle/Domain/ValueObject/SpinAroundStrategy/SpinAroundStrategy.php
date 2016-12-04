<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 02/12/16
 * Time: 14:53
 */

namespace AppBundle\Domain\ValueObject\SpinAroundStrategy;


interface SpinAroundStrategy
{
    public function spinAround() : void;
}
