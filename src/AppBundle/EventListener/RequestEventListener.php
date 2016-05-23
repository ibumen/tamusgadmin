<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\EventListener;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpFoundation\RedirectResponse;
/**
 * Description of RequestEventListener
 *
 * @author contactenesi
 */
class RequestEventListener {
    private $router;
    private $container;
     public function __construct(\Symfony\Bundle\FrameworkBundle\Routing\Router $router, $container)
    {
        $this->router = $router;
        $this->container = $container;
    }  
    public function onKernelRequest(GetResponseEvent $event) {

        //$user = $event->getRequest()->getUser();
        $token = $this->container->get('security.token_storage')->getToken();
        if(!$token){
            return;
        }
        $user = $token->getUser();
         if (!$user || is_string($user)) {
            return;
        }
       
        if ($user->getUserDetail()->getStatus() == "not_ready") {
            
            $route = 'changeuserpassword';

            if ($route === $event->getRequest()->get('_route')) {
                return;
            }
            $url = $this->router->generate($route);
            $response = new RedirectResponse($url);
            $event->setResponse($response);
        }
    }

}
