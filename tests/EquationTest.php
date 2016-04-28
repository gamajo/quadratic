<?php
/**
 * Class for testing Equation
 *
 * @package   Gamajo\Quadratic
 * @author    Gary Jones
 * @link      https://gamajo.com
 * @copyright 2015 Gary Jones, Gamajo Tech
 * @license   MIT
 */

namespace Gamajo\Quadratic;

require dirname(__DIR__) . '/src/Equation.php';
require dirname(__DIR__) . '/src/InvalidArgumentException.php';

/**
 * Class for testing Equation.
 *
 * @package Gamajo\Quadratic
 */
class EquationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers            \Gamajo\Quadratic\Equation::__construct
     * @covers            \Gamajo\Quadratic\Equation::hasValidArguments
     * @uses              \Gamajo\Quadratic\Equation
     * @expectedException \Gamajo\Quadratic\InvalidArgumentException
     */
    public function testCannotBeConstructedFromNonIntegerValue()
    {
        $this->setExpectedExceptionFromAnnotation();
        new Equation(null, true, '6');
    }

    /**
     * @covers \Gamajo\Quadratic\Equation::__construct
     * @covers \Gamajo\Quadratic\Equation::hasValidArguments
     * @uses   \Gamajo\Quadratic\Equation
     */
    public function testObjectCanBeConstructedFromThreeIntegerValues()
    {
        $e = new Equation(1, 2, 3);

        $this->assertInstanceOf(Equation::class, $e);
    }

    /**
     * @covers \Gamajo\Quadratic\Equation::__construct
     * @covers \Gamajo\Quadratic\Equation::getA
     * @covers \Gamajo\Quadratic\Equation::getB
     * @covers \Gamajo\Quadratic\Equation::getC
     * @uses   \Gamajo\Quadratic\Equation
     */
    public function testObjectCanReturnSingleValues()
    {
        $e = new Equation(1, 2, 3);

        $this->assertSame(1, $e->getA());
        $this->assertSame(2, $e->getB());
        $this->assertSame(3, $e->getC());
    }

    /**
     * @covers \Gamajo\Quadratic\Equation::__construct
     * @covers \Gamajo\Quadratic\Equation::getArgsAsArray
     * @uses   \Gamajo\Quadratic\Equation
     */
    public function testObjectCanReturnArrayOfValues()
    {
        $e = new Equation(1, 2, 3);

        $this->assertSame([1, 2, 3], $e->getArgsAsArray());
    }
}
