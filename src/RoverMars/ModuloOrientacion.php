<?php
/**

 * User: dcruz
 * Date: 21/12/15
 * Time: 19:35
 */

namespace RoverMars;


interface ModuloOrientacion
{
    /**
     * @return ModuloOrientacion
     */
    public function girarSentidoHorario();

    /**
     * @return ModuloOrientacion
     */
    public function girarSentidoAntihorario();

    /**
     * @param Posicion $posicion
     */
    public function avanzar(Posicion $posicion);

    /**
     * @param Posicion $posicion
     */
    public function retroceder(Posicion $posicion);

    /**
     * @return string
     */
    public function haciaDondeNosDirigimos();
}