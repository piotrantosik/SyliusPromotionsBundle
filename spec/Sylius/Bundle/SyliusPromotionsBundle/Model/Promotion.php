<?php

namespace spec\Sylius\Bundle\PromotionsBundle\Model;

use PHPSpec2\ObjectBehavior;

/**
 * Promotion model spec.
 *
 * @author Saša Stamenković <umpirsky@gmail.com>
 */
class Promotion extends ObjectBehavior
{
    function it_should_be_initializable()
    {
        $this->shouldHaveType('Sylius\Bundle\PromotionsBundle\Model\Promotion');
    }

    function it_should_be_Sylius_promotion()
    {
        $this->shouldImplement('Sylius\Bundle\PromotionsBundle\Model\PromotionInterface');
    }

    function it_should_not_have_id_by_default()
    {
        $this->getId()->shouldReturn(null);
    }

    function its_name_should_be_mutable()
    {
        $this->setName('New Year Sale');
        $this->getName()->shouldReturn('New Year Sale');
    }

    function its_description_should_be_mutable()
    {
        $this->setDescription('New Year Sale 50% off.');
        $this->getDescription()->shouldReturn('New Year Sale 50% off.');
    }

    function it_should_have_no_usage_limit_by_default()
    {
        $this->getUsageLimit()->shouldReturn(null);
    }

    function its_usage_limit_should_be_mutable()
    {
        $this->setUsageLimit(10);
        $this->getUsageLimit()->shouldReturn(10);
    }

    function it_should_not_be_used_by_default()
    {
        $this->getUsed()->shouldReturn(0);
    }

    function its_used_should_be_mutable()
    {
        $this->setUsed(5);
        $this->getUsed()->shouldReturn(5);
    }

    function its_used_should_be_incrementable()
    {
        $this->incrementUsed();
        $this->getUsed()->shouldReturn(1);
    }

    /**
     * @param DateTime $date
     */
    function its_starts_at_should_be_mutable($date)
    {
        $this->setStartsAt($date);
        $this->getStartsAt()->shouldReturn($date);
    }

    /**
     * @param DateTime $date
     */
    function its_ends_at_should_be_mutable($date)
    {
        $this->setEndsAt($date);
        $this->getEndsAt()->shouldReturn($date);
    }

    function it_should_initialize_coupons_collection_by_default()
    {
        $this->getCoupons()->shouldHaveType('Doctrine\Common\Collections\Collection');
    }

    /**
     * @param Sylius\Bundle\PromotionsBundle\Model\CouponInterface $coupon
     */
    function it_should_add_coupons_properly($coupon)
    {
        $this->hasCoupon($coupon)->shouldReturn(false);

        $coupon->setPromotion($this)->shouldBeCalled();
        $this->addCoupon($coupon);

        $this->hasCoupon($coupon)->shouldReturn(true);
    }

    /**
     * @param Sylius\Bundle\PromotionsBundle\Model\CouponInterface $coupon
     */
    function it_should_remove_coupons_properly($coupon)
    {
        $this->hasCoupon($coupon)->shouldReturn(false);

        $coupon->setPromotion($this)->shouldBeCalled();
        $this->addCoupon($coupon);

        $coupon->setPromotion(null)->shouldBeCalled();
        $this->removeCoupon($coupon);

        $this->hasCoupon($coupon)->shouldReturn(false);
    }

    function it_should_initialize_rules_collection_by_default()
    {
        $this->getRules()->shouldHaveType('Doctrine\Common\Collections\Collection');
    }

    /**
     * @param Sylius\Bundle\PromotionsBundle\Model\RuleInterface $rule
     */
    function it_should_add_rules_properly($rule)
    {
        $this->hasRule($rule)->shouldReturn(false);

        $rule->setPromotion($this)->shouldBeCalled();
        $this->addRule($rule);

        $this->hasRule($rule)->shouldReturn(true);
    }

    /**
     * @param Sylius\Bundle\PromotionsBundle\Model\RuleInterface $rule
     */
    function it_should_remove_rules_properly($rule)
    {
        $this->hasRule($rule)->shouldReturn(false);

        $rule->setPromotion($this)->shouldBeCalled();
        $this->addRule($rule);

        $rule->setPromotion(null)->shouldBeCalled();
        $this->removeRule($rule);

        $this->hasRule($rule)->shouldReturn(false);
    }

    function it_should_initialize_actions_collection_by_default()
    {
        $this->getActions()->shouldHaveType('Doctrine\Common\Collections\Collection');
    }

    /**
     * @param Sylius\Bundle\PromotionsBundle\Model\ActionInterface $action
     */
    function it_should_add_actions_properly($action)
    {
        $this->hasAction($action)->shouldReturn(false);

        $action->setPromotion($this)->shouldBeCalled();
        $this->addAction($action);

        $this->hasAction($action)->shouldReturn(true);
    }

    /**
     * @param Sylius\Bundle\PromotionsBundle\Model\ActionInterface $action
     */
    function it_should_remove_actions_properly($action)
    {
        $this->hasAction($action)->shouldReturn(false);

        $action->setPromotion($this)->shouldBeCalled();
        $this->addAction($action);

        $action->setPromotion(null)->shouldBeCalled();
        $this->removeAction($action);

        $this->hasAction($action)->shouldReturn(false);
    }
}
