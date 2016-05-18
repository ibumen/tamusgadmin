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

class PwdChngFrm extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add("oldpwd", "password", array("label" => "Old Password", "mapped"=>false, "attr" => array("placeholder" => "Old Password")))
                ->add("password", "password", array("label"=> "New Password", "attr"=> array("placeholder"=>"New Password")))
                ->add("Submit", "submit");
        
    }

    public function getName() {
        return "chngpwdfrm";
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            "data_class" => "AppBundle\Entity\User",
            "attr" => array("id" => "chngpwdfrm")
        ));
    }

}
