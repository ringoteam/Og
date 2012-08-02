<?php

namespace Og\Bundle\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Og\Bundle\AdminBundle\Entity\Currency
 *
 * @ORM\Table(name="currency")
 * @ORM\Entity(repositoryClass="Og\Bundle\AdminBundle\Entity\CurrencyRepository")
 */
class Currency
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $CurrencyName
     *
     * @ORM\Column(name="CurrencyName", type="string", length=45)
     */
    private $CurrencyName;

    /**
     * @var Country
     *
     * @ORM\ManyToOne(targetEntity="Country")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Country", referencedColumnName="id")
     * })
     */
    private $Country;


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
     * Set CurrencyName
     *
     * @param string $currencyName
     */
    public function setCurrencyName($currencyName)
    {
        $this->CurrencyName = $currencyName;
    }

    /**
     * Get CurrencyName
     *
     * @return string 
     */
    public function getCurrencyName()
    {
        return $this->CurrencyName;
    }

    /**
     * Set Country
     *
     * @param integer $country
     */
    public function setCountry($country)
    {
        $this->Country = $country;
    }

    /**
     * Get Country
     *
     * @return integer 
     */
    public function getCountry()
    {
        return $this->Country;
    }
    
    public function __toString() {
        return $this->getCurrencyName();
    }
}