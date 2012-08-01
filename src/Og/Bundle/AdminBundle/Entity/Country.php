<?php

namespace Og\Bundle\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Og\Bundle\AdminBundle\Entity\Country
 * 
 * @ORM\Table(name="country")
 * @ORM\Entity
 */
class Country
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
     * @var string $CountryName
     * 
     * @ORM\Column(name="CountryName", type="string", length=45, nullable=false)
     */
    private $CountryName;

    
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
     * Set CountryName
     *
     * @param string $countryName
     */
    public function setCountryName($countryName)
    {
        $this->CountryName = $countryName;
    }

    /**
     * Get CountryName
     *
     * @return string 
     */
    public function getCountryName()
    {
        return $this->CountryName;
    }
    
    public function __toString() {
        return $this->getCountryName();
    }
}