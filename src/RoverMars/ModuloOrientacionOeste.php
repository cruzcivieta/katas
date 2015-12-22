<?php
/**

 * User: dcruz
 * Date: 21/12/15
 * Time: 19:35
 */

namespace RoverMars;


class ModuloOrientacionOeste extends AbstractoModuloOrientacion
{

    /**
     * @return ModuloOrientacion
     */
    public function girarSentidoHorario()
    {
        return new ModuloOrientacionNorte($this->mapaPlaneta);
    }

    /**
     * @return ModuloOrientacion
     */
    public function girarSentidoAntihorario()
    {
        return new ModuloOrientacionSur($this->mapaPlaneta);
    }

    /**
     * @param Posicion $posicion
     */
    public function avanzar(Posicion $posicion)
    {
        if ($this->estoyEnElLimiteOeste($posicion)) {
            $posicion->setX($this->mapaPlaneta->getLimiteEste());
        } else {
            $posicion->reducirX();
        }
    }

    /**
     * @param Posicion $posicion
     */
    public function retroceder(Posicion $posicion)
    {
        if ($this->estoyEnElLimiteEste($posicion)) {
            $posicion->setX($this->mapaPlaneta->getLimiteOeste());
        } else {
            $posicion->incrementarX();
        }
    }

    /**
     * @return string
     */
    public function haciaDondeNosDirigimos()
    {
        return SistemaNavegacion::OESTE;
    }
}