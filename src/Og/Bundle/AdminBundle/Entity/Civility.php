<?php

namespace Og\Bundle\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Og\Bundle\AdminBundle\Entity\Civility
 *
 * @ORM\Table(name="civility")
 * @ORM\Entity(repositoryClass="Og\Bundle\AdminBundle\Entity\CivilityRepository")
 */
class Civility
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
     * @var string $CivilityName
     *
     * @ORM\Column(name="CivilityName", type="string", length=45)
     */
    private $CivilityName;


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
     * Set CivilityName
     *
     * @param string $civilityName
     */
    public function setCivilityName($civilityName)
    {
        $this->CivilityName = $civilityName;
    }

    /**
     * Get CivilityName
     *
     * @return string 
     */
    public function getCivilityName()
    {
        return $this->CivilityName;
    }
    
    public function __toString() {
        return $this->getCivilityName();
    }
}