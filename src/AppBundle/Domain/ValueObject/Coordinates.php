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
        if (! $this->valid($x, $y)) {
            throw new CoordinatesException("Coordinates must be > 0", CoordinatesException::INVALID_COORDINATES);
        }

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

    public function equals(self $coordinates) : bool
    {
        return $coordinates->x() == $this->x() && $coordinates->y() == $this->y();
    }

    public function __toString()
    {
        return $this->x . "," . $this->y;
    }

    private function valid(int $x, int $y) : bool
    {
        return $x > 0 && $y > 0;
    }
}
