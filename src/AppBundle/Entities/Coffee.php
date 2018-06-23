<?php

namespace AppBundle\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Coffee
 *
 * @ORM\Table(name="Coffee")
 * @ORM\Entity(repositoryClass="AppBundle\Repos\CoffeeRepo")
 */
class Coffee
{
    /**
     * @var int
     *
     * @ORM\Column(name="coffee_id", type="integer", nullable=false)
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $coffeeId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=128, nullable=false, unique=true)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="qty_available", type="integer", nullable=false)
     */
    private $qtyAvailable= 0;

    /**
     * @var double
     *
     * @ORM\Column(name="cost", type="decimal",  precision=15, scale=2, nullable=false)
     */
    private $cost = 0.00;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Coffee
     */
    public function setName($name): Coffee
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
     * @return Coffee
     */
    public function setQtyAvailable($qtyAvailable): Coffee
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
     * @return Coffee
     */
    public function setCost($cost): Coffee
    {
        $this->cost = $cost;
        return $this;
    }

    /**
     * @return int
     */
    public function getCoffeeId()
    {
        return $this->coffeeId;
    }




}