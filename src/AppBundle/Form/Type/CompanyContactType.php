<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Form\Type;

/**
 * Description of CompanyContactType
 *
 * @author contactenesi
 */
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Form\Type\CompanyPhoneType;
use AppBundle\Form\Type\CompanyEmailType;

class CompanyContactType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add("address", "textarea", array("label" => "Office Address", "attr" => array("placeholder" => "Office Address")))
                ->add("state", "entity", array("class" => "AppBundle:State", "choice_label" => function($state) {
                        return $state->getStatename();
                    }))
                ->add("emails", "collection", array("type" => new CompanyEmailType(), "allow_add" => true, "by_reference"=>false))
                ->add("add_email", "button", array("label" => "Add Email"))
                ->add("phones", "collection", array("type" => new CompanyPhoneType(), "allow_add" => true, "by_reference"=>false))
                ->add("add_phone", "button", array("label" => "Add Phone"))
                ->add("Submit", "submit");
    }

    public function getName() {
        return "companycontactfrm";
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            "data_class" => "AppBundle\Entity\CompanyContact",
            "attr" => array("id" => "contactfrm")
        ));
    }

}
