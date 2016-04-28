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
class Equation
{
    protected $a;
    protected $b;
    protected $c;

    public function __construct($a, $b, $c)
    {
        if ($this->hasValidArguments($a, $b, $c)) {
            $this->a = $a;
            $this->b = $b;
            $this->c = $c;
        }
    }

    /**
     * @return int
     */
    public function getA()
    {
        return $this->a;
    }

    /**
     * @return int
     */
    public function getB()
    {
        return $this->b;
    }

    /**
     * @return int
     */
    public function getC()
    {
        return $this->c;
    }

    /**
     * Return args as an array.
     *
     * @return array
     */
    public function getArgsAsArray() {
        return [$this->a, $this->b, $this->c];
    }

    /**
     * Check if arguments are valid.
     *
     * @return bool
     */
    protected function hasValidArguments()
    {
        $args = func_get_args();

        if (count($args) !== 3) {
            throw new InvalidArgumentException('Not enough arguments');
        }

        $is_valid = true;
        array_walk($args, function ($arg) use (&$is_valid) {
            if ( ! is_int($arg)) {
                $is_valid = false;
                throw new InvalidArgumentException('Argument ' . $arg . ' is not an integer.');
            }
        });

        return $is_valid;
    }
}
