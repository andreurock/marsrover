<?php
/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 1/12/16
 * Time: 20:37
 */

namespace AppBundle\Domain\ValueObject;

class Coordinates
{
    private $x;
    private $y;

    /**
     * Coordinates constructor.
     * @param $x
     * @param $y
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

    public function __toString()
    {
        return $this->x . "," . $this->y;
    }
}
