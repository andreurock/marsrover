<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 02/12/16
 * Time: 14:53
 */

namespace AppBundle\Domain\ValueObject\SpinAroundStrategy;

/**
 * Interface SpinAroundStrategy
 * Implements the Strategy Pattern.
 * Mars Rover can spin around to different directions
 *
 * @package AppBundle\Domain\ValueObject\SpinAroundStrategy
 * @author Andreu Ros
 * @version 1.0 2016
 */
interface SpinAroundStrategy
{
    public function spinAround() : bool;
}
