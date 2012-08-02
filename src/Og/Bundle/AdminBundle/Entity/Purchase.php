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
     * @ORM\GeneratedValue(strategy="IDENTITY")
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
     * @var datetime $consignmentenddate
     *
     * @ORM\Column(name="ConsignmentEndDate", type="datetime", nullable=true)
     */
    private $consignmentenddate;

    
     /**
     * @var datetime $purchasedate
     *
     * @ORM\Column(name="PurchaseDate", type="datetime", nullable=true)
     */
    private $purchasedate;

    
     /**
     * @var string $purchasenumber
     *
     * @ORM\Column(name="PurchaseNumber", type="string", nullable=true)
     */
    private $purchasenumber;
    
     /**
     * @var integer $purchasepriceht
     *
     * @ORM\Column(name="PurchasePriceHt", type="integer", nullable=true)
     */
    private $purchasepriceht;
    
    /**
     * @var integer $purchasepricevat
     *
     * @ORM\Column(name="PurchasePriceVat", type="integer", nullable=true)
     */
    private $purchasepricevat;

    /**
     * @var string $purchasepricecurrency
     * 
     * @ORM\ManyToOne(targetEntity="Currency")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="PurchasePriceCurrency", referencedColumnName="id")
     * })
     */
    private $purchasepricecurrency;
    
    /**
     * @var integer $supplier
     *
     * @ORM\ManyToOne(targetEntity="Supplier")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Supplier", referencedColumnName="id")
     * })
     */
    private $supplier;
    
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
    
    /**
     * Set ConsignmentEndDate
     *
     * @param datetime $consignmentenddate
     */
    public function setConsignmentenddate($consignmentenddate)
    {
        $this->consignmentenddate = $consignmentenddate;
    }

    /**
     * Get ConsignmentEndDate
     *
     * @return datetime 
     */
    public function getConsignmentenddate()
    {
        return $this->consignmentenddate;
    }
    
    /**
     * Set PurchaseDate
     *
     * @param datetime $purchasedate
     */
    public function setPurchasedate($purchasedate)
    {
        $this->purchasedate = $purchasedate;
    }

    /**
     * Get PurchaseDate
     *
     * @return datetime 
     */
    public function getPurchasedate()
    {
        return $this->purchasedate;
    }
    
    /**
     * Set PurchaseNumber
     *
     * @param string $purchasenumber
     */
    public function setPurchasenumber($purchasenumber)
    {
        $this->purchasenumber = $purchasenumber;
    }

    /**
     * Get PurchaseNumber
     *
     * @return string
     */
    public function getPurchasenumber()
    {
        return $this->purchasenumber;
    }
    
    /**
     * Set PurchasePriceHt
     *
     * @param integer $purchasepriceht
     */
    public function setPurchasepriceht($purchasepriceht)
    {
        $this->purchasepriceht = $purchasepriceht;
    }

    /**
     * Get PurchasePriceHt
     *
     * @return integer
     */
    public function getPurchasepriceht()
    {
        return $this->purchasepriceht;
    }
    
    /**
     * Set PurchasePriceVat
     *
     * @param integer $purchasepricevat
     */
    public function setPurchasepricevat($purchasepricevat)
    {
        $this->purchasepricevat = $purchasepricevat;
    }

    /**
     * Get PurchasePriceVat
     *
     * @return integer
     */
    public function getPurchasepricevat()
    {
        return $this->purchasepricevat;
    }
    
    /**
     * Set PurchasePriceCurrency
     *
     * @param Og\Bundle\AdminBundle\Entity\Currency $purchasepricecurrency
     */
    public function setPurchasepricecurrency(\Og\Bundle\AdminBundle\Entity\Currency $purchasepricecurrency)
    {
        $this->purchasepricecurrency = $purchasepricecurrency;
    }

    /**
     * Get PurchasePriceCurrency
     *
     * @return Og\Bundle\AdminBundle\Entity\Currency
     */
    public function getPurchasepricecurrency()
    {
        return $this->purchasepricecurrency;
    }
    
    /**
     * Set Supplier
     *
     * @param Og\Bundle\AdminBundle\Entity\Supplier $supplier
     */
    public function setSupplier(\Og\Bundle\AdminBundle\Entity\Supplier $supplier)
    {
        $this->supplier = $supplier;
    }

    /**
     * Get Supplier
     *
     * @return Og\Bundle\AdminBundle\Entity\Supplier
     */
    public function getSupplier()
    {
        return $this->supplier;
    }
    
    /**
     * Get Artwork
     *
     * @return Og\Bundle\AdminBundle\Entity\Artwork
     */
    public function getArtwork() 
    {
        return $this->artwork_id;
    }
}