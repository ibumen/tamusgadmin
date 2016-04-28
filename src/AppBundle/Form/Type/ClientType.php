<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Form\Type;

/**
 * Description of ClientType
 *
 * @author contactenesi
 */
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options ){
        $builder->add("clientName","text", array("label"=>"Client Name", "attr"=>array("placeholder"=>"Name of client")))
                ->add("clientSite","text", array("label"=>"Website", "required"=> false, "attr"=>array("placeholder"=>"website if any")))
                ->add("startofrelation","date", array('format' => 'yyyy-MM-dd', 'widget' => 'single_text', "required"=> false, "label"=>"Client Since", "attr"=>array("placeholder"=>"Date of start of relation")))
                ->add("Add", "submit");
    }
    public function getName(){
        return "clientfrm";
    }
    
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            "data_class"=>"AppBundle\Entity\Client",
            "attr"=>array("id"=>"clientfrm")
            ));
    }
}
