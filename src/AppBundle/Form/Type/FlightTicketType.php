<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Form\Type;

/**
 * Description of FlightTicketType
 *
 * @author contactenesi
 */
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FlightTicketType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add("pnr", "text", array("label" => "PNR", "attr" => array("placeholder" => "Passenger Name Record")))
                ->add("ticketNo", "text", array("label" => "Ticket No.", "attr" => array("placeholder" => "Ticket Number")))
                ->add("status", "hidden", array("data" => "ok"))
                ->add("amount", "number", array("label" => "Cost of Ticket", "attr" => array("placeholder" => "Cost of Ticket")))
                ->add("agentcomm", "percent", array("scale"=>2, "type"=>"integer", "empty_data"=>0, "mapped"=>false, "label" => "Agent Commission", "attr" => array("placeholder" => "Agent Commission")))
                ->add("agent", "entity", array('placeholder'=>'Choose an option','class' => 'AppBundle:Agent', "choice_label"=>function($agent){ return "[".$agent->getRegNo()."] ".$agent->getAgentFullName("S,f o");}))
                ->add("Submit", "submit");
    }

    public function getName() {
        return "ticketfrm";
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            "data_class" => "AppBundle\Entity\FlightTicket",
            "attr" => array("id" => "ticketfrm")
        ));
    }

}
