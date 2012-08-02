<?php

namespace Og\Bundle\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Og\Bundle\AdminBundle\Entity\Supplier
 *
 * @ORM\Table(name="supplier")
 * @ORM\Entity(repositoryClass="Og\Bundle\AdminBundle\Entity\SupplierRepository")
 */
class Supplier
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
     * @var string $SupplierName
     *
     * @ORM\Column(name="SupplierName", type="string", length=45)
     */
    private $SupplierName;


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
     * Set SupplierName
     *
     * @param string $supplierName
     */
    public function setSupplierName($supplierName)
    {
        $this->SupplierName = $supplierName;
    }

    /**
     * Get SupplierName
     *
     * @return string 
     */
    public function getSupplierName()
    {
        return $this->SupplierName;
    }
    
    public function __toString() {
        return $this->getSupplierName();
    }
}