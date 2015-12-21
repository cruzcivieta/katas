<?php
/**

 * User: dcruz
 * Date: 21/12/15
 * Time: 18:13
 */

namespace RoverMars;


interface Movimiento
{
    /**
     * @param $posicion Posicion
     */
    public function avanzar($posicion);

    /**
     * @param $posicion Posicion
     */
    public function retroceder($posicion);
}