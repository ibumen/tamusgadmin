<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Form\Type;

/**
 * Description of CompanyPhoneType
 *
 * @author contactenesi
 */
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompanyPhoneType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add("phoneNo", "text", array("label" => " ", "attr" => array("placeholder" => "Phone Number")))
            ->add("callFrom", "time", array("label" => "Available From", "attr" => array("placeholder" => "Time")))
            ->add("callTo", "time", array("label" => "Available To", "attr" => array("placeholder" => "Time")));
        
    }

    public function getName() {
        return "companyphonefrm";
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            "data_class" => "AppBundle\Entity\CompanyPhone",
            "attr" => array("id" => "phonefrm")
        ));
    }

}
