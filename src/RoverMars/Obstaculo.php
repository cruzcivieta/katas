<?php
/**
 * Created by PhpStorm.
 * User: dcruz
 * Date: 22/12/15
 * Time: 17:33
 */

namespace RoverMars;


class Obstaculo
{
    /**
     * @var string
     */
    private $nombre;

    /**
     * Obstaculo constructor.
     * @param string $nombre
     */
    public function __construct($nombre)
    {
        $this->nombre = $nombre;
    }

    function __toString()
    {
        return $this->nombre;
    }

}