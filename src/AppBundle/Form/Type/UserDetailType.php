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

class UserDetailType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add("firstName", "text", array("label" => "First Name", "attr" => array("placeholder" => "First Name")))
                ->add("lastName", "text", array("label" => "Last Name", "attr" => array("placeholder" => "Last Name")))
                ->add("otherName", "text", array("label" => "Other Name", "required"=>false, "attr" => array("placeholder" => "Other Name")));
    }

    public function getName() {
        return "userdetailfrm";
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            "data_class" => "AppBundle\Entity\UserDetail",
            "attr" => array("id" => "userdetailfrm")
        ));
    }

}
