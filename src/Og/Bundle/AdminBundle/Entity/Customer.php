<?php

namespace Og\Bundle\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Og\Bundle\AdminBundle\Entity\Customer
 * 
 * @ORM\Table(name="customer")
 * @ORM\Entity
 */
class Customer
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
     * @var string $LastName
     * 
     * @ORM\Column(name="LastName", type="string", length=45, nullable=false)
     */
    private $LastName;

    /**
     * @var string $FirstName
     * 
     * @ORM\Column(name="FirstName", type="string", length=45, nullable=false)
     */
    private $FirstName;

    /**
     * @var string $Company
     * 
     * @ORM\Column(name="Company", type="string", length=45, nullable=false)
     */
    private $Company;

    /**
     * @var string $AdressField1
     * 
     * @ORM\Column(name="AdressField1", type="string", length=45, nullable=false)
     */
    private $AdressField1;

    /**
     * @var string $AdressField2
     * 
     * @ORM\Column(name="AdressField2", type="string", length=45, nullable=false)
     */
    private $AdressField2;

    /**
     * @var string $ZipCode
     * 
     * @ORM\Column(name="ZipCode", type="string", length=45, nullable=false)
     */
    private $ZipCode;

    /**
     * @var string $City
     * 
     * @ORM\Column(name="City", type="string", length=45, nullable=false)
     */
    private $City;

    /**
     * @var string $PhoneComment
     * 
     * @ORM\Column(name="PhoneComment", type="string", length=45, nullable=false)
     */
    private $PhoneComment;

    /**
     * @var string $Mobile
     * 
     * @ORM\Column(name="Mobile", type="string", length=45, nullable=false)
     */
    private $Mobile;

    /**
     * @var string $BusinessPhone
     * 
     * @ORM\Column(name="BusinessPhone", type="string", length=45, nullable=false)
     */
    private $BusinessPhone;

    /**
     * @var string $Fax
     * 
     * @ORM\Column(name="Fax", type="string", length=45, nullable=false)
     */
    private $Fax;

    /**
     * @var string $Email1
     * 
     * @ORM\Column(name="Email1", type="string", length=45, nullable=false)
     */
    private $Email1;

    /**
     * @var string $Email2
     * 
     * @ORM\Column(name="Email2", type="string", length=45, nullable=false)
     */
    private $Email2;

    /**
     * @var string $Email3
     * 
     * @ORM\Column(name="Email3", type="string", length=45, nullable=false)
     */
    private $Email3;

    /**
     * @var string $Remark
     * 
     * @ORM\Column(name="Remark", type="string", length=45, nullable=false)
     */
    private $Remark;

    /**
     * @var Title
     *
     * @ORM\ManyToOne(targetEntity="Civility")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Title", referencedColumnName="id")
     * })
     */
    private $Title;

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
     * 
     * @var State
     *
     * @ORM\ManyToOne(targetEntity="State")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="State", referencedColumnName="id")
     * })
     *
     */
    private $State;

        
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
     * Set LastName
     *
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->LastName = $lastName;
    }

    /**
     * Get LastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->LastName;
    }

    /**
     * Set FirstName
     *
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->FirstName = $firstName;
    }

    /**
     * Get FirstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->FirstName;
    }

    /**
     * Set Company
     *
     * @param string $company
     */
    public function setCompany($company)
    {
        $this->Company = $company;
    }

    /**
     * Get Company
     *
     * @return string 
     */
    public function getCompany()
    {
        return $this->Company;
    }

    /**
     * Set AdressField1
     *
     * @param string $adressField1
     */
    public function setAdressField1($adressField1)
    {
        $this->AdressField1 = $adressField1;
    }

    /**
     * Get AdressField1
     *
     * @return string 
     */
    public function getAdressField1()
    {
        return $this->AdressField1;
    }

    /**
     * Set AdressField2
     *
     * @param string $adressField2
     */
    public function setAdressField2($adressField2)
    {
        $this->AdressField2 = $adressField2;
    }

    /**
     * Get AdressField2
     *
     * @return string 
     */
    public function getAdressField2()
    {
        return $this->AdressField2;
    }

    /**
     * Set ZipCode
     *
     * @param string $zipCode
     */
    public function setZipCode($zipCode)
    {
        $this->ZipCode = $zipCode;
    }

    /**
     * Get ZipCode
     *
     * @return string 
     */
    public function getZipCode()
    {
        return $this->ZipCode;
    }

    /**
     * Set City
     *
     * @param string $city
     */
    public function setCity($city)
    {
        $this->City = $city;
    }

    /**
     * Get City
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->City;
    }

    /**
     * Set PhoneComment
     *
     * @param string $phoneComment
     */
    public function setPhoneComment($phoneComment)
    {
        $this->PhoneComment = $phoneComment;
    }

    /**
     * Get PhoneComment
     *
     * @return string 
     */
    public function getPhoneComment()
    {
        return $this->PhoneComment;
    }

    /**
     * Set Mobile
     *
     * @param string $mobile
     */
    public function setMobile($mobile)
    {
        $this->Mobile = $mobile;
    }

    /**
     * Get Mobile
     *
     * @return string 
     */
    public function getMobile()
    {
        return $this->Mobile;
    }

    /**
     * Set BusinessPhone
     *
     * @param string $businessPhone
     */
    public function setBusinessPhone($businessPhone)
    {
        $this->BusinessPhone = $businessPhone;
    }

    /**
     * Get BusinessPhone
     *
     * @return string 
     */
    public function getBusinessPhone()
    {
        return $this->BusinessPhone;
    }

    /**
     * Set Fax
     *
     * @param string $fax
     */
    public function setFax($fax)
    {
        $this->Fax = $fax;
    }

    /**
     * Get Fax
     *
     * @return string 
     */
    public function getFax()
    {
        return $this->Fax;
    }

    /**
     * Set Email1
     *
     * @param string $email1
     */
    public function setEmail1($email1)
    {
        $this->Email1 = $email1;
    }

    /**
     * Get Email1
     *
     * @return string 
     */
    public function getEmail1()
    {
        return $this->Email1;
    }

    /**
     * Set Email2
     *
     * @param string $email2
     */
    public function setEmail2($email2)
    {
        $this->Email2 = $email2;
    }

    /**
     * Get Email2
     *
     * @return string 
     */
    public function getEmail2()
    {
        return $this->Email2;
    }

    /**
     * Set Email3
     *
     * @param string $email3
     */
    public function setEmail3($email3)
    {
        $this->Email3 = $email3;
    }

    /**
     * Get Email3
     *
     * @return string 
     */
    public function getEmail3()
    {
        return $this->Email3;
    }

    /**
     * Set Remark
     *
     * @param string $remark
     */
    public function setRemark($remark)
    {
        $this->Remark = $remark;
    }

    /**
     * Get Remark
     *
     * @return string 
     */
    public function getRemark()
    {
        return $this->Remark;
    }

    /**
     * Set Title
     *
     * @param integer $title
     */
    public function setTitle(\Og\Bundle\AdminBundle\Entity\Civility $title)
    {
        $this->Title = $title;
    }

    /**
     * Get Title
     *
     * @return Og\Bundle\AdminBundle\Entity\Civility 
     */
    public function getTitle()
    {
        return $this->Title;
    }

    /**
     * Set Country
     *
     * @param integer $country
     */
    public function setCountry(\Og\Bundle\AdminBundle\Entity\Country $country)
    {
        $this->Country = $country;
    }

    /**
     * Get Country
     *
     * @return Og\Bundle\AdminBundle\Entity\Country 
     */
    public function getCountry()
    {
        return $this->Country;
    }
    
    /**
     * Set State
     *
     * @param integer $state
     */
    public function setState(\Og\Bundle\AdminBundle\Entity\State $state)
    {
        $this->State = $state;
    }

    /**
     * Get State
     *
     * @return Og\Bundle\AdminBundle\Entity\State 
     */
    public function getState()
    {
        return $this->State;
    }
    
    public function __toString() {
        return $this->getFirstname().' '.$this->getLastname();
    }
}