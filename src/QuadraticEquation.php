<?php
/**
 * Class for creating value-object quadratic equations.
 *
 * @package   Gamajo\Quadratic
 * @author    Gary Jones
 * @link      https://gamajo.com
 * @copyright 2015 Gary Jones, Gamajo Tech
 * @license   MIT
 */

namespace Gamajo\Quadratic;

/**
 * Class for creating value-object quadratic equations.
 *
 * @package Gamajo\Quadratic
 */
interface QuadraticEquation extends Equation
{
    /**
     * For the equation Ax^2 + Bx + C = 0, get A.
     */
    public function getA(): int;

    /**
     * For the equation Ax^2 + Bx + C = 0, get B.
     */
    public function getB(): int;

    /**
     * For the equation Ax^2 + Bx + C = 0, get C.
     */
    public function getC(): int;
}
