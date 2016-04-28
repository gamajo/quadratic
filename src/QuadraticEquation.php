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
     * @return int
     */
    public function getA();

    /**
     * @return int
     */
    public function getB();

    /**
     * @return int
     */
    public function getC();
}
