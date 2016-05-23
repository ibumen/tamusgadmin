<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\EventListener;

use AppBundle\Controller\UserValidationController;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use AppBundle\Controller\AccountController;

/**
 * Description of TamusgenRequestListener
 *
 * @author contactenesi
 */
class TamusgenRequestListener {

    public function onKernelController(FilterControllerEvent $event) {
        $controller = $event->getController();
        //var_dump($controller); exit();
        $controller = $controller[0];

        if ($controller instanceof UserValidationController) {
            //var_dump($controller); exit();
            $user = $controller->getUser();
            if ($user) {
                $userstatus = $user->getUserDetail()->getStatus();
                if ($userstatus != "not_ready") {
                    //$event->setController(array(new AccountController(), "ChngUserPwdAction"));
                    
                }
            }
        }
    }

}
