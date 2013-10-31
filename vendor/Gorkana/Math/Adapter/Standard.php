<?php

namespace Gorkana\Math\Adapter;

use Zend\Math\BigInteger\Adapter as Adapter;
use Zend\Math\BigInteger\Exception as Exception;

/**
 * Calculator Math class
 *
 * @package      Gorkana\Calculator
 * @author       Balazs Csaba <csaba.balazs@evozon.com>
 * @copyright    Copyright (c) 2013 Gorkana (http://www.gorkana.com/)
 */
class Standard implements Adapter\AdapterInterface
{
    /**
     * Create string representing integer in decimal form from arbitrary integer format
     *
     * @param  string $operand
     * @param  int|null $base
     * @return bool|string
     * @throws Exception\RuntimeException
     */
    public function init($operand, $base = null)
    {
        throw new Exception\RuntimeException(
            "Method \"".__FUNCTION__."\" not supported in adapter"
        );
    }

    /**
     * Apply a value to the operand
     *
     * @param $operand
     * @return int
     */
    public function apply($operand)
    {
        return (int) $operand;
    }

    /**
     * Add two integers
     *
     * @param  int $leftOperand
     * @param  int $rightOperand
     * @return int
     */
    public function add($leftOperand, $rightOperand)
    {
        return ($leftOperand + $rightOperand);
    }

    /**
     * Subtract two integers
     *
     * @param  int $leftOperand
     * @param  int $rightOperand
     * @return int
     */
    public function sub($leftOperand, $rightOperand)
    {
        return ($leftOperand - $rightOperand);
    }

    /**
     * Multiply two integers
     *
     * @param  int $leftOperand
     * @param  int $rightOperand
     * @return int
     */
    public function mul($leftOperand, $rightOperand)
    {
        return ($leftOperand * $rightOperand);
    }

    /**
     * Divide two integers and return integer part result.
     * Raises exception if the divisor is zero.
     *
     * @param  int $leftOperand
     * @param  int $rightOperand
     * @return int
     * @throws Exception\DivisionByZeroException
     */
    public function div($leftOperand, $rightOperand)
    {
        if ($rightOperand == 0) {
            throw new Exception\DivisionByZeroException(
                "Division by zero; divisor = {$rightOperand}"
            );
        }

        return ($leftOperand / $rightOperand);
    }

    /**
     * Raise an integers to another
     *
     * @param  int $operand
     * @param  int $exp
     * @return int
     * @throws Exception\RuntimeException
     */
    public function pow($operand, $exp)
    {
        throw new Exception\RuntimeException(
            "Method \"".__FUNCTION__."\" not supported in adapter"
        );
    }

    /**
     * Get the square root of an integer
     *
     * @param  int $operand
     * @return int
     * @throws Exception\RuntimeException
     */
    public function sqrt($operand)
    {
        throw new Exception\RuntimeException(
            "Method \"".__FUNCTION__."\" not supported in adapter"
        );
    }

    /**
     * Get absolute value of an integer
     *
     * @param  int $operand
     * @return int
     * @throws Exception\RuntimeException
     */
    public function abs($operand)
    {
        throw new Exception\RuntimeException(
            "Method \"".__FUNCTION__."\" not supported in adapter"
        );
    }

    /**
     * Get modulus of an integer
     *
     * @param  int $leftOperand
     * @param  int $rightOperand
     * @return int
     * @throws Exception\RuntimeException
     */
    public function mod($leftOperand, $rightOperand)
    {
        throw new Exception\RuntimeException(
            "Method \"".__FUNCTION__."\" not supported in adapter"
        );
    }

    /**
     * Raise an integer to another, reduced by a specified modulus
     *
     * @param  int $leftOperand
     * @param  int $rightOperand
     * @param  int $modulus
     * @return int
     * @throws Exception\RuntimeException
     */
    public function powmod($leftOperand, $rightOperand, $modulus)
    {
        throw new Exception\RuntimeException(
            "Method \"".__FUNCTION__."\" not supported in adapter"
        );
    }

    /**
     * Compare two integers and returns result as an integer where
     * Returns < 0 if leftOperand is less than rightOperand;
     * > 0 if leftOperand is greater than rightOperand, and 0 if they are equal.
     *
     * @param  int $leftOperand
     * @param  int $rightOperand
     * @return int
     * @throws Exception\RuntimeException
     */
    public function comp($leftOperand, $rightOperand)
    {
        throw new Exception\RuntimeException(
            "Method \"".__FUNCTION__."\" not supported in adapter"
        );
    }

    /**
     * Convert big integer into it's binary number representation
     *
     * @param  string $operand
     * @param  bool $twoc return in two's complement form
     * @return int
     * @throws Exception\RuntimeException
     */
    public function intToBin($operand, $twoc = false)
    {
        throw new Exception\RuntimeException(
            "Method \"".__FUNCTION__."\" not supported in adapter"
        );
    }

    /**
     * Convert big integer into it's binary number representation
     *
     * @param  string $bytes
     * @param  bool   $twoc whether binary number is in twos' complement form
     * @return int
     * @throws Exception\RuntimeException
     */
    public function binToInt($bytes, $twoc = false)
    {
        throw new Exception\RuntimeException(
            "Method \"".__FUNCTION__."\" not supported in adapter"
        );
    }

    /**
     * Base conversion. Bases 2..62 are supported
     *
     * @param  string $operand
     * @param  int    $fromBase
     * @param  int    $toBase
     * @return int
     * @throws Exception\RuntimeException
     */
    public function baseConvert($operand, $fromBase, $toBase = 10)
    {
        throw new Exception\RuntimeException(
            "Method \"".__FUNCTION__."\" not supported in adapter"
        );
    }
}
