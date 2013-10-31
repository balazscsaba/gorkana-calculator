<?php

namespace Gorkana\Calculator;

use Gorkana\Math\Adapter as MathAdapter;
use Gorkana\Calculator\Exception;

/**
 * Calculator Calculate class
 *
 * @package      Gorkana\Calculator
 * @author       Balazs Csaba <csaba.balazs@evozon.com>
 * @copyright    Copyright (c) 2013 Gorkana (http://www.gorkana.com/)
 */
class Calculate {

    /**
     * @var null|string
     */
    protected $filename;
    /**
     * @var array
     */
    protected $instructionsMap = array(
        "apply" => "apply",
        "add" => "add",
        "subtract" => "sub",
        "multiply" => "mul",
        "divide" => "div"
    );

    /**
     * Class constructor
     *
     * @param $file
     */
    public function __construct($file = \NULL)
    {
        $this->filename = $file;
    }

    /**
     * Run the instruction from specified file
     *
     * @return int
     * @throws Exception\FileException
     */
    public function run()
    {
        if (!file_exists($this->filename) || !is_readable($this->filename)) {
            $this->throwException("Input file does not exist or is not readable.");
        }

        $content      = str_replace(array("\r\n", "\r"), "\n", file_get_contents($this->filename));
        $lines        = explode("\n", $content);
        $instructions = $this->parseInstructions($lines);

        if (empty($instructions)) {
            $this->throwException("No instructions were found in the input file.");
        }

        $result = 0;
        $math   = new MathAdapter\Standard();

        foreach ($instructions as $operator => $operand) {
            if ($operator == "apply") {
                $result = $math->$operator($operand);
            } else {
                $result = $math->$operator($result, $operand);
            }
        }

        return $result;
    }

    /**
     * Get available instructions list
     *
     * @return string
     */
    public function availableInstructions()
    {
        return implode(", ", array_keys($this->instructionsMap));
    }

    /**
     * Parse lines of instructions and return specific instruction per line
     *
     * @param array $lines
     * @return array
     */
    protected function parseInstructions(array $lines)
    {
        $instructions = array();

        foreach ($lines as $line) {
            $parts    = explode(" ", preg_replace('/\s+/', " ", $line));
            $operator = isset($parts[0]) ? trim($parts[0]) : \NULL;
            $operand  = isset($parts[1]) ? trim($parts[1]) : \NULL;

            if (!$this->isValidInstruction($operator)) {
                continue;
            }

            $operator = $this->mapOperator($operator);
            if ($operator == "apply") {
                // prepend apply operation to instructions
                $instructions = array($operator => $operand) + $instructions;
            } else {
                $instructions[$operator] = $operand;
            }
        }

        return $instructions;
    }

    /**
     * @param $operator
     * @return string
     */
    protected function mapOperator($operator)
    {
        return $this->instructionsMap[$operator];
    }

    /**
     * Check if a certain instruction is allowed
     *
     * @param $instruction
     * @return bool
     */
    protected function isValidInstruction($instruction)
    {
        return in_array($instruction, array_keys($this->instructionsMap));
    }

    /**
     * Throw a file exception
     *
     * @param $message
     * @throws Exception\FileException
     */
    protected function throwException($message)
    {
        throw new Exception\FileException($message);
    }
}
