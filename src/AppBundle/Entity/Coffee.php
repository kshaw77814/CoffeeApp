<?php

namespace AppBundle\Entity;

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
     * @var bool
     *
     * @ORM\Column(name="archived", type="boolean", nullable=false)
     *
     */
    private $archived = false;

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
     * @return bool
     */
    public function getArchived()
    {
        return $this->archived;
    }

    /**
     * @param bool $archived
     * @return Coffee
     */
    public function setArchived($archived): Coffee
    {
        $this->archived = $archived;
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