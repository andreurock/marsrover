<?php
namespace AppBundle\Application\UseCase;

/**
 * Created by PhpStorm.
 * User: andreu
 * Date: 1/12/16
 * Time: 21:37
 */

/**
 * Class MarsRoverException
 *
 * @package AppBundle\Application\UseCase
 * @author Andreu Ros
 * @version 1.0 2016
 */
class MarsRoverException extends \Exception
{
    const NONE = 0;

    const UNDEFINED = 999;

    /**
     * MarsRoverException constructor.
     */
    public function __construct($message, $code)
    {
        parent::__construct($message, $code);
    }

    public function __toString()
    {
        return "MarsRover Exception $this->code: $this->message";
    }
}
