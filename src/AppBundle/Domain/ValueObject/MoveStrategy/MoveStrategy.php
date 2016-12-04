<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 02/12/16
 * Time: 14:51
 */

namespace AppBundle\Domain\ValueObject\MoveStrategy;

/**
 * Interface MoveStrategy
 * Implements the Strategy Pattern.
 * A move can take different strategies.
 *
 * @package AppBundle\Domain\ValueObject\MoveStrategy
 * @author Andreu Ros
 * @version 1.0 2016
 */
interface MoveStrategy
{
    public function move() : bool;
}
