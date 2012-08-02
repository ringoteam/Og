<?php

namespace Og\Bundle\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Og\Bundle\AdminBundle\Entity\Purchase
 *
 * @ORM\Table(name="purchase")
 * @ORM\Entity
 */
class Purchase
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $id;

    /**
     * @var integer $artwork_id
     *
     * @ORM\ManyToOne(targetEntity="Artwork")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="artwork_id", referencedColumnName="id")
     * })
     */
    private $artwork_id;

    /**
     * @var string $owner
     *
     * @ORM\Column(name="owner", type="string", length=100, nullable=true)
     */
    private $owner;

    /**
     * @var string $stockfrom
     *
     * @ORM\Column(name="StockFrom", type="string", length=100, nullable=true)
     */
    private $stockfrom;

    /**
     * @var integer $stockstatus
     *
     * @ORM\Column(name="StockStatus", type="integer", nullable=true)
     */
    private $stockstatus;

    /**
     * @var datetime $consignmentstartdate
     *
     * @ORM\Column(name="ConsignmentStartDate", type="datetime", nullable=true)
     */
    private $consignmentstartdate;

    /**
     * Set id
     *
     * @param integer $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set artwork_id
     *
     * @param Og\Bundle\AdminBundle\Entity\Artwork $artwork_id
     */
    public function setArtworkId(\Og\Bundle\AdminBundle\Entity\Artwork $artwork_id)
    {
        $this->artwork_id = $artwork_id;
    }

    /**
     * Get artwork_id
     *
     * @return Og\Bundle\AdminBundle\Entity\Artwork
     */
    public function getArtworkId()
    {
        return $this->artwork_id;
    }

    /**
     * Set owner
     *
     * @param string $owner
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;
    }

    /**
     * Get owner
     *
     * @return string 
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Set stockfrom
     *
     * @param string $stockfrom
     */
    public function setStockfrom($stockfrom)
    {
        $this->stockfrom = $stockfrom;
    }

    /**
     * Get stockfrom
     *
     * @return string 
     */
    public function getStockfrom()
    {
        return $this->stockfrom;
    }

    /**
     * Set stockstatus
     *
     * @param integer $stockstatus
     */
    public function setStockstatus($stockstatus)
    {
        $this->stockstatus = $stockstatus;
    }

    /**
     * Get stockstatus
     *
     * @return integer 
     */
    public function getStockstatus()
    {
        return $this->stockstatus;
    }

    /**
     * Set consignmentstartdate
     *
     * @param datetime $consignmentstartdate
     */
    public function setConsignmentstartdate($consignmentstartdate)
    {
        $this->consignmentstartdate = $consignmentstartdate;
    }

    /**
     * Get consignmentstartdate
     *
     * @return datetime 
     */
    public function getConsignmentstartdate()
    {
        return $this->consignmentstartdate;
    }

}