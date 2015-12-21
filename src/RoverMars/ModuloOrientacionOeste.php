<?php
/**

 * User: dcruz
 * Date: 21/12/15
 * Time: 19:35
 */

namespace RoverMars;


class ModuloOrientacionOeste implements ModuloOrientacion
{

    /**
     * @return ModuloOrientacion
     */
    public function girarSentidoHorario()
    {
        return new ModuloOrientacionNorte();
    }

    /**
     * @return ModuloOrientacion
     */
    public function girarSentidoAntihorario()
    {
        return new ModuloOrientacionSur();
    }

    /**
     * @param Posicion $posicion
     */
    public function avanzar(Posicion $posicion)
    {
        $posicion->reducirX();
    }

    /**
     * @param Posicion $posicion
     */
    public function retroceder(Posicion $posicion)
    {
        $posicion->incrementarX();
    }

    /**
     * @return string
     */
    public function haciaDondeNosDirigimos()
    {
        return 'Oeste';
    }
}