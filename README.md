# Quadratic

PHP classes for working with, and solving, quadratic equations.

## Status 

This is a work in progress to share and update some PHP I wrote to solve quadratic equations. The code in `solver.php` is from 2004 - very procedural, no classes, no namespaces, no composer etc. The plan is to update this code to fix all that, with a `Gamajo\Quadratic\Equation` class and a `Gamajo\Quadratic\Solver` class.

## What Is A Quadratic Equation?

A quadratic equation is a univariate polynomial with degree of 2, that is then set to equal zero so that the indeterminate can be determined:

> <i>ax</i><sup>2</sup> + <i>bx</i> + c = 0

Equations can often be solved with [factoring](https://en.wikipedia.org/wiki/Factorization) or [completing the square](https://en.wikipedia.org/wiki/Completing_the_square), but there is also a [Quadratic Formula](https://en.wikipedia.org/wiki/Quadratic_formula):

![X equals negative B, plus or minus the square root of B squared minus four A C, all over two A](https://upload.wikimedia.org/wikipedia/commons/thumb/c/c4/Quadratic_formula.svg/640px-Quadratic_formula.svg.png?1444430043902 "Quadratic Formula")

The function in `solver.php` accepts values for _a_, _b_ and _c_ and returns one or both roots if they could be determined.
