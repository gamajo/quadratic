<?php
/**
 * Quadratic Solver Function for PHP
 * 
 * Useage: for 3x^2 + 4x + 5 = 0, use quadratic(3, 4, 5, 'root1') and quadratic(3, 4, 5, 'root2'),
 * or simply just quadratic(3, 4, 5, 'both').
 * The $root argument doesn't define which value it will be in relation to the other - I could
 * easily have called them John and Jane, instead of 1st and 2nd.
 *
 * @author Gary Jones
 * @link http://code.garyjones.co.uk/quadratic-solver-function-php/
 * @since 2004-03-21
 * @version 2011-01-01
 * 
 * @param integer $a
 * @param integer $b
 * @param integer $c
 * @param string $root 'root1', 'root2' or 'both. Default is 'both'
 * @param integer $precision Number of decimal place rounding. Default is 3
 * @return mixed The root value 
 */
function quadratic( $a, $b, $c, $root = 'both', $precision = 3 ) {
	$bsmfac = $b * $b - 4 * $a * $c;
	if ( $bsmfac < 0 ) { // Accounts for complex roots.
		$plusminusone = ' + ';
		$plusminustwo = ' - ';
		$bsmfac *= - 1;
		$complex = (sqrt( $bsmfac ) / (2 * $a));
		if ( $a < 0 ) { //if negative imaginary term, tidies appearance.
			$plusminustwo = ' + ';
			$plusminusone = ' - ';
			$complex *= - 1;
		} // End if ($a < 0)
		$lambdaone = round( -$b / (2 * $a), $precision ) . $plusminusone . round( $complex, $precision ) . 'i';
		$lambdatwo = round( -$b / (2 * $a), $precision ) . $plusminustwo . round( $complex, $precision ) . 'i';
	} // End if ($bsmfac < 0)
	else if ( $bsmfac == 0 ) { // Simplifies if b^2 = 4ac (real roots).
		$lambdaone = round( -$b / (2 * $a), $precision );
		$lambdatwo = round( -$b / (2 * $a), $precision );
	} // End else if (bsmfac == 0)
	else { // Finds real roots when b^2 != 4ac.
		$lambdaone = (-$b + sqrt( $bsmfac )) / (2 * $a);
		$lambdaone = round( $lambdaone, $precision );
		$lambdatwo = (-$b - sqrt( $bsmfac )) / (2 * $a);
		$lambdatwo = round( $lambdatwo, $precision );
	} // End else
	// Return what is asked for.
	if ( 'root1' == $root ) {
		return $lambdaone;
	}
	if ( 'root2' == $root ) {
		return $lambdatwo;
	}
	if ( 'both' == $root ) {
		return $lambdaone . ' and ' . $lambdatwo;
	}
}
