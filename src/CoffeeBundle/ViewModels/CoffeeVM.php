<?php

namespace CoffeeBundle\ViewModels;

class CoffeeVM
{
    /**
     * @var int
     *
     */
    private $coffeeId;

    /**
     * @var string
     *
     */
    private $name;

    /**
     * @var int
     *
     */
    private $qtyAvailable= 0;

    /**
     * @var double
     *
     */
    private $cost = 0.00;

    /**
     * @return int
     */
    public function getCoffeeId()
    {
        return $this->coffeeId;
    }

    /**
     * @param int $coffeeId
     * @return CoffeeVM
     */
    public function setCoffeeId($coffeeId): CoffeeVM
    {
        $this->coffeeId = $coffeeId;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return CoffeeVM
     */
    public function setName($name): CoffeeVM
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getQtyAvailable()
    {
        return $this->qtyAvailable;
    }

    /**
     * @param int $qtyAvailable
     * @return CoffeeVM
     */
    public function setQtyAvailable($qtyAvailable): CoffeeVM
    {
        $this->qtyAvailable = $qtyAvailable;
        return $this;
    }

    /**
     * @return float
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * @param float $cost
     * @return CoffeeVM
     */
    public function setCost($cost): CoffeeVM
    {
        $this->cost = $cost;
        return $this;
    }


}