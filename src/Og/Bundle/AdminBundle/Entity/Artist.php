<?php

namespace Og\Bundle\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Og\Bundle\AdminBundle\Entity\Artist
 *
 * @ORM\Table(name="artist")
 * @ORM\Entity
 */
class Artist
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
     * @var string $lastname
     *
     * @ORM\Column(name="lastname", type="string", length=45, nullable=false)
     */
    private $lastname;

    /**
     * @var string $firstname
     *
     * @ORM\Column(name="firstname", type="string", length=45, nullable=false)
     */
    private $firstname;

    /**
     * @var datetime $birthdate
     *
     * @ORM\Column(name="birthdate", type="datetime", nullable=true)
     */
    private $birthdate;

    /**
     * @var datetime $deathdate
     *
     * @ORM\Column(name="deathdate", type="datetime", nullable=true)
     */
    private $deathdate;

    /**
     * @var blob $image
     *
     * @ORM\Column(name="image", type="blob", nullable=true)
     */
  //  private $image;

    
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
     * Set lastname
     *
     * @param string $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set birthdate
     *
     * @param datetime $birthdate
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;
    }

    /**
     * Get birthdate
     *
     * @return datetime 
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Set deathdate
     *
     * @param datetime $deathdate
     */
    public function setDeathdate($deathdate)
    {
        $this->deathdate = $deathdate;
    }

    /**
     * Get deathdate
     *
     * @return datetime 
     */
    public function getDeathdate()
    {
        return $this->deathdate;
    }
    
    /**
     * Set image
     *
     * @param file 
     */
    /**public function setImage($image)
    {
        $this->image = $image;
    }*/

    /**
     * Get image
     *
     * @return file
     */
    /*public function getImage()
    {
        return $this->image;
    }
    */
    
    public function __toString() {
        return $this->getFirstname().' '.$this->getLastname();
    }
}