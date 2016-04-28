<?php
/**
 * Solver class, for solving quadratic equations.
 *
 * @package   Gamajo\Quadratic
 * @author    Gary Jones
 * @link      https://gamajo.com
 * @copyright 2015 Gary Jones, Gamajo Tech
 * @license   MIT
 */

namespace Gamajo\Quadratic;

/**
 * Solver class, for solving quadratic equations.
 *
 * @package Gamajo\Quadratic
 */
class Solver implements Solvable
{

    /**
     * Holds the equation object.
     *
     * @var Equation
     */
    protected $equation;

    /**
     * Maximum precision that decimals should be rounded to.
     *
     * Default is 3.
     *
     * @var int
     */
    protected $precision = 3;

    /**
     * Lowest root.
     *
     * @var string
     */
    protected $rootOne;

    /**
     * Highest root.
     *
     * @var string
     */
    protected $rootTwo;

    /**
     * Initialize solver.
     *
     * @param Equation $equation
     */
    public function __construct(QuadraticEquation $equation)
    {
        $this->equation = $equation;
    }

    /**
     * Solve the equation.
     *
     * Does not return any values, but holds them for later retrieval.
     */
    public function solve()
    {
        $a = $this->equation->getA();
        $b = $this->equation->getB();
        $c = $this->equation->getC();

        if ($this->getBsmfac($a, $b, $c) < 0) {
            $roots = $this->findImaginaryRoots($a, $b, $c);
        } else {
            $roots = $this->findRealRoots($a, $b, $c);
        }

        $roots = $this->orderRoots($roots);

        $this->saveRootsAsStrings($roots);
    }

    /**
     * Get one or both roots.
     *
     * @param string $return Optional. Get roots with values of `root1` or `root2`, or leave empty to return a string
     *                       with both roots. May be strings of real or imaginary values. Default is `both`.
     *
     * @return string Roots.
     */
    public function get($return = 'both')
    {
        if ('root1' === $return) {
            return $this->rootOne;
        }

        if ('root2' === $return) {
            return $this->rootTwo;
        }

        return $this->rootOne . ' and ' . $this->rootTwo;
    }

    /**
     * Set maximum precision for decimals.
     *
     * @return int Maximum number of decimal places.
     */
    public function getPrecision()
    {
        return $this->precision;
    }

    /**
     * Set precision.
     *
     * @param int $precision
     */
    public function setPrecision($precision)
    {
        if ( ! is_int($precision) || $precision < 0) {
            throw new InvalidArgumentException('Precision must be an integer greater or equal to zero.');
        }

        $this->precision = (int) $precision;
    }

    /**
     * Get part of the quadratic formula.
     *
     * The abbreviation in the name stands for "B squared minus four A C".
     *
     * @param int $a Multiplier of x^2 in equation.
     * @param int $b Multiplier if x in equation.
     * @param int $c Constant at end of equation.
     *
     * @return int
     */
    protected function getBsmfac($a, $b, $c)
    {
        return $b * $b - 4 * $a * $c;
    }

    /**
     * Find imaginary roots.
     *
     * Only suitable for use when b^2 < 4ac.
     *
     * @param int $a Multiplier of x^2 in equation.
     * @param int $b Multiplier if x in equation.
     * @param int $c Constant at end of equation.
     *
     * @return array Roots
     */
    protected function findImaginaryRoots($a, $b, $c)
    {
        $bsmfac = $this->getBsmfac($a, $b, $c);

        $plusMinusOne = ' + ';
        $plusMinusTwo = ' - ';
        $bsmfac *= - 1;
        $complex = ( sqrt($bsmfac) / ( 2 * $a ) );

        if ($a < 0) { // If negative imaginary term, tidies appearance.
            $plusMinusTwo = ' + ';
            $plusMinusOne = ' - ';
            $complex *= - 1;
        }

        $rootOne = round(- $b / ( 2 * $a ), $this->precision) . $plusMinusOne . round($complex,
                $this->precision) . 'i';
        $rootTwo = round(- $b / ( 2 * $a ), $this->precision) . $plusMinusTwo . round($complex,
                $this->precision) . 'i';

        return [$rootOne, $rootTwo];
    }

    /**
     * Find real roots.
     *
     * Only suitable for use when b^2 >= 4ac.
     *
     *
     * @param int $a Multiplier of x^2 in equation.
     * @param int $b Multiplier if x in equation.
     * @param int $c Constant at end of equation.
     *
     * @return array
     */
    protected function findRealRoots($a, $b, $c)
    {
        $bsmfac = $this->getBsmfac($a, $b, $c);

        if ($bsmfac == 0) {
            // Simplifies if b^2 = 4ac (real roots).
            $rootOne = $rootTwo = round(- $b / ( 2 * $a ), $this->precision);
        } else {
            // Finds real roots when b^2 != 4ac.
            $rootOne = ( - $b + sqrt($bsmfac) ) / ( 2 * $a );
            $rootOne = round($rootOne, $this->precision);
            $rootTwo = ( - $b - sqrt($bsmfac) ) / ( 2 * $a );
            $rootTwo = round($rootTwo, $this->precision);
        }

        return [$rootOne, $rootTwo];
    }

    /**
     * Order roots so that root1 is less than or equal to root2.
     *
     * @param array $roots Roots.
     *
     * @return array
     */
    protected function orderRoots(array $roots)
    {
        if ($roots[0] > $roots[1]) {
            $tmp      = $roots[0];
            $roots[0] = $roots[1];
            $roots[1] = $tmp;
        }

        return $roots;
    }

    /**
     * Cast object  properties as strings of given roots.
     *
     * @param array $roots Roots
     */
    protected function saveRootsAsStrings(array $roots)
    {
        $this->rootOne = (string) $roots[0];
        $this->rootTwo = (string) $roots[1];
    }
}
