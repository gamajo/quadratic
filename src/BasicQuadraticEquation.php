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
class BasicQuadraticEquation implements QuadraticEquation
{
    protected $a;
    protected $b;
    protected $c;

    public function __construct(int $a, int $b, int $c)
    {
        if ($this->hasValidArguments(func_get_args())) {
            $this->a = $a;
            $this->b = $b;
            $this->c = $c;
        }
    }

    /**
     * For the equation Ax^2 + Bx + C = 0, get A.
     */
    public function getA(): int
    {
        return $this->a;
    }

    /**
     * For the equation Ax^2 + Bx + C = 0, get B.
     */
    public function getB(): int
    {
        return $this->b;
    }

    /**
     * For the equation Ax^2 + Bx + C = 0, get C.
     */
    public function getC(): int
    {
        return $this->c;
    }

    /**
     * Return args as an array.
     *
     * @return int[]
     */
    public function getArgsAsArray(): array
    {
        return [$this->a, $this->b, $this->c];
    }

    /**
     * Check if arguments are valid.
     *
     * @param int[] $args Array of equation arguments.
     *
     * @return bool
     */
    public function hasValidArguments($args): bool
    {
        if (3 !== count($args)) {
            throw new InvalidArgumentException('Incorrect number of arguments; ' . count($args) . ' given.');
        }

        $is_valid = true;
        // This would be useful for pre-PHP 7 checks.
//        array_walk($args, function ($arg) use (&$is_valid) {
//            if ( ! is_int($arg)) {
//                $is_valid = false;
//                throw new InvalidArgumentException('Argument ' . $arg . ' is not an integer.');
//            }
//        });

        return $is_valid;
    }
}
