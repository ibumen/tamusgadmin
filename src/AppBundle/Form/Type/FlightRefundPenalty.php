<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Form\Type;

/**
 * Description of FlightRefundPenalty
 *
 * @author contactenesi 
 */
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class FlightRefundPenalty extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $data = $builder->getData();
        $builder->add("amount", "money", array("mapped" => false,"currency" => "NGN", "grouping" => true, "label" => "Refund Charges", "attr" => array("placeholder" => "Enter Refund Charges")))
                ->add('Refund', 'submit', array('label' => 'Refund Ticket')
        );
    }

    public function getName() {
        return "ticketrefundfrm";
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            "data_class" => "AppBundle\Entity\FlightTicket",
            "attr" => array("id" => "ticketrefundfrm")
        ));
    }

}
