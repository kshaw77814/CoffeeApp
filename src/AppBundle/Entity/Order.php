<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Order
 *
 * @ORM\Table(name="order")
 * @ORM\Entity()
 */
class Order
{
    /**
     * @var int
     *
     * @ORM\Column(name="order_id", type="integer", nullable=false)
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $orderId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="stamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $stamp;

    /**
     * @var string
     *
     * @ORM\Column(name="coffee", type="string", length=128, nullable=false)
     */
    private $coffee;

    /**
     * @var string
     *
     * @ORM\Column(name="extras", type="string", length=128, nullable=true)
     */
    private $extras;

    /**
     * @var bool
     *
     * @ORM\Column(name="processed", type="boolean", nullable=false)
     */
    private $processed = false;

    /**
     * @return \DateTime
     */
    public function getStamp()
    {
        return $this->stamp;
    }

    /**
     * @param \DateTime $stamp
     * @return Order
     */
    public function setStamp($stamp): Order
    {
        $this->stamp = $stamp;
        return $this;
    }

    /**
     * @return string
     */
    public function getCoffee()
    {
        return $this->coffee;
    }

    /**
     * @param string $coffee
     * @return Order
     */
    public function setCoffee($coffee): Order
    {
        $this->coffee = $coffee;
        return $this;
    }

    /**
     * @return string
     */
    public function getExtras()
    {
        return $this->extras;
    }

    /**
     * @param string $extras
     * @return Order
     */
    public function setExtras($extras): Order
    {
        $this->extras = $extras;
        return $this;
    }

    /**
     * @return bool
     */
    public function getProcessed()
    {
        return $this->processed;
    }

    /**
     * @param bool $processed
     */
    public function setProcessed(bool $processed)
    {
        $this->processed = $processed;
    }




    /**
     * @return int
     */
    public function getOrderId()
    {
        return $this->orderId;
    }



}