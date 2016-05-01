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
        $formsuccess = false;
        $em = $this->getDoctrine()->getManager();
        $rep = $em->getRepository("AppBundle:User");
        $flightticket = new FlightTicket();
        $form = $this->createForm(new FlightTicketType(), $flightticket);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $amt = $flightticket->getAmount();
            $perc = $form->get("agentcomm")->getData();
            $flightticket->setAgentCommission((($perc / 100) * $amt));
            $flightticket->setUser($rep->find(1));
            $flightticket->setBalance($flightticket->getAmount() - $flightticket->getAgentCommission());
            $flightticket->setEntryDate(new \DateTime());
            $flightticket->setUser($this->getUser());
            $em->persist($flightticket);
            $em->flush();
            $form = $this->createForm(new FlightTicketType(), new FlightTicket());
            $formsuccess = true;
        }
        return $this->render("sales/flightticket/addticket.html.twig", array("pagetitle" => "Add New Ticket Sale", "formsuccess" => $formsuccess, "addticketform" => $form->createView()));
    }

    /**
     * @Route("/sales/flight/ticket/remove/{id}", name="removeflightticket")
     */
    public function removeTicketSaleController(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();
        $rep = $em->getRepository("AppBundle:FlightTicket");
        $ticket = $rep->find($id);
        if($ticket != NULL){
        $em->remove($ticket);
        $em->flush();
        }
        return $this->redirectToRoute("listflightticket");
    }

    /**
     * @Route("/sales/flight/ticket/list", name="listflightticket")
     */
    public function listTicketSaleController(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $rep = $em->getRepository("AppBundle:FlightTicket");
        $tickets = $rep->findAll();
        return $this->render("sales/flightticket/ticketlist.html.twig", array("tickets" => $tickets, "pagetitle" => "List of Flight Tickets Sold."));
    }

    /**
     * @Route("/sales/flight/ticket/modify", name="modifyflightticket")
     */
    public function modifyTicketSaleController(Request $request) {
        
    }

}
