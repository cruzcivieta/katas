<?php
/**

 * User: dcruz
 * Date: 21/12/15
 * Time: 19:01
 */

namespace RoverMars;


class Posicion
{
    /**
     * @var integer
     */
    private $x = 0;

    /**
     * @var integer
     */
    private $y = 0;

    /**
     * @param int $x
     * @param int $y
     */
    public function __construct($x = 0, $y = 0)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function incrementarX()
    {
        $this->x += 1;
    }

    public function incrementarY()
    {
        $this->y += 1;
    }

    public function reducirX()
    {
        $this->x -= 1;
    }

    public function reducirY()
    {
        $this->y -= 1;
    }

    /**
     * @return integer
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * @return integer
     */
    public function getY()
    {
        return $this->y;
    }

    /**
     * @param int $x
     */
    public function setX($x)
    {
        $this->x = $x;
    }

    /**
     * @param int $y
     */
    public function setY($y)
    {
        $this->y = $y;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [$this->x, $this->y];
    }

    public function esIgual(Posicion $posicion)
    {
        return $this->x == $posicion->getX() && $this->y == $posicion->getY();
    }
}