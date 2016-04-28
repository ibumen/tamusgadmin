<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Form\Type;

/**
 * Description of SiteContentType
 *
 * @author contactenesi
 */
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SiteContentType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options ){
        $builder->add("contentValue","textarea", array("label"=>"Modify Content Value:", "attr"=>array("placeholder"=>"Enter Content")))
                ->add("Update", "submit");
    }
    public function getName(){
        return "contentfrm";
    }
    
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            "data_class"=>"AppBundle\Entity\SiteContent",
            "attr"=>array("id"=>"contentfrm")
            ));
    }
}
