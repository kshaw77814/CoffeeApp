<?php

namespace CoffeeBundle\Services;

use CoffeeBundle\ViewModels\CoffeeVM;
use CoffeeBundle\ViewModels\OrderVM;

interface ICoffee
{
    /**
     * Gets all the available coffees and returns an array of coffee view models
     *
     * @return CoffeeVM[] | string
     */
    public function getCoffee();

    /**
     * Adds the order to the database and returns the record ID
     *
     * @param OrderVM $order The order to be added to the database
     * @return int | string
     */
    public function addOrder(OrderVM $order);
}