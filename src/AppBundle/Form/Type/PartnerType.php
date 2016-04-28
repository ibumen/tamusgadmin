<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Form\Type;

/**
 * Description of PartnerType
 *
 * @author contactenesi
 */
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PartnerType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options ){
        $builder->add("partnerName","text", array("label"=>"Partner Name", "attr"=>array("placeholder"=>"Name of partner")))
                ->add("partnerSite","text", array("label"=>"Website", "required"=> false, "attr"=>array("placeholder"=>"website if any")))
                ->add("startofrelation","date", array('format' => 'yyyy-MM-dd', 'widget' => 'single_text', "required"=> false, "label"=>"Partner Since", "attr"=>array("placeholder"=>"Date of start of relation")))
                ->add("Add", "submit");
    }
    public function getName(){
        return "partnerfrm";
    }
    
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            "data_class"=>"AppBundle\Entity\Partner",
            "attr"=>array("id"=>"partnerfrm")
            ));
    }
}
