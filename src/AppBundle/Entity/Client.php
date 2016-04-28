<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Description of Client
 *
 * @author contactenesi
 */
/**
 * @ORM\Entity
 * @ORM\Table(name="client")
 */
class Client {

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="clientid", type="integer", nullable=false)
     */
    private $clientId;

    /**
     * @ORM\Column(name="clientname", type="string", length=150)
     */
    private $clientName;

    /**
     * @ORM\Column(name="clientsite", type="string", length=100, nullable=true)
     */
    private $clientSite;

    /**
     * @ORM\Column(name="startofrelation", type="date", nullable=true)
     */
    private $startofrelation;


    /**
     * Get clientId
     *
     * @return integer 
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * Set clientName
     *
     * @param string $clientName
     * @return Client
     */
    public function setClientName($clientName)
    {
        $this->clientName = $clientName;

        return $this;
    }

    /**
     * Get clientName
     *
     * @return string 
     */
    public function getClientName()
    {
        return $this->clientName;
    }

    /**
     * Set clientSite
     *
     * @param string $clientSite
     * @return Client
     */
    public function setClientSite($clientSite)
    {
        $this->clientSite = $clientSite;

        return $this;
    }

    /**
     * Get clientSite
     *
     * @return string 
     */
    public function getClientSite()
    {
        return $this->clientSite;
    }

    /**
     * Set startofrelation
     *
     * @param \DateTime $startofrelation
     * @return Client
     */
    public function setStartofrelation($startofrelation)
    {
        $this->startofrelation = $startofrelation;

        return $this;
    }

    /**
     * Get startofrelation
     *
     * @return \DateTime 
     */
    public function getStartofrelation()
    {
        return $this->startofrelation;
    }
}
