<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Description of Message
 *
 * @author contactenesi
 */

/**
 * @ORM\Entity
 * @ORM\Table(name="message")
 */
class Message {
    /* Constants for status */

    private $STATUS = array("read", "unread", "replied");

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="messageid", type="integer", nullable=false)
     */
    private $messageId;

    /**
     * @ORM\Column(name="messagebody", type="string", length=1000) 
     */
    private $messageBody;

    /**
     * @ORM\Column(name="sendername", type="string", length=100)
     */
    private $senderName;

    /**
     * @ORM\Column(name="senderemail", type="string", length=100)
     */
    private $senderEmail;

    /**
     * @ORM\Column(name="senderno", type="string", length=20, nullable=true)
     */
    private $senderNo;

    /**
     * @ORM\Column(name="status", type="string", length=10, options={"default":"unread"})
     */
    private $messageStatus;


    /**
     * Get messageId
     *
     * @return integer 
     */
    public function getMessageId()
    {
        return $this->messageId;
    }

    /**
     * Set messageBody
     *
     * @param string $messageBody
     * @return Message
     */
    public function setMessageBody($messageBody)
    {
        $this->messageBody = $messageBody;

        return $this;
    }

    /**
     * Get messageBody
     *
     * @return string 
     */
    public function getMessageBody()
    {
        return $this->messageBody;
    }

    /**
     * Set senderName
     *
     * @param string $senderName
     * @return Message
     */
    public function setSenderName($senderName)
    {
        $this->senderName = $senderName;

        return $this;
    }

    /**
     * Get senderName
     *
     * @return string 
     */
    public function getSenderName()
    {
        return $this->senderName;
    }

    /**
     * Set senderEmail
     *
     * @param string $senderEmail
     * @return Message
     */
    public function setSenderEmail($senderEmail)
    {
        $this->senderEmail = $senderEmail;

        return $this;
    }

    /**
     * Get senderEmail
     *
     * @return string 
     */
    public function getSenderEmail()
    {
        return $this->senderEmail;
    }

    /**
     * Set messageStatus
     *
     * @param string $messageStatus
     * @return Message
     */
    public function setMessageStatus($messageStatus)
    {
        $this->messageStatus = $messageStatus;

        return $this;
    }

    /**
     * Get messageStatus
     *
     * @return string 
     */
    public function getMessageStatus()
    {
        return $this->messageStatus;
    }

    /**
     * Set senderNo
     *
     * @param string $senderNo
     * @return Message
     */
    public function setSenderNo($senderNo)
    {
        $this->senderNo = $senderNo;

        return $this;
    }

    /**
     * Get senderNo
     *
     * @return string 
     */
    public function getSenderNo()
    {
        return $this->senderNo;
    }
}
