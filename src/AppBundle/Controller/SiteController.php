<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;

/**
 * Description of Site
 *
 * @author contactenesi
 */
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Form\Type\SiteContentType;
use AppBundle\Form\Type\PartnerType;
use AppBundle\Entity\Partner;
use AppBundle\Form\Type\ClientType;
use AppBundle\Entity\Client;

class SiteController extends Controller {

    /**
     * @Route("/site/modify/{page}", name="modifysite")
     */
    public function modifyAction(Request $request, $page) {
        $opt = array();
        $em = $this->getDoctrine()->getManager();
        $pg = "";

        switch ($page) {
            case "services": {
                    $pg = "our_services";
                    break;
                }
            case "clients"; {
                    $pg = "our_clients";
                    break;
                }
            case "partners"; {
                    $pg = "our_partners";
                    break;
                }
            case "about": {
                    $pg = "about_us";
                    break;
                }
        }

        $siteContent = $em->getRepository("AppBundle:SiteContent")->findOneByContentName($pg);
        if ($siteContent == NULL) {
            return $this->redirectToRoute("homepage");
        } else {
            $content = $siteContent->getContentValue();
        }
        $opt["sitecontent"] = $content;
        $opt["pagetitle"] = ucwords(str_replace("_", " ", $pg));
        $opt["page"] = $page;


        $form = $this->createForm(new SiteContentType(), $siteContent, array('action' => $this->generateUrl('savecontent', array("id" => $siteContent->getContentId()))));

        $opt["form"] = $form->createView();


        if ($page == "partners" || $page == "clients") {
            if ($page == "partners") {
                $partner = new Partner();
                $addpartnerform = $this->createForm(new PartnerType(), $partner);
                $opt["addpartnerform"] = $addpartnerform->createView();
                $ent = "Partner";
            } else if ($page == "clients") {
                $client = new Client();
                $addclientform = $this->createForm(new ClientType(), $client);
                $opt["addclientform"] = $addclientform->createView();
                $ent = "Client";
            }
            $list = $em->getRepository("AppBundle:$ent")->findAll();
            if ($list != NULL) {
                $opt["contentlist"] = $list;
            }
        }

        return $this->render('site/modify_page_content.html.twig', $opt);
    }

    /**
     * @Route("/site/ajaxreloadlist", name="ajaxreloadlist")
     */
    public function ajaxReloadListAction(Request $request) {
        $ent = "";
        if ($request->get("item") == "client") {
            $ent = "Client";
        } else {
            $ent = "Partner";
        }
        $em = $this->getDoctrine()->getManager()->getRepository("AppBundle:$ent");
        $recs = $em->findAll();
        return $this->render('site/'.$request->get("item").'recordlist.html.twig', array("contentlist" => $recs));
    }

    /**
     * @Route("/site/ajaxremoveitem", name="ajaxremoveitem")
     */
    public function ajaxRemoveItemAction(Request $request) {
        $ent = "";
        if ($request->get("itemtype") == "client") {
            $ent = "Client";
        } else {
            $ent = "Partner";
        }
        $id = $request->get("itemid");
        $em = $this->getDoctrine()->getManager();
        $rep = $em->getRepository("AppBundle:$ent");
        $item = $rep->find($id);
        if ($item != Null) {
            $em->remove($item);
            $em->flush();
        }
        $recs = $rep->findAll();
        return $this->render('site/'.$request->get("itemtype").'recordlist.html.twig', array("contentlist" => $recs));
    }

    /**
     * @Route("/site/savecontent/{id}", name="savecontent")
     */
    public function saveContentAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();
        $rep = $em->getRepository("AppBundle:SiteContent");
        $siteContent = $rep->find($id);
        $form = $this->createForm(new SiteContentType(), $siteContent);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em->flush();
        }
        $pg = "";
        $pgtitle = $siteContent->getContentName();
        switch ($pgtitle) {
            case "our_services": {
                    $pg = "services";
                    break;
                }
            case "our_clients"; {
                    $pg = "clients";
                    break;
                }
            case "our_partners"; {
                    $pg = "partners";
                    break;
                }
            case "about_us": {
                    $pg = "about";
                    break;
                }
        }

        return $this->redirectToRoute("modifysite", array("page" => $pg));
    }

    /**
     * @Route("/site/addpartner", name="addpartner")
     */
    public function addPartnerAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $partner = new Partner();
        $form = $this->createForm(new PartnerType(), $partner);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em->persist($partner);
            $em->flush();
            return new Response("1");
        }
        return new Response("0");
    }

    /**
     * @Route("/site/addclient", name="addclient")
     */
    public function addClientAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $client = new Client();
        $form = $this->createForm(new ClientType(), $client);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em->persist($client);
            $em->flush();
            return new Response("1");
        }
        return new Response("0");
    }

}
