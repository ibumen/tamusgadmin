<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;

/**
 * Description of SalesController
 *
 * @author contactenesi
 */
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\FlightTicket;
use AppBundle\Form\Type\FlightTicketType;

class SalesController extends Controller {

    /**
     * @Route("/sales/flight/ticket/add", name="addflightticket")
     */
    public function addTicketSaleController(Request $request) {
        $flightticket = new FlightTicket();
        $form = $this->createForm(new FlightTicketType(), $flightticket);
        $form->handleRequest($request);
        return $this->render("sales/flightticket/addticket.html.twig", array("pagetitle"=>"Add New Ticket Sale", "addticketform"=>$form->createView()));
    }

    /**
     * @Route("/sales/flight/ticket/list", name="listflightticket")
     */
    public function listTicketSaleController(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $rep = $em->getRepository("AppBundle:FlightTicket");
        $tickets = $rep->findAll();
        return $this->render("sales/flightticket/ticketlist.html.twig", array("tickets"=>$tickets, "pagetitle"=>"List of Flight Tickets Sold."));
    }

    /**
     * @Route("/sales/flight/ticket/modify", name="modifyflightticket")
     */
    public function modifyTicketSaleController(Request $request) {
        
    }

    /**
     * @Route("/sales/flight/ticket/delete", name="deleteflightticket")
     */
    public function deleteTicketSaleController(Request $request) {
        
    }

}
