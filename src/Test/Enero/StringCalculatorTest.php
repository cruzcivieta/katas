<?php
/**

 * User: dcruz
 * Date: 2/11/15
 * Time: 12:36
 */

namespace Test\Enero;


use Enero\StringCalculator;

class StringCalculatorTest extends \PHPUnit_Framework_TestCase
{
    protected $data;
    /** @var  StringCalculator */
    protected $sc;

    public static function setUpBeforeClass()
    {
        echo 'Enero';
    }

    protected function setUp()
    {
        $this->data = [
            'simple' => [['', 0], ['1', 1], ['2', 2]],
            'complejo' => [['1,2', 3], ['2,3', 5], ['1,2,3', 6], ['1,2,3,4,5', 15]],
            'retornoDeCarro' => [['1\n2,3', 6], ["1\n2,4", 7]],
            'delimitador' => [["//;\n1;2;3", 6], ["//:\n1:2:5", 8], ["//p\n1p3p5", 9]],
            'negaciones' => ["//;\n1;-2;3", "//p\n1p-2;p-3"]
        ];
        $this->sc = new StringCalculator();

    }

    public function testAgregarNumerosSimples()
    {
        foreach ($this->data['simple'] as $data) {
            $this->assertEquals($data[1], $this->sc->add($data[0]), 'Una cadena de un valor debe ser igual a él mismo');
        }
    }

    public function testSumaDeNumeros()
    {
        foreach ($this->data['complejo'] as $data) {
            $this->assertEquals($data[1], $this->sc->add($data[0]), 'Se espera la suma de los numeros');
        }
    }

    public function testRetornoDeCarroComoDelimitador()
    {
        foreach ($this->data['retornoDeCarro'] as $data) {
            $this->assertEquals($data[1], $this->sc->add($data[0]),
                'Retorno de carro admitido como delimitador');
        }
    }

    public function testCualquierDelimitador()
    {
        foreach ($this->data['delimitador'] as $data) {
            $this->assertEquals($data[1], $this->sc->add($data[0]),
                'Cualquier delimitador admitido como delimitador');
        }
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage NegtiveFoundException: Números negativos no permitidos: -2
     */
    public function testNoNumerosNegativos()
    {
        $data = $this->data['negaciones'];
        $this->sc->add($data[0]);
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage NegtiveFoundException: Números negativos no permitidos: -2, -3
     */
    public function testNoNumerosNegativosMásDeUno()
    {
        $data = $this->data['negaciones'];
        $this->sc->add($data[1]);
    }
}
