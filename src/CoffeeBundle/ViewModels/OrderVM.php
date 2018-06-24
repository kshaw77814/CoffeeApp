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
     * @var CoffeeVM
     */
    private $coffee;

    /**
     * @var int
     *
     * @Assert\Range(max="3", maxMessage="You cannot select more than 3 sugars per coffee")
     */
    private $sugar;

    /**
     * @var bool
     *
     * @Assert\NotBlank(message="Please select whether you would like to add milk to your coffee or not")
     */
    private $milk = false;

    /**
     * @return int
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * @param int $orderId
     * @return OrderVM
     */
    public function setOrderId($orderId): OrderVM
    {
        $this->orderId = $orderId;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getStamp()
    {
        return $this->stamp;
    }

    /**
     * @param \DateTime $stamp
     * @return OrderVM
     */
    public function setStamp($stamp): OrderVM
    {
        $this->stamp = $stamp;
        return $this;
    }

    /**
     * @return CoffeeVM
     */
    public function getCoffee()
    {
        return $this->coffee;
    }

    /**
     * @param CoffeeVM $coffee
     * @return OrderVM
     */
    public function setCoffee($coffee): OrderVM
    {
        $this->coffee = $coffee;
        return $this;
    }

    /**
     * @return int
     */
    public function getSugar()
    {
        return $this->sugar;
    }

    /**
     * @param int $sugar
     * @return OrderVM
     */
    public function setSugar($sugar): OrderVM
    {
        $this->sugar = $sugar;
        return $this;
    }

    /**
     * @return bool
     */
    public function getMilk()
    {
        return $this->milk;
    }

    /**
     * @param bool $milk
     * @return OrderVM
     */
    public function setMilk($milk): OrderVM
    {
        $this->milk = $milk;
        return $this;
    }






    public function getProperties(bool $excludeId = false)
    {
        $properties = array();
        foreach ($this as $prop => $value) {
            if ($excludeId) {
                if (strpos($prop, 'Id') != false) {
                    continue;
                }
            }
            $properties[$prop] = $value;
        }
        return $properties;
    }
}