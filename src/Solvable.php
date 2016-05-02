<?php
/**
 * Interface for all solvers
 *
 * @package   Gamajo\Quadratic
 * @author    Gary Jones
 * @link      https://gamajo.com
 * @copyright 2015 Gary Jones, Gamajo Tech
 * @license   MIT
 */

namespace Gamajo\Quadratic;

/**
 * Interface for all solvers.
 *
 * @package Gamajo\Quadratic
 */
interface Solvable
{
    /**
     * Solve the equation.
     *
     * Does not return any values, but holds them for later retrieval.
     */
    public function solve();

    /**
     * Get one or both roots.
     *
     * @param string $return Optional. Get roots with values of `root1` or `root2`, or leave empty to return a string
     *                       with both roots. May be strings of real or imaginary values. Default is `both`.
     *
     * @return string Roots.
     */
    public function get($return = 'both');
}
