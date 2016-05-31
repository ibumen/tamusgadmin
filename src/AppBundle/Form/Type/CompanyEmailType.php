<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Form\Type;

/**
 * Description of EmailType
 *
 * @author contactenesi
 */
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompanyEmailType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add("email", "email", array("label" => " ", "attr" => array("placeholder" => "Email Address")));
        
    }

    public function getName() {
        return "companyemailfrm";
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            "data_class" => "AppBundle\Entity\CompanyEmail",
            "attr" => array("id" => "emailfrm")
        ));
    }

}
