<?php

namespace App\Blocks;

abstract class Block
{
    protected $context;

    /**
     * Constructor
     *
     * @param array $context
     */
    public function __construct(array $context) {
        $context = $this->alterContext($context);
        $this->context = $context;
    }

    /**
     * Modify context property before it is set.
     *
     * @param array $context
     * @return array
     */
    protected function alterContext(array $context) : array {
        return $context;
    }

    /**
     * Accessor for context property.
     *
     * @return array
     */
    public function getContext() : array {
        return $this->context;
    }
}
