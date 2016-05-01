<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Description of FlightTicket
 *
 * @author contactenesi
 */

/**
 * @ORM\Entity
 * @ORM\Table(name="flightticket")
 */
class FlightTicket {
    /* Constants for Enum type */

    const STATUS = array("ok", "cancelled");

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="ticketid", type="integer", nullable=false)
     */
    private $ticketId;

    /**
     * @ORM\Column(name="pnr", type="string", length=6)
     */
    private $pnr;

    /**
     * @ORM\Column(name="ticketno", type="string", length=15, unique=true)
     */
    private $ticketNo;

    /**
     * @ORM\Column(name="status", type="string", length=10, options={"default":"ok"})
     */
    private $status;

    /**
     * @ORM\Column(name="amount", type="decimal", precision=11, scale=4)
     */
    private $amount;

    /*
     * @ORM\Column(name="commission", type="decimal", precision=11, scale=4)

      private $commission;
     */

    /**
     * @ORM\Column(name="agentcommission", type="decimal", precision=11, scale=4, options={"default":0})
     */
    private $agentCommission;

    /**
     * @ORM\Column(name="balance", type="decimal", precision=11, scale=4)
     */
    private $balance;

    /**
     * @ORM\Column(name="entry_date", type="datetime")
     */
    private $entryDate;

    /**
     * @ORM\ManyToOne(targetEntity="Agent")
     * @ORM\JoinColumn(name="agentid", referencedColumnName="agentid", nullable=false)
     */
    private $agent;
    
    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="userid", referencedColumnName="userid", nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="ReservationSystem")
     * @ORM\JoinColumn(name="rsid", referencedColumnName="rsid")
    
    private $reservationSystem;
 */
    /**
     * Get ticketId
     *
     * @return integer 
     */
    public function getTicketId() {
        return $this->ticketId;
    }

    /**
     * Set pnr
     *
     * @param string $pnr
     * @return FlightTicket
     */
    public function setPnr($pnr) {
        $this->pnr = $pnr;

        return $this;
    }

    /**
     * Get pnr
     *
     * @return string 
     */
    public function getPnr() {
        return $this->pnr;
    }

    /**
     * Set ticketNo
     *
     * @param string $ticketNo
     * @return FlightTicket
     */
    public function setTicketNo($ticketNo) {
        $this->ticketNo = $ticketNo;

        return $this;
    }

    /**
     * Get ticketNo
     *
     * @return string 
     */
    public function getTicketNo() {
        return $this->ticketNo;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return FlightTicket
     */
    public function setStatus($status) {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus() {
        return $this->status;
    }

    /**
     * Set amount
     *
     * @param string $amount
     * @return FlightTicket
     */
    public function setAmount($amount) {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return string 
     */
    public function getAmount() {
        return $this->amount;
    }

    /**
     * Set agentCommission
     *
     * @param string $agentCommission
     * @return FlightTicket
     */
    public function setAgentCommission($agentCommission) {
        $this->agentCommission = $agentCommission;

        return $this;
    }

    /**
     * Get agentCommission
     *
     * @return string 
     */
    public function getAgentCommission() {
        return $this->agentCommission;
    }

    /**
     * Set entryDate
     *
     * @param \DateTime $entryDate
     * @return FlightTicket
     */
    public function setEntryDate($entryDate) {
        $this->entryDate = $entryDate;

        return $this;
    }

    /**
     * Get entryDate
     *
     * @return \DateTime 
     */
    public function getEntryDate() {
        return $this->entryDate;
    }

    /**
     * Set balance
     *
     * @param string $balance
     * @return FlightTicket
     */
    public function setBalance($balance) {
        $this->balance = $balance;

        return $this;
    }

    /**
     * Get balance
     *
     * @return string 
     */
    public function getBalance() {
        return $this->balance;
    }

    /**
     * Set agent
     *
     * @param \AppBundle\Entity\Agent $agent
     * @return FlightTicket
     */
    public function setAgent(\AppBundle\Entity\Agent $agent)
    {
        $this->agent = $agent;

        return $this;
    }

    /**
     * Get agent
     *
     * @return \AppBundle\Entity\Agent 
     */
    public function getAgent()
    {
        return $this->agent;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     * @return FlightTicket
     */
    public function setUser(\AppBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

}
