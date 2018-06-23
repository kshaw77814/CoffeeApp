<?php

namespace CoffeeBundle\ViewModels;

use Symfony\Component\Validator\Constraints as Assert;

class OrderVM
{
    /**
     * @var int
     *
     */
    private $orderId;

    /**
     * @var \DateTime
     *
     */
    private $stamp;

    /**
     * @var OrderLineVM[]
     *
     * @Assert\Count(min="1", minMessage="You must select at least one coffee to order")
     */
    private $orderLines;
}