<?php
/**
 * User: dcruz
 * Date: 21/12/15
 * Time: 19:35
 */

namespace RoverMars;


class ModuloOrientacionNorte implements ModuloOrientacion
{

    /**
     * @return ModuloOrientacion
     */
    public function girarSentidoHorario()
    {
        return new ModuloOrientacionEste();
    }

    /**
     * @return ModuloOrientacion
     */
    public function girarSentidoAntihorario()
    {
        return new ModuloOrientacionOeste();
    }

    /**
     * @param Posicion $posicion
     */
    public function avanzar(Posicion $posicion)
    {
        $posicion->incrementarY();
    }

    /**
     * @param Posicion $posicion
     */
    public function retroceder(Posicion $posicion)
    {
        $posicion->reducirY();
    }

    /**
     * @return string
     */
    public function haciaDondeNosDirigimos()
    {
        return 'Norte';
    }
}