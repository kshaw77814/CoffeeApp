<?php

namespace AppBundle\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Extra
 *
 * @ORM\Table(name="extra")
 *
 * @ORM\Entity()
 */
class Extra
{
    /**
     * @var integer
     *
     * @ORM\Column(name="extra_id", type="integer", nullable=false)
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $extraId;

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
    private $qtyAvailable = 0;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Extra
     */
    public function setName($name): Extra
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
     * @return Extra
     */
    public function setQtyAvailable($qtyAvailable): Extra
    {
        $this->qtyAvailable = $qtyAvailable;
        return $this;
    }

    /**
     * @return int
     */
    public function getExtraId()
    {
        return $this->extraId;
    }




}