<?php
declare(strict_types=1);
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

use PHPUnit_Framework_TestCase;

require dirname(__DIR__) . '/src/Equation.php';
require dirname(__DIR__) . '/src/InvalidArgumentException.php';

/**
 * Class for testing Equation.
 *
 * @package Gamajo\Quadratic
 */
class EquationTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers            \Gamajo\Quadratic\BasicQuadraticEquation::__construct
     * @covers            \Gamajo\Quadratic\BasicQuadraticEquation::hasValidArguments
     * @uses              \Gamajo\Quadratic\BasicQuadraticEquation
     * @expectedException \TypeError
     */
    public function testCannotBeConstructedFromNonIntegerValue()
    {
        $this->setExpectedExceptionFromAnnotation();
        new BasicQuadraticEquation(null, true, '6');
    }

    /**
     * @covers \Gamajo\Quadratic\BasicQuadraticEquation::__construct
     * @covers \Gamajo\Quadratic\BasicQuadraticEquation::hasValidArguments
     * @uses   \Gamajo\Quadratic\BasicQuadraticEquation
     */
    public function testObjectCanBeConstructedFromThreeIntegerValues()
    {
        $e = new BasicQuadraticEquation(1, 2, 3);

        $this->assertInstanceOf(QuadraticEquation::class, $e);
    }

    /**
     * @covers \Gamajo\Quadratic\BasicQuadraticEquation::__construct
     * @covers \Gamajo\Quadratic\BasicQuadraticEquation::hasValidArguments
     * @uses   \Gamajo\Quadratic\BasicQuadraticEquation
     * @expectedException \TypeError
     */
    public function testObjectWillThrowExceptionForLessThanThreeParameters()
    {
        new BasicQuadraticEquation(1, 2);
    }

    /**
     * @covers \Gamajo\Quadratic\BasicQuadraticEquation::__construct
     * @covers \Gamajo\Quadratic\BasicQuadraticEquation::hasValidArguments
     * @uses   \Gamajo\Quadratic\BasicQuadraticEquation
     * @expectedException \Gamajo\Quadratic\InvalidArgumentException
     */
    public function testObjectWillThrowExceptionForMoreThanThreeParameters()
    {
        new BasicQuadraticEquation(1, 2, 3, 4);
    }

    /**
     * @covers \Gamajo\Quadratic\BasicQuadraticEquation::__construct
     * @covers \Gamajo\Quadratic\BasicQuadraticEquation::getA
     * @covers \Gamajo\Quadratic\BasicQuadraticEquation::getB
     * @covers \Gamajo\Quadratic\BasicQuadraticEquation::getC
     * @uses   \Gamajo\Quadratic\BasicQuadraticEquation
     */
    public function testObjectCanReturnSingleValues()
    {
        $e = new BasicQuadraticEquation(1, 2, 3);

        $this->assertSame(1, $e->getA());
        $this->assertSame(2, $e->getB());
        $this->assertSame(3, $e->getC());
    }

    /**
     * @covers \Gamajo\Quadratic\BasicQuadraticEquation::__construct
     * @covers \Gamajo\Quadratic\BasicQuadraticEquation::getArgsAsArray
     * @uses   \Gamajo\Quadratic\BasicQuadraticEquation
     */
    public function testObjectCanReturnArrayOfValues()
    {
        $e = new BasicQuadraticEquation(1, 2, 3);

        $this->assertSame([1, 2, 3], $e->getArgsAsArray());
    }
}
