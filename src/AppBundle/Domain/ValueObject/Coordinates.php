<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 1/12/16
 * Time: 20:37
 */

namespace AppBundle\Domain\ValueObject;

/**
 * Class Coordinates
 * A representation of a pair of coordinates.
 *
 * @package AppBundle\Domain\ValueObject
 * @author Andreu Ros
 * @version 1.0 2016
 */
class Coordinates
{
    const INITIAL_COORDINATE = 1;

    /**
     * @var int
     */
    private $x;

    /**
     * @var int
     */
    private $y;

    /**
     * Coordinates constructor.
     * @param int $x
     * @param int $y
     * @throws CoordinatesException
     */
    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * @return int
     */
    public function x(): int
    {
        return $this->x;
    }

    /**
     * @return int
     */
    public function y(): int
    {
        return $this->y;
    }

    /**
     * Checks if two coordinates are equals
     *
     * @param Coordinates $coordinates
     * @return bool
     */
    public function equals(self $coordinates) : bool
    {
        return $coordinates->x() == $this->x() && $coordinates->y() == $this->y();
    }

    public function __toString()
    {
        return $this->x . "," . $this->y;
    }
}
