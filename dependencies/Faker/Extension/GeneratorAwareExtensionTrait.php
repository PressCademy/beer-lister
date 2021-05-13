<?php

declare(strict_types=1);

namespace Beer_List\Dependencies\Faker\Extension;

use Beer_List\Dependencies\Faker\Generator;

/**
 * A helper trait to be used with GeneratorAwareExtension.
 */
trait GeneratorAwareExtensionTrait
{
    /**
     * @var Generator|null
     */
    private $generator;

    /**
     * @return static
     */
    public function withGenerator(Generator $generator): self
    {
        $instance = clone $this;

        $instance->generator = $generator;

        return $instance;
    }
}
