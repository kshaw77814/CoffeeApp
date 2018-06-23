<?php

namespace AppBundle\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class OrderLine
 *
 * @ORM\Table(name="order_line")
 * @ORM\Entity()
 */
class OrderLine
{
    /**
     * @var int
     *
     * @ORM\Column(name="order_line_id", type="integer", nullable=false)
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $orderLineId;

    /**
     * @var Order
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entities\Order")
     * @ORM\JoinColumn(name="order_id", referencedColumnName="order_id", nullable=false)
     */
    private $order;

    /**
     * @var int
     *
     * @ORM\Column(name="product_id", type="integer", nullable=false)
     */
    private $productId;

    /**
     * @var string
     *
     * @ORM\Column(name="product_name", type="string", length=128, nullable=false)
     */
    private $productName;

    /**
     * @var integer
     *
     * @ORM\Column(name="qty", type="integer", nullable=false)
     */
    private $qty;

    /**
     * @var double
     *
     * @ORM\Column(name="cost", type="decimal",  precision=15, scale=2, nullable=false)
     */
    private $cost;

    /**
     * @var double
     *
     * @ORM\Column(name="line_total", type="decimal",  precision=15, scale=2, nullable=false)
     */
    private $lineTotal;

    /**
     * @return Order
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param Order $order
     * @return OrderLine
     */
    public function setOrder($order): OrderLine
    {
        $this->order = $order;
        return $this;
    }

    /**
     * @return int
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param int $productId
     * @return OrderLine
     */
    public function setProductId($productId): OrderLine
    {
        $this->productId = $productId;
        return $this;
    }

    /**
     * @return string
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * @param string $productName
     * @return OrderLine
     */
    public function setProductName($productName): OrderLine
    {
        $this->productName = $productName;
        return $this;
    }

    /**
     * @return int
     */
    public function getQty()
    {
        return $this->qty;
    }

    /**
     * @param int $qty
     * @return OrderLine
     */
    public function setQty($qty): OrderLine
    {
        $this->qty = $qty;
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
     * @return OrderLine
     */
    public function setCost($cost): OrderLine
    {
        $this->cost = $cost;
        return $this;
    }

    /**
     * @return float
     */
    public function getLineTotal()
    {
        return $this->lineTotal;
    }

    /**
     * @param float $lineTotal
     * @return OrderLine
     */
    public function setLineTotal($lineTotal): OrderLine
    {
        $this->lineTotal = $lineTotal;
        return $this;
    }

    /**
     * @return int
     */
    public function getOrderLineId()
    {
        return $this->orderLineId;
    }


}