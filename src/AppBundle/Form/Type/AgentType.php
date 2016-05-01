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

class AgentType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add("firstName", "text", array("label" => "First Name", "attr" => array("placeholder" => "First Name")))
                ->add("lastName", "text", array("label" => "Last Name", "attr" => array("placeholder" => "Last Name")))
                ->add("otherName", "text", array("label" => "Othername", "required"=>false, "attr" => array("placeholder" => "Other Name")))
                ->add("email", "email", array("label" => "Email Address", "required"=>false, "attr" => array("placeholder" => "Email Address")))
                ->add("mobile", "text", array("label" => "Mobile No.", "required"=>false, "attr" => array("placeholder" => "Mobile No.")))
                ->add("regNo", "hidden")
                ->add("Register", "submit");
    }

    public function getName() {
        return "agentfrm";
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            "data_class" => "AppBundle\Entity\Agent",
            "attr" => array("id" => "agentfrm")
        ));
    }

}
