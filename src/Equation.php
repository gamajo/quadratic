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
interface Equation
{
    /**
     * Return args as an array.
     *
     * @return array
     */
    public function getArgsAsArray(): array;

    /**
     * Check if arguments are valid.
     *
     * @param mixed[] $args Array of equation arguments.
     *
     * @return bool
     */
    public function hasValidArguments($args): bool;
}
