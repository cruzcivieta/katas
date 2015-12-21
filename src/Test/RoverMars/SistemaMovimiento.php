<?php
/**
 * Created by PhpStorm.
 * User: dcruz
 * Date: 19/12/15
 * Time: 20:36
 */

namespace RoverMars;


class SistemaMovimiento
{
    private $sistema;

    /**
     * SistemaMovimiento constructor.
     */
    public function __construct()
    {
        $this->sistema = [
            SistemaNavegacion::SUR => new SistemaMovmientoSur(),
            SistemaNavegacion::ESTE => new SistemaMovmientoEste(),
            SistemaNavegacion::NORTE => new SistemaMovmientoNorte(),
            SistemaNavegacion::OESTE => new SistemaMovmientoOeste(),
        ];
    }


}