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
                ->add("ticketNo", "text", array("label" => "Ticket No.", "attr" => array("placeholder" => "Unique Ticket Number")))
                ->add("ticket_cost", "money", array("currency"=>"NGN", "grouping"=>true, "label" => "Cost of Ticket", "attr" => array("placeholder" => "Cost of Ticket")))
                ->add("fare", "money", array("currency"=>"NGN", "grouping"=>true, "label" => "Ticket Fare", "attr" => array("placeholder" => "Ticket Fare")))
                ->add("agent", "entity", array('placeholder'=>'Direct Customer', 'required'=>false, 'class' => 'AppBundle:Agent', "choice_label"=>function($agent){ return "[".$agent->getRegNo()."] ".$agent->getAgentFullName("S,f o");}))
                ->add("commission", "percent", array("scale"=>2, "type"=>"integer", 'required'=>false, "empty_data"=>0, "label" => "Commission", "attr" => array("placeholder" => "Commission")))
                ->add("witholdingTax", "percent", array("scale"=>2, "type"=>"integer", 'required'=>false, "empty_data"=>0, "label" => "Witholding Tax", "attr" => array("placeholder" => "Witholding Tax")))
                ->add("leadwayFee", "money", array("currency"=>"NGN", "grouping"=>true, "data"=>1200, "label" => "Leadway Fee", "attr" => array("placeholder" => "Leadway Fee", "readonly"=>TRUE)))
                ->add("serviceCharge", "money", array("currency"=>"NGN", "grouping"=>true, 'required'=>false, "empty_data"=>0, "label" => "Service Charge", "attr" => array("placeholder" => "Service Charge")))
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
