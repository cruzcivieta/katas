<?php
/**
 * User: dcruz
 * Date: 21/12/15
 * Time: 19:35
 */

namespace RoverMars;


class ModuloOrientacionSur extends AbstractoModuloOrientacion
{

    /**
     * @return ModuloOrientacion
     */
    public function girarSentidoHorario()
    {
        return new ModuloOrientacionOeste($this->mapaPlaneta);
    }

    /**
     * @return ModuloOrientacion
     */
    public function girarSentidoAntihorario()
    {
        return new ModuloOrientacionEste($this->mapaPlaneta);
    }

    /**
     * @param Posicion $posicion
     */
    public function avanzar(Posicion $posicion)
    {
        if ($this->estoyEnElLimiteSur($posicion)) {
            $posicion->setY($this->mapaPlaneta->getLimiteNorte());
        } else {
            $posicion->reducirY();
        }
    }

    /**
     * @param Posicion $posicion
     */
    public function retroceder(Posicion $posicion)
    {
        if ($this->estoyEnElLimiteNorte($posicion)) {
            $posicion->setY($this->mapaPlaneta->getLimiteSur());
        } else {
            $posicion->incrementarY();
        }
    }

    /**
     * @return string
     */
    public function haciaDondeNosDirigimos()
    {
        return SistemaNavegacion::SUR;
    }
}