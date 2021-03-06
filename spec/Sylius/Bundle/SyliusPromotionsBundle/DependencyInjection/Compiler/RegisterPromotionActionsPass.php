<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\Sylius\Bundle\PromotionsBundle\DependencyInjection\Compiler;

use PHPSpec2\ObjectBehavior;

/**
 * Register promotion action pass spec.
 *
 * @author Saša Stamenković <umpirsky@gmail.com>
 */
class RegisterPromotionActionsPass extends ObjectBehavior
{
    function it_should_be_initializable()
    {
        $this->shouldHaveType('Sylius\Bundle\PromotionsBundle\DependencyInjection\Compiler\RegisterPromotionActionsPass');
    }

    function it_should_be_compiler_pass()
    {
        $this->shouldImplement('Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface');
    }
}
