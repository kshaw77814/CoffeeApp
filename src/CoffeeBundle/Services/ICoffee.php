<?php

namespace CoffeeBundle\Models;

use AppBundle\Entities\Coffee;

interface ICoffee
{
    /**
     * @return CoffeeVM[] | string
     */
    public function getCoffee();

    /**
     * @return ExtraVM[] | string
     */
    public function getExtras();

    /**
     * @return int | string
     */
    public function addOrder();
}