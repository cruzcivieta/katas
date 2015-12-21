<?php
/**
 * User: dcruz
 * Date: 21/12/15
 * Time: 19:35
 */

namespace RoverMars;


class ModuloOrientacionSur implements ModuloOrientacion
{

    /**
     * @return ModuloOrientacion
     */
    public function girarSentidoHorario()
    {
        return new ModuloOrientacionOeste();
    }

    /**
     * @return ModuloOrientacion
     */
    public function girarSentidoAntihorario()
    {
        return new ModuloOrientacionEste();
    }

    /**
     * @param Posicion $posicion
     */
    public function avanzar(Posicion $posicion)
    {
        $posicion->reducirY();
    }

    /**
     * @param Posicion $posicion
     */
    public function retroceder(Posicion $posicion)
    {
        $posicion->incrementarY();
    }

    /**
     * @return string
     */
    public function haciaDondeNosDirigimos()
    {
        return 'Sur';
    }
}