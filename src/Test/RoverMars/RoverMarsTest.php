<?php
/**
 * Created by PhpStorm.
 * User: dcruz
 * Date: 28/11/15
 * Time: 19:42
 */

namespace Test\RoverMars;


use RoverMars\RoverMars;
use RoverMars\SistemaNavegacion;

class RoverMarsTest extends \PHPUnit_Framework_TestCase
{
    public function testRoverComienzaEn00MirandoAlNorte()
    {
        $posicionInicial = [0,0];
        $roverMars = $this->crearRoverEn00Norte();

        $this->assertEquals($posicionInicial, $roverMars->dondeEstas(), 'Rover comienza en el 0,0,N');
    }

    public function testAvanzarUnaCasillaAlNorte()
    {
        $pasoHaciaElNorte = [0,1];
        $mars = $this->crearRoverEn00Norte();

        $mars->ejecutar(['f']);
        $this->assertEquals($pasoHaciaElNorte, $mars->dondeEstas(), 'Rover se mueve un paso hacia el norte');
    }

    public function testRetrocederUnaCasillaMirandoAlNorte()
    {
        $pasoHaciaElSur= [0,-1];
        $mars = $this->crearRoverEn00Norte();

        $mars->ejecutar(['b']);
        $this->assertEquals($pasoHaciaElSur, $mars->dondeEstas(), 'Rover se mueve un paso hacia atrás mirando al norte');
    }

    public function testRoverMiraAlNorte()
    {
        $orientacionInicial = SistemaNavegacion::NORTE;
        $mars = $this->crearRoverEn00Norte();

        $this->assertEquals($orientacionInicial, $mars->haciaDondeNosDirigimos(), 'Rover mira al norte cuando se crea');
    }

    public function testGirarDerechaDesdeNorte()
    {
        $mars = $this->crearRoverEn00Norte();

        $mars->ejecutar(['r']);
        $this->assertEquals(SistemaNavegacion::ESTE, $mars->haciaDondeNosDirigimos(), 'Rover mira hacia al este');
    }

    public function testGirar180GradosHaciaDerecha()
    {
        $mars = $this->crearRoverEn00Norte();

        $mars->ejecutar(['r', 'r']);
        $this->assertEquals(SistemaNavegacion::SUR, $mars->haciaDondeNosDirigimos(), 'Rover se ha dado la vuelta');
    }

    public function testGirar360GradosHaciaDerecha()
    {
        $mars = $this->crearRoverEn00Norte();

        $mars->ejecutar(['r', 'r', 'r', 'r']);
        $this->assertEquals(SistemaNavegacion::NORTE, $mars->haciaDondeNosDirigimos(), 'Rover se ha dado la vuelta en sentido horario');
    }

    public function testGirarIzquierdaDesdeNorte()
    {
        $mars = $this->crearRoverEn00Norte();

        $mars->ejecutar(['l']);
        $this->assertEquals(SistemaNavegacion::OESTE, $mars->haciaDondeNosDirigimos(), 'Rover mira hacia al oeste');
    }

    public function testGirar360GradosHaciaIzquierda()
    {
        $mars = $this->crearRoverEn00Norte();

        $mars->ejecutar(['l', 'l', 'l', 'l']);
        $this->assertEquals(SistemaNavegacion::NORTE, $mars->haciaDondeNosDirigimos(), 'Rover se ha dado la vuelta en sentido contrario');
    }

    public function testAvanzaUnaCasillaHaciaElEste()
    {
        $posicionEsperada = [1,0];
        $mars = $this->crearRoverEn00Norte();

        $mars->ejecutar(['r', 'f']);
        $this->assertEquals($posicionEsperada, $mars->dondeEstas());
    }

    public function testRetrocedeUnaCasillaHaciaElEste()
    {
        $posicionEsperada = [-1,0];
        $mars = $this->crearRoverEn00Norte();

        $mars->ejecutar(['r', 'b']);
        $this->assertEquals($posicionEsperada, $mars->dondeEstas());
    }

    public function testAvanzaUnaCasillaHaciaElOEste()
    {
        $posicionEsperada = [-1,0];
        $mars = $this->crearRoverEn00Norte();

        $mars->ejecutar(['l', 'f']);
        $this->assertEquals($posicionEsperada, $mars->dondeEstas());
    }

//    public function testAtravesarLimiteNorteAparecemosEnElLimiteSur()
//    {
//        $limiteSur = [0, -5];
//        $mars = $this->crearRoverEn00Norte();
//
//        $mars->ejecutar(['f', 'f', 'f', 'f', 'f', 'f']);
//        $this->assertEquals($limiteSur, $mars->dondeEstas(), 'Rover mars ha dado la vuelta al planeta');
//    }

    private function crearRoverEn00Norte()
    {
        return new RoverMars();
    }
}
