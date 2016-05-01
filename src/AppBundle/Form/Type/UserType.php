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
use AppBundle\Form\Type\UserDetailType;

class UserType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add("username", "text", array("label" => "Username", "attr" => array("placeholder" => "Username")))
                ->add("userDetail",new UserDetailType(), array("label"=>" "))
                ->add("Submit", "submit");
        
    }

    public function getName() {
        return "userfrm";
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            "data_class" => "AppBundle\Entity\User",
            "attr" => array("id" => "userfrm")
        ));
    }

}
