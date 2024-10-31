<?php

declare(strict_types=1);

namespace AguPessoas\Backend\Bundles\DMS\Filter\Rules;

use AguPessoas\Backend\Bundles\DMS\Filter\Exception\InvalidCallbackException;

/**
 * Callback Rule.
 *
 * @Annotation
 * @NamedArgumentConstructor
 * @Target("PROPERTY")
 */
#[\Attribute(\Attribute::TARGET_PROPERTY)]
class Callback extends Rule
{
    public const SELF_METHOD_TYPE = 'self_method';
    public const CALLABLE_TYPE = 'callable';
    public const CLOSURE_TYPE = 'closure';

    /**
     * @param string|array|\Closure $callback Callback, can be:
     *                                        string: method of filtered object or function
     *                                        array: [Class, Method] to be called
     *                                        Closure
     */
    public function __construct(
        public string|array|\Closure $callback,
    ) {
    }

    /**
     * Figures out which type of input was provided.
     *
     * @throws InvalidCallbackException
     */
    public function getInputType(): string
    {
        switch (true) {
            case $this->callback instanceof \Closure:
                return self::CLOSURE_TYPE;

            case \is_callable($this->callback, false):
                return self::CALLABLE_TYPE;

            case \is_string($this->callback):
                return self::SELF_METHOD_TYPE;
        }

        throw new InvalidCallbackException('The input provided for Callback filter is not supported or the callable not valid.
            Please refer to the class documentation.');
    }
}
