<?php
declare(strict_types=1);
/**
 * Class for testing Solver
 *
 * @package   Gamajo\Quadratic
 * @author    Gary Jones
 * @link      https://gamajo.com
 * @copyright 2015 Gary Jones, Gamajo Tech
 * @license   MIT
 */

namespace Gamajo\Quadratic;

use PHPUnit_Framework_TestCase;

require dirname(__DIR__) . '/src/Solvable.php';
require dirname(__DIR__) . '/src/Solver.php';

/**
 * Class for testing Solver.
 *
 * The Equation class is not mocked here, as it is a value object that has it's own unit test.
 *
 * @package Gamajo\Quadratic
 *
 * @coversDefaultClass \Gamajo\Quadratic\Solver
 */
class SolverTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers \Gamajo\Quadratic\BasicQuadraticEquation
     * @covers ::__construct()
     */
    public function testObjectCanBeConstructedWithEquation()
    {
        $s = new Solver(new BasicQuadraticEquation(1, 5, 6));

        $this->assertInstanceOf(Solver::class, $s);
    }

    /**
     * @covers \Gamajo\Quadratic\BasicQuadraticEquation
     * @covers ::__construct()
     * @covers ::setPrecision()
     * @covers ::getPrecision()
     */
    public function testPrecisionSetCorrectly()
    {
        $s = new Solver(new BasicQuadraticEquation(3, 4, 5));

        $s->setPrecision(2);

        $this->assertSame(2, $s->getPrecision());
    }

    /**
     * @covers \Gamajo\Quadratic\BasicQuadraticEquation
     * @covers ::__construct()
     * @covers ::setPrecision()
     */
    public function testPrecisionSetWithNegativeNumber()
    {
        $this->expectException(InvalidArgumentException::class);

        $s = new Solver(new BasicQuadraticEquation(3, 4, 5));

        $s->setPrecision(-2);
    }

    /**
     * @dataProvider data
     * @covers \Gamajo\Quadratic\BasicQuadraticEquation
     * @covers ::__construct()
     * @covers ::findImaginaryRoots()
     * @covers ::findRealRoots()
     * @covers ::get()
     * @covers ::getBsmfac()
     * @covers ::orderRoots()
     * @covers ::saveRootsAsStrings()
     * @covers ::setPrecision()
     * @covers ::solve()
     */
    public function testSolve($a, $b, $c, $root1, $root2, $precision = 3)
    {
        $s = new Solver(new BasicQuadraticEquation($a, $b, $c));
        $s->setPrecision($precision);
        $s->solve();

        $this->assertSame($s->get('root1'), $root1, 'root1 is incorrect');
        $this->assertSame($s->get('root2'), $root2, 'root2 is incorrect');
        $this->assertSame($s->get(), $root1 . ' and ' . $root2, 'Both roots string is incorrect');
	}

    /**
     * These are known roots for common equations.
     *
     * @return array
     */
    public function data() {
        return [
            [1, -5, 6, '2', '3'],  // Positive roots.
            [1, 5, 6, '-3', '-2'], // Negative roots.
            [1, 2, -3, '-3', '1'], // Positive and negative roots.
            [3, 4, 5, '-0.667 + 1.106i', '-0.667 - 1.106i'], // Imaginary roots.
            [-3, -4, -5, '-0.667 + 1.106i', '-0.667 - 1.106i'], // Imaginary roots with negative A
            [1, 2, 1, '-1', '-1'], // b^2-4ac = 0.
            [8, 5, -2, '-0.902', '0.277'], // Floats.

            // Now with precision 4.
            [1, -5, 6, '2', '3', 4],  // Positive roots, precision 4.
            [1, 5, 6, '-3', '-2', 4], // Negative roots, precision 4.
            [1, 2, -3, '-3', '1', 4], // Positive and negative roots, precision 4.
            [3, 4, 5, '-0.6667 + 1.1055i', '-0.6667 - 1.1055i', 4], // Imaginary roots, precision 4.
            [-3, -4, -5, '-0.6667 + 1.1055i', '-0.6667 - 1.1055i', 4], // Imaginary roots, with negative A, precision 4.
            [1, 2, 1, '-1', '-1', 4], // b^2-4ac = 0, precision 4.
            [8, 5, -2, '-0.9021', '0.2771', 4], // Floats, precision 4.
            [-1, 5, 6, '-1', '6'], // Negative A, precision 4.
        ];
    }
}
