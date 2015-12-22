<?php
/**
 * Created by PhpStorm.
 * User: dcruz
 * Date: 22/12/15
 * Time: 19:22
 */

namespace RoverMars\Exception;


use Exception;

class ObstaculoEncontradoException extends \Exception
{
    protected $obstaculo;

    public function __construct($obstaculo)
    {
        parent::__construct('Obstáculo encontrado: ' . $obstaculo);
        $this->obstaculo = $obstaculo;
    }

}