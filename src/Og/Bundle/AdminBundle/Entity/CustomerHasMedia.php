<?php

namespace Og\Bundle\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Og\Bundle\AdminBundle\Entity\CustomerHasMedia
 *
 * @ORM\Table(name="customer_has_media")
 * @ORM\Entity(repositoryClass="Og\Bundle\AdminBundle\Entity\CustomerHasMediaRepository")
 */
class CustomerHasMedia
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
     * @var media
     *
     * @ORM\ManyToOne(targetEntity="MediaAdmin")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="media", referencedColumnName="id")
     * })
     */
    private $media;


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
     * Set media
     *
     * @param integer $media
     */
    public function setMedia(\vendor\bundles\Sonata\MediaBundle\Model\Media $media)
    {
        $this->media = $media;
    }

    /**
     * Get media
     *
     * @return \vendor\bundles\Sonata\MediaBundle\Model\Media
     */
    public function getMedia()
    {
        return $this->media;
    }
}