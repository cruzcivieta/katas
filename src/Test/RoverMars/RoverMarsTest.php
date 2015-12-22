<?php
/**

 * User: dcruz
 * Date: 28/11/15
 * Time: 19:42
 */

namespace Test\RoverMars;


use RoverMars\MapaPlaneta;
use RoverMars\Obstaculo;
use RoverMars\Posicion;
use RoverMars\RoverMars;
use RoverMars\SistemaNavegacion;

class RoverMarsTest extends \PHPUnit_Framework_TestCase
{
    public static function setUpBeforeClass()
    {
        echo "Rover Mars";
    }

    public function testRoverComienzaEn00MirandoAlNorte()
    {
        $posicionInicial = new Posicion();
        $roverMars = $this->crearRoverEn00Norte();

        $this->assertTrue($roverMars->estasEn($posicionInicial), 'Rover comienza en el 0,0,N');
    }

    public function testAvanzarUnaCasillaAlNorte()
    {
        $pasoHaciaElNorte = new Posicion(0, 1);
        $mars = $this->crearRoverEn00Norte();

        $mars->ejecutar(['f']);
        $this->assertTrue($mars->estasEn($pasoHaciaElNorte), 'Rover se mueve un paso hacia el norte');
    }

    public function testRetrocederUnaCasillaMirandoAlNorte()
    {
        $pasoHaciaElSur = new Posicion(0, -1);
        $mars = $this->crearRoverEn00Norte();

        $mars->ejecutar(['b']);
        $this->assertTrue($mars->estasEn($pasoHaciaElSur), 'Rover se mueve un paso hacia atrás mirando al norte');
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
        $posicionEsperada = new Posicion(1, 0);
        $mars = $this->crearRoverEn00Norte();

        $mars->ejecutar(['r', 'f']);
        $this->assertTrue($mars->estasEn($posicionEsperada));
    }

    public function testRetrocedeUnaCasillaHaciaElEste()
    {
        $posicionEsperada = new Posicion(-1, 0);
        $mars = $this->crearRoverEn00Norte();

        $mars->ejecutar(['r', 'b']);
        $this->assertTrue($mars->estasEn($posicionEsperada));
    }

    public function testAvanzaUnaCasillaHaciaElOEste()
    {
        $posicionEsperada = new Posicion(-1, 0);
        $mars = $this->crearRoverEn00Norte();

        $mars->ejecutar(['l', 'f']);
        $this->assertTrue($mars->estasEn($posicionEsperada));
    }

    public function testRetrocedeUnaCasillaHaciaElOeste()
    {
        $posicionEsperada = new Posicion(1, 0);
        $mars = $this->crearRoverEn00Norte();

        $mars->ejecutar(['l', 'b']);
        $this->assertTrue($mars->estasEn($posicionEsperada));
    }

    public function testAvanzaUnaCasillaHaciaElSur()
    {
        $posicionEsperada = new Posicion(0, -1);
        $mars = $this->crearRoverEn00Norte();

        $mars->ejecutar(['l', 'l', 'f']);
        $this->assertTrue($mars->estasEn($posicionEsperada), 'Mars debe de caminar hacia atras mirando al sur');
    }

    public function testRetrocedeUnaCasillaHaciaElSur()
    {
        $posicionEsperada = new Posicion(0, 1);
        $mars = $this->crearRoverEn00Norte();

        $mars->ejecutar(['l', 'l', 'b']);
        $this->assertTrue($mars->estasEn($posicionEsperada));
    }

    public function testAtravesarLimiteAparecemosEnElLimiteContrario()
    {
        $limiteSur = new Posicion(0, -5);
        $limiteNorte = new Posicion(0, 5);

        $mars = $this->crearRoverEn00Norte();
        $mars->ejecutar(['f', 'f', 'f', 'f', 'f', 'f']);
        $this->assertEquals($limiteSur->toArray(), $mars->dondeEstas()->toArray(), 'Rover mars deberia haber dado la vuelta al planeta Norte -> Sur, orientacion Norte');
        $mars->ejecutar(['b']);
        $this->assertEquals($limiteNorte->toArray(), $mars->dondeEstas()->toArray(), 'Rover mars deberia haber dado la vuelta al planeta Sur -> Norte, orientacion Norte');
        $mars->ejecutar(['f', 'l', 'l', 'f']);
        $this->assertEquals($limiteNorte->toArray(), $mars->dondeEstas()->toArray(), 'Rover mars deberia haber dado la vuelta al planeta Sur -> Norte, orientacion Sur');
        $mars->ejecutar(['b']);
        $this->assertEquals($limiteSur->toArray(), $mars->dondeEstas()->toArray(), 'Rover mars deberia haber dado la vuelta al planeta Norte -> Sur, orientacion Sur');

        $limiteOeste = new Posicion(-5, 0);
        $limiteEste = new Posicion(5, 0);
        $mars = $this->crearRoverEn00Norte();
        $mars->ejecutar(['r', 'f', 'f', 'f', 'f', 'f', 'f']);
        $this->assertEquals($limiteOeste->toArray(), $mars->dondeEstas()->toArray(), 'Rover mars deberia haber dado la vuelta al planeta Este -> Oeste, orientacion Este');
        $mars->ejecutar(['b']);
        $this->assertEquals($limiteEste->toArray(), $mars->dondeEstas()->toArray(), 'Rover mars deberia haber dado la vuelta al planeta Oeste -> Este, orientacion Este');
        $mars->ejecutar(['l', 'l', 'b']);
        $this->assertEquals($limiteOeste->toArray(), $mars->dondeEstas()->toArray(), 'Rover mars deberia haber dado la vuelta al planeta Este -> Oeste, orientacion Oeste');
        $mars->ejecutar(['f']);
        $this->assertEquals($limiteEste->toArray(), $mars->dondeEstas()->toArray(), 'Rover mars deberia haber dado la vuelta al planeta Oeste -> Este, orientacion Oeste');

    }

    /**
     * @expectedException \RoverMars\Exception\ObstaculoEncontradoException
     */
    public function testDeteccionDeObstaculosHaciaElNorte()
    {
        $rover = $this->crearRoverEn00NorteConObstaculos();
        $rover->ejecutar(['f', 'f', 'f']);
        $posicionEsperada = new Posicion(0, 2);
        $this->assertEquals($posicionEsperada->toArray(), $rover->dondeEstas()->toArray());
    }

    /**
     * @expectedException \RoverMars\Exception\ObstaculoEncontradoException
     */
    public function testDeteccionDeObstaculosHaciaElSur()
    {
        $rover = $this->crearRoverEn00NorteConObstaculos();
        $rover->ejecutar(['b', 'b', 'b']);
        $posicionEsperada = new Posicion(0, -2);
        $this->assertEquals($posicionEsperada->toArray(), $rover->dondeEstas()->toArray());
    }

    private function crearRoverEn00Norte()
    {
        $mapaPlaneta = new MapaPlaneta(5);
        return new RoverMars($mapaPlaneta);
    }

    private function crearRoverEn00NorteConObstaculos()
    {
        $mapaPlaneta = new MapaPlaneta(5);
        $mapaPlaneta->addObstaculo(new Obstaculo("Pared"), new Posicion(0, 3));
        $mapaPlaneta->addObstaculo(new Obstaculo("Piedra"), new Posicion(0, -3));
        $mapaPlaneta->addObstaculo(new Obstaculo("Columna"), new Posicion(3, 0));
        $mapaPlaneta->addObstaculo(new Obstaculo("Crater"), new Posicion(-3, 0));

        return new RoverMars($mapaPlaneta);
    }
}
