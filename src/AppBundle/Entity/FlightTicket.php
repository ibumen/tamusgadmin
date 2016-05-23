<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

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

    private $E_STATUS = array("not_paid", "part_paid", "paid", "refunded");

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="ticketid", type="integer", nullable=false)
     */
    private $ticketId;

    /**
     * @ORM\Column(name="pnr", type="string", length=6)
     * @Assert\Type(
     *     type="string",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     * @Assert\NotNull(
     *      message="Ticket Number must not be blank"
     * )
     * @Assert\NotBlank(
     *      message="Ticket Number must not be blank"
     * )
     */
    private $pnr;

    /**
     * @ORM\Column(name="ticketno", type="string", length=15, unique=true)
     * @Assert\Type(
     *     type="string",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     * @Assert\NotNull(
     *      message="Ticket Number must not be blank"
     * )
     * @Assert\NotBlank(
     *      message="Ticket Number must not be blank"
     * )
     */
    private $ticketNo;

    /**
     * @ORM\Column(name="status", type="string", length=10, options={"default":"not_paid"})
     */
    private $status;

    /**
     * @ORM\Column(name="ticket_cost", type="decimal", precision=11, scale=4)
     * @Assert\Type(
     *     type="numeric",
     *     message="The value {{ value }} is not a valid number."
     * )
     * @Assert\Regex(
     *     pattern="/^[+]?\d*\.?\d*$/",
     *     message="The value is not a valid numeric value"
     * )
     * @Assert\NotNull(
     *      message="Cost of ticket must not be blank"
     * )
     * @Assert\NotBlank(
     *      message="Cost of ticket Number must not be blank"
     * )
     */
    private $ticketCost;

    /**
     * @ORM\Column(name="fare", type="decimal", precision=11, scale=4)
     * @Assert\Type(
     *     type="numeric",
     *     message="The value {{ value }} is not a valid number."
     * )
     * @Assert\Regex(
     *     pattern="/^[+]?\d*\.?\d*$/",
     *     message="The value is not a valid numeric value"
     * )
     * @Assert\NotNull(
     *      message="Fare must not be blank"
     * )
     * @Assert\NotBlank(
     *      message="Fare Number must not be blank"
     * )
     */
    private $fare;

    /**
     * @ORM\Column(name="commission", type="decimal", precision=5, scale=2, options={"default":0})
     * @Assert\Type(
     *     type="numeric",
     *     message="The value {{ value }} is not a valid number."
     * )
     * @Assert\Regex(
     *     pattern="/^[+]?\d*\.?\d*$/",
     *     message="The value is not a valid numeric value"
     * )
     * @Assert\Range(
     *      min = 0,
     *      max = 100,
     *      minMessage = "A minimum of {{ limit }}% is accepted",
     *      maxMessage = "A maximum of {{ limit }}% is accepted"
     * )
     */
    private $commission;

    /**
     * @ORM\Column(name="witholding_tax", type="decimal", precision=5, scale=2, options={"default":0})
     * @Assert\Type(
     *     type="numeric",
     *     message="The value {{ value }} is not a valid number."
     * )
     * @Assert\Regex(
     *     pattern="/^[+]?\d*\.?\d*$/",
     *     message="The value is not a valid numeric value"
     * )
     * @Assert\Range(
     *      min = 0,
     *      max = 100,
     *      minMessage = "A minimum of {{ limit }}% is accepted",
     *      maxMessage = "A maximum of {{ limit }}% is accepted"
     * )
     */
    private $witholdingTax;

    /**
     * @ORM\Column(name="leadway_fee", type="decimal", precision=11, scale=4)
     * @Assert\Type(
     *     type="numeric",
     *     message="The value {{ value }} is not a valid number."
     * )
     * @Assert\Regex(
     *     pattern="/^[+]?\d*\.?\d*$/",
     *     message="The value is not a valid numeric value"
     * )
     */
    private $leadwayFee;

    /**
     * @ORM\Column(name="service_charge", type="decimal", precision=11, scale=4, options={"default":0})
     * @Assert\Type(
     *     type="numeric",
     *     message="The value {{ value }} is not a valid number."
     * )
     * @Assert\Regex(
     *     pattern="/^[+]?\d*\.?\d*$/",
     *     message="The value is not a valid numeric value"
     * )
     */
    private $serviceCharge;

    /**
     * @ORM\Column(name="refund_charge", type="decimal", precision=11, scale=4, options={"default":0})
     * @Assert\Type(
     *     type="numeric",
     *     message="The value {{ value }} is not a valid number."
     * )
     * @Assert\Regex(
     *     pattern="/^[+]?\d*\.?\d*$/",
     *     message="The value is not a valid numeric value"
     * )
     */
    private $refundCharge;

    /**
     * @ORM\Column(name="entry_date", type="datetime")
     */
    private $entryDate;

    /**
     * @ORM\ManyToOne(targetEntity="Agent")
     * @ORM\JoinColumn(name="agentid", referencedColumnName="agentid", nullable=true)
     * @Assert\Type(
     *     type="object",
     *     message="Select a valid agent"
     * )
     */
    private $agent;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="userid", referencedColumnName="userid", nullable=false)
     * @Assert\Type(
     *     type="object",
     *     message="No attendant selected."
     * )
     */
    private $user;

    public function __construct() {
        $this->status = "not_paid";
        $this->entryDate = new \DateTime();
        $this->amountPaid = 0;
        $this->witholdingTax = 0;
        $this->commission = 0;
        $this->serviceCharge = 0;
        $this->refundCharge = 0;
    }

    /**
     * @ORM\Column(name="amount_paid", type="decimal", precision=11, scale=4, options={"default":0})
     * @Assert\Type(
     *     type="numeric",
     *     message="The value {{ value }} is not a valid number."
     * )
     * @Assert\Regex(
     *     pattern="/^[+]?\d*\.?\d*$/",
     *     message="The value {{ value }} is not a valid numeric value"
     * )
     */
    private $amountPaid;

    /**
     * @Assert\Callback
     */
    public function validate(ExecutionContextInterface $context) {
        if ($this->fare > $this->ticketCost) {
            $context->buildViolation('Fare must not be greater than Cost of Ticket')
                    ->atPath('fare')
                    ->addViolation();
        }
        if ($this->witholdingTax > 50) {
            $context->buildViolation('Too much value allocated for the witholding task')
                    ->atPath('witholdingTax')
                    ->addViolation();
        }
        if ($this->amountPaid > $this->getAmountDue()) {
            $context->buildViolation('Excess payment made (' . $this->getAmountDue() . '/' . $this->amountPaid)
                    ->atPath('amountPaid')
                    ->addViolation();
        }
        if ($this->amountPaid < 0) {
            $context->buildViolation('Invalid value (' . $this->amountPaid . ') specified for amount paid')
                    ->atPath('amountPaid')
                    ->addViolation();
        }
    }

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
        if (in_array($status, $this->E_STATUS)) {
            $this->status = $status;
            return $this;
        } else {
            throw new Exception("Invalid Ticket Status.");
        }
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
     * Set agent
     *
     * @param \AppBundle\Entity\Agent $agent
     * @return FlightTicket
     */
    public function setAgent(\AppBundle\Entity\Agent $agent) {
        $this->agent = $agent;

        return $this;
    }

    /**
     * Get agent
     *
     * @return \AppBundle\Entity\Agent 
     */
    public function getAgent() {
        return $this->agent;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     * @return FlightTicket
     */
    public function setUser(\AppBundle\Entity\User $user) {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User 
     */
    public function getUser() {
        return $this->user;
    }

    /**
     * Set fare
     *
     * @param string $fare
     * @return FlightTicket
     */
    public function setFare($fare) {
        $this->fare = $fare;
        return $this;
    }

    /**
     * Get fare
     *
     * @return string 
     */
    public function getFare() {
        return $this->fare;
    }

    /**
     * Set commission
     *
     * @param string $commission
     * @return FlightTicket
     */
    public function setCommission($commission) {
        $this->commission = $commission;
        return $this;
    }

    /**
     * Get commission
     *
     * @return string 
     */
    public function getCommission() {
        return $this->commission;
    }

    /**
     * Set witholdingTax
     *
     * @param string $witholdingTax
     * @return FlightTicket
     */
    public function setWitholdingTax($witholdingTax) {
        $this->witholdingTax = $witholdingTax;
        return $this;
    }

    /**
     * Get witholdingTax
     *
     * @return string 
     */
    public function getWitholdingTax() {
        return $this->witholdingTax;
    }

    /**
     * Set leadwayFee
     *
     * @param string $leadwayFee
     * @return FlightTicket
     */
    public function setLeadwayFee($leadwayFee) {
        $this->leadwayFee = $leadwayFee;
        return $this;
    }

    /**
     * Get leadwayFee
     *
     * @return string 
     */
    public function getLeadwayFee() {
        return $this->leadwayFee;
    }

    /**
     * Set amountPaid
     *
     * @param string $amountPaid
     * @return FlightTicket
     */
    public function setAmountPaid($amountPaid) {

        if ($this->status == "refunded") {
            return $this;
        }
        $status = "not_paid";
        $this->amountPaid += $amountPaid;
        if ($this->amountPaid == 0) {
            $status = "not_paid";
        } else
        if ($this->getAmountDue() > $this->getAmountPaid()) {
            $status = "part_paid";
        } else {
            $status = "paid";
        }
        $this->setStatus($status);

        return $this;
    }

    /**
     * Get amountPaid
     *
     * @return string 
     */
    public function getAmountPaid() {
        return $this->amountPaid;
    }

    /**
     * Set serviceCharge
     *
     * @param string $serviceCharge
     * @return FlightTicket
     */
    public function setServiceCharge($serviceCharge) {
        $this->serviceCharge = $serviceCharge;
        return $this;
    }

    /**
     * Get serviceCharge
     *
     * @return string 
     */
    public function getServiceCharge() {
        return $this->serviceCharge;
    }

    public function getAmountDue() {
        $ticketcost = $this->getTicketCost();
        $serviceCharge = $this->getServiceCharge();
        return(($serviceCharge + $ticketcost));
    }

    public function getTaxDeduction() {

        $fare = $this->getFare();
        $commission = (($this->commission / 100) * $fare);

        return ($commission - ((($this->witholdingTax / 100) * $commission) + $this->leadwayFee));
    }

    public function getAmountTaxDiff() {

        $ticketcost = $this->getTicketCost();
        $serviceCharge = $this->getServiceCharge();
        $tx = ($this->getTaxDeduction()<$this->getLeadwayFee())?($this->leadwayFee):($this->getTaxDeduction());
        return ($serviceCharge + $ticketcost - $tx);
    }

    /**
     * Set ticketCost
     *
     * @param string $ticketCost
     * @return FlightTicket
     */
    public function setTicketCost($ticketCost) {
        $this->ticketCost = $ticketCost;
        return $this;
    }

    /**
     * Get ticketCost
     *
     * @return string 
     */
    public function getTicketCost() {
        return $this->ticketCost;
    }

    /**
     * Set refundCharge
     *
     * @param string $refundCharge
     * @return FlightTicket
     */
    public function setRefundCharge($refundCharge) {
        $this->refundCharge = $refundCharge;
        $this->setStatus("refunded");

        return $this;
    }

    /**
     * Get refundCharge
     *
     * @return string 
     */
    public function getRefundCharge() {
        return $this->refundCharge;
    }

}
