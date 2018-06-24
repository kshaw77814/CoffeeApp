<?php

namespace CoffeeBundle\Services;


use CoffeeBundle\ViewModels\OrderVM;

interface IOrder
{
    /**
     * Gets a list of orders that are waiting to be processed
     * @return string | OrderVM[]
     */
    public function getOrdersToProcess();

    /**
     * Updates the order to precessed = true
     *
     * @param int $orderId
     * @return string | boolean
     */
    public function processOrder(int $orderId);
}