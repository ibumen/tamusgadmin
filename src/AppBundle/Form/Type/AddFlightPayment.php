<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Form\Type;

/**
 * Description of AddFlightPayment
 *
 * @author contactenesi 
 */
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class AddFlightPayment extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $data = $builder->getData();
        $builder->add("amount", "money", array("mapped" => false, "data" => ($data->getAmountDue() - $data->getAmountPaid()), "currency" => "NGN", "grouping" => true, "label" => "Payment", "attr" => array("placeholder" => "Enter Payment")))
                ->add('Add', 'submit', array('label' => 'Add Payment'))
                ->add('Cancel', 'submit', array('label' => 'Cancel'))
                ->addEventListener(FormEvents::PRE_SUBMIT, function (FormEvent $event) {
                    $form = $event->getForm();
                    $amt = $form->get("amount")->getData();
                    $amt = str_replace(",", "", $amt);
                    $form->get("amount")->setData($amt);
                }
        );
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
