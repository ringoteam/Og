<?php

namespace Og\Bundle\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Og\Bundle\AdminBundle\Entity\State
 *
 * @ORM\Table(name="state")
 * @ORM\Entity(repositoryClass="Og\Bundle\AdminBundle\Entity\StateRepository")
 */
class State
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
     * @var string $StateName
     *
     * @ORM\Column(name="StateName", type="string", length=45)
     */
    private $StateName;

    /**
     * @var Country
     *
     * @ORM\ManyToOne(targetEntity="Country")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CountryId", referencedColumnName="id")
     * })
     *
     */
    private $CountryId;


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
     * Set StateName
     *
     * @param string $stateName
     */
    public function setStateName($stateName)
    {
        $this->StateName = $stateName;
    }

    /**
     * Get StateName
     *
     * @return string 
     */
    public function getStateName()
    {
        return $this->StateName;
    }

    /**
     * Set CountryId
     *
     * @param integer $countryId
     */
    public function setCountryId($countryId)
    {
        $this->CountryId = $countryId;
    }

    /**
     * Get CountryId
     *
     * @return integer 
     */
    public function getCountryId()
    {
        return $this->CountryId;
    }
    
    public function __toString() {
        return $this->getStateName();
    }
}