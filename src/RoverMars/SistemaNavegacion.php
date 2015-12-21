<?php
/**
 * User: dcruz
 * Date: 29/11/15
 * Time: 19:49
 */

namespace RoverMars;


class SistemaNavegacion
{
    const ORIENTACION_INICIAL = 0;
    const PUNTOS_CARDINALES = [self::NORTE, self::ESTE, self::SUR, self::OESTE];
    const ANTI_HORARIO = 3;
    const HORARIO  = 1;
    const NORTE = 'Norte';
    const ESTE = 'Este';
    const SUR = 'Sur';
    const OESTE = 'Oeste';

    private $orientacion = SistemaNavegacion::ORIENTACION_INICIAL;
    private $sistemaDireccion;

    /**
     * SistemaNavegacion constructor.
     */
    public function __construct()
    {
        $this->sistemaDireccion = new SistemaDireccion();
    }

    public function haciaDondeNosDirigimos()
    {
        $puntosCardinales = SistemaNavegacion::PUNTOS_CARDINALES;
        return $puntosCardinales[$this->orientacion];
    }

    public function girarDerecha()
    {
        $this->girar(SistemaNavegacion::HORARIO );
    }

    public function girarIzquierda()
    {
        $this->girar(SistemaNavegacion::ANTI_HORARIO);
    }

    private function girar($sentido)
    {
        $this->orientacion += $sentido;
        $this->orientacion %= count(SistemaNavegacion::PUNTOS_CARDINALES) ;
    }

    public function avanzar(&$posicion)
    {
        if ($this->haciaDondeNosDirigimos() === static::ESTE) {
            $posicion[0] += 1;
        } elseif ($this->haciaDondeNosDirigimos() === static::OESTE) {
            $posicion[0] -= 1;
        } else {
            $posicion[1] += 1;
        }
    }
}