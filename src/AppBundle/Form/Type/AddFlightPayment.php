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
use Symfony\Component\Form\CallbackTransformer;

class AddFlightPayment extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $data = $builder->getData();
        $builder->add("amountPaid", "money", array("data"=>  ($data->getAmountDue()- $data->getAmountPaid()), "currency" => "NGN", "grouping" => true, "label" => "Payment", "attr" => array("placeholder" => "Enter Payment")))
                ->add('Add', 'submit', array('label' => 'Add Payment'))
                ->add('Remove', 'submit', array('label' => 'Remove Payment'))
                ->add('Cancel', 'submit', array('label' => 'Cancel'));
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
