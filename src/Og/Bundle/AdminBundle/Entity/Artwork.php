<?php

namespace Og\Bundle\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Og\Bundle\AdminBundle\Entity\Artwork
 *
 * @ORM\Table(name="artwork")
 * @ORM\Entity
 */
class Artwork
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
     * @var string $artworkname
     *
     * @ORM\Column(name="ArtworkName", type="string", length=45, nullable=false)
     */
    private $artworkname;

    /**
     * @var datetime $productiondate
     *
     * @ORM\Column(name="ProductionDate", type="datetime", nullable=false)
     */
    private $productiondate;

    /**
     * @var integer $productid
     *
     * @ORM\Column(name="ProductID", type="integer", nullable=true)
     */
    private $productid;

    /**
     * @var smallint $edition
     *
     * @ORM\Column(name="Edition", type="smallint", nullable=true)
     */
    private $edition;

    /**
     * @var integer $editionnumber
     *
     * @ORM\Column(name="EditionNumber", type="integer", nullable=true)
     */
    private $editionnumber;

    /**
     * @var string $region
     *
     * @ORM\Column(name="Region", type="string", length=80, nullable=true)
     */
    private $region;

    /**
     * @var string $category
     *
     * @ORM\Column(name="Category", type="string", length=100, nullable=true)
     */
    private $category;

    /**
     * @var integer $masterartwork
     *
     * @ORM\Column(name="MasterArtwork", type="integer", nullable=true)
     */
    private $masterartwork;

    /**
     * @var integer $gift
     *
     * @ORM\Column(name="gift", type="integer", nullable=true)
     */
    private $gift;

    /**
     * @var string $medium
     *
     * @ORM\Column(name="Medium", type="string", length=100, nullable=true)
     */
    private $medium;

    /**
     * @var integer $sizecm
     *
     * @ORM\Column(name="Sizecm", type="integer", nullable=true)
     */
    private $sizecm;

    /**
     * @var integer $sizeinch
     *
     * @ORM\Column(name="SizeInch", type="integer", nullable=true)
     */
    private $sizeinch;

    /**
     * @var text $remark
     *
     * @ORM\Column(name="Remark", type="text", nullable=true)
     */
    private $remark;

    /**
     * @var Artist
     *
     * @ORM\ManyToOne(targetEntity="Artist")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="artist_id", referencedColumnName="id")
     * })
     */
    private $artist;

    /**
     * @var Productionstatus
     *
     * @ORM\ManyToOne(targetEntity="Productionstatus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="productionStatus_id", referencedColumnName="id")
     * })
     */
    private $productionstatus;



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
     * Set artworkname
     *
     * @param string $artworkname
     */
    public function setArtworkname($artworkname)
    {
        $this->artworkname = $artworkname;
    }

    /**
     * Get artworkname
     *
     * @return string 
     */
    public function getArtworkname()
    {
        return $this->artworkname;
    }

    /**
     * Set productiondate
     *
     * @param datetime $productiondate
     */
    public function setProductiondate($productiondate)
    {
        $this->productiondate = $productiondate;
    }

    /**
     * Get productiondate
     *
     * @return datetime 
     */
    public function getProductiondate()
    {
        return $this->productiondate;
    }

    /**
     * Set productid
     *
     * @param integer $productid
     */
    public function setProductid($productid)
    {
        $this->productid = $productid;
    }

    /**
     * Get productid
     *
     * @return integer 
     */
    public function getProductid()
    {
        return $this->productid;
    }

    /**
     * Set edition
     *
     * @param smallint $edition
     */
    public function setEdition($edition)
    {
        $this->edition = $edition;
    }

    /**
     * Get edition
     *
     * @return smallint 
     */
    public function getEdition()
    {
        return $this->edition;
    }

    /**
     * Set editionnumber
     *
     * @param integer $editionnumber
     */
    public function setEditionnumber($editionnumber)
    {
        $this->editionnumber = $editionnumber;
    }

    /**
     * Get editionnumber
     *
     * @return integer 
     */
    public function getEditionnumber()
    {
        return $this->editionnumber;
    }

    /**
     * Set region
     *
     * @param string $region
     */
    public function setRegion($region)
    {
        $this->region = $region;
    }

    /**
     * Get region
     *
     * @return string 
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Set category
     *
     * @param string $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * Get category
     *
     * @return string 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set masterartwork
     *
     * @param integer $masterartwork
     */
    public function setMasterartwork($masterartwork)
    {
        $this->masterartwork = $masterartwork;
    }

    /**
     * Get masterartwork
     *
     * @return integer 
     */
    public function getMasterartwork()
    {
        return $this->masterartwork;
    }

    /**
     * Set gift
     *
     * @param integer $gift
     */
    public function setGift($gift)
    {
        $this->gift = $gift;
    }

    /**
     * Get gift
     *
     * @return integer 
     */
    public function getGift()
    {
        return $this->gift;
    }

    /**
     * Set medium
     *
     * @param string $medium
     */
    public function setMedium($medium)
    {
        $this->medium = $medium;
    }

    /**
     * Get medium
     *
     * @return string 
     */
    public function getMedium()
    {
        return $this->medium;
    }

    /**
     * Set sizecm
     *
     * @param integer $sizecm
     */
    public function setSizecm($sizecm)
    {
        $this->sizecm = $sizecm;
    }

    /**
     * Get sizecm
     *
     * @return integer 
     */
    public function getSizecm()
    {
        return $this->sizecm;
    }

    /**
     * Set sizeinch
     *
     * @param integer $sizeinch
     */
    public function setSizeinch($sizeinch)
    {
        $this->sizeinch = $sizeinch;
    }

    /**
     * Get sizeinch
     *
     * @return integer 
     */
    public function getSizeinch()
    {
        return $this->sizeinch;
    }

    /**
     * Set remark
     *
     * @param text $remark
     */
    public function setRemark($remark)
    {
        $this->remark = $remark;
    }

    /**
     * Get remark
     *
     * @return text 
     */
    public function getRemark()
    {
        return $this->remark;
    }

    /**
     * Set artist
     *
     * @param Og\Bundle\AdminBundle\Entity\Artist $artist
     */
    public function setArtist(\Og\Bundle\AdminBundle\Entity\Artist $artist)
    {
        $this->artist = $artist;
    }

    /**
     * Get artist
     *
     * @return Og\Bundle\AdminBundle\Entity\Artist
     */
    public function getArtist()
    {
        return $this->artist;
    }

    /**
     * Set productionstatus
     *
     * @param Og\Bundle\AdminBundle\Entity\Productionstatus $productionstatus
     */
    public function setProductionstatus(\Og\Bundle\AdminBundle\Entity\Productionstatus $productionstatus)
    {
        $this->productionstatus = $productionstatus;
    }

    /**
     * Get productionstatus
     *
     * @return Og\Bundle\AdminBundle\Entity\Productionstatus 
     */
    public function getProductionstatus()
    {
        return $this->productionstatus;
    }
    
    public function __toString() {
        return $this->getArtworkname();
    }
}