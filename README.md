# Gamajo Quadratic Equation Solver

PHP classes for working with, and solving, quadratic equations.

## What Is A Quadratic Equation?

A quadratic equation is a univariate polynomial with degree of 2, that is then set to equal zero so that the indeterminate can be determined:

> <i>ax</i><sup>2</sup> + <i>bx</i> + c = 0

Equations can often be solved with [factoring](https://en.wikipedia.org/wiki/Factorization) or [completing the square](https://en.wikipedia.org/wiki/Completing_the_square), but there is also a [Quadratic Formula](https://en.wikipedia.org/wiki/Quadratic_formula):

![X equals negative B, plus or minus the square root of B squared minus four A C, all over two A](https://upload.wikimedia.org/wikipedia/commons/thumb/c/c4/Quadratic_formula.svg/640px-Quadratic_formula.svg.png?1444430043902 "Quadratic Formula")

The QuadraticEquation interface constructor accepts values for _a_, _b_ and _c_ and the Solver can return one or both roots, including imaginary roots.


## Installation

```sh
composer require gamajo/quadratic --save
```

Requires PHP 7.

## Usage

### Basic Usage

Create an equation object, pass that to the solver, solve, and retrieve the roots:

```php
use Gamajo\Quadratic;

// Represents x^2 + 5x + 6 = 0.
$equation = new BasicQuadraticEquation(1, 5, 6);

$solver = new Solver($equation);
$solver->solve();

echo $solver->get(); // '2 and 3'
echo $solver->get('root1'); // '2'
echo $solver->get('root2'); // '3'
```

The Solver has no problem with complex roots:

```php
use Gamajo\Quadratic;

// Represents 3x^2 + 4x + 5 = 0.
$equation = new BasicQuadraticEquation(3, 4, 5);

$solver = new Solver($equation);
$solver->solve();

echo $solver->get(); // '-0.667 + 1.106i and -0.667 - 1.106i'
```

### `BasicQuadraticEquation` Methods

The `BasicQuadraticEquation` class implements the `QuadraticEquation` interface, which in turn extends the `Equation` interface. As such, it supports the following methods:

```php
use Gamajo\Quadratic;

// Represents x^2 + 5x + 6 = 0.
$equation = new BasicQuadraticEquation(1, 5, 6);

echo $equation->getA(); // 1
echo $equation->getB(); // 5
echo $equation->getC(); // 6
print_r( $equation->getArgsAsArray() ); // [1, 5, 6]
```

There is also a `hasValidArguments()` method, but as this library uses scalar type declarations, the manual check to see if they are all integers is somewhat redundant.

### `Solver` Methods

The `Solver` class can optionally set the maximum decimal place precision of the roots:
  
```php
use Gamajo\Quadratic;

// Represents 8x^2 + 5x - 2 = 0.
$equation = new BasicQuadraticEquation(8, 5, -2);

$solver = new Solver($equation);
$solve->setPrecision(4); // Default precision is 3

echo $solve->getPrecision(); // 4

$solver->solve();

echo $solver->get(); // '-0.9021 and 0.2771' instead of '-0.902 and 0.277'
```

## Change Log

See the [change log](CHANGELOG.md).

## License

[MIT](LICENSE).

## Contributions

Contributions are welcome - fork, fix and send pull requests against the `develop` branch please.

## Credits

Built by [Gary Jones](https://twitter.com/GaryJ).  
Original procedural code version, copyright 2004 Gary Jones.    
This version copyright 2016 [Gamajo Tech](https://gamajo.com)

