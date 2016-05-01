<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Agent;
use AppBundle\Form\Type\AgentType;
use AppBundle\Entity\User;
use AppBundle\Form\Type\UserType;
use AppBundle\Entity\UserDetail;
use AppBundle\Form\Type\UserDetailType;

class AccountController extends Controller {

    /**
     * @Route("/account/login", name="login")
     */
    public function loginAction(Request $request) {
        // replace this example code with whatever you need
        $authenticationUtils = $this->get('security.authentication_utils');

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        if (!$this->getUser()) {
            return $this->render('account/login.html.twig', array(
                        // last username entered by the user
                        'last_username' => $lastUsername,
                        'error' => $error,
            ));
        } else {
            return $this->redirectToRoute("homepage");
        }
    }

    /**
     * @Route("/account/login_check", name="logincheck")
     */
    public function loginCheckAction(Request $request) {
        $this->redirectToRoute("login");
    }

    /**
     * @Route("/account/logout", name="logout")
     */
    public function logoutAction(Request $request) {
    }

    /**
     * @Route("/account/user/create", name="createuser")
     */
    public function createAction(Request $request) {
        // replace this example code with whatever you need
        $formsuccess = false;
        $user = new User();
        $userdetail = new UserDetail();
        $form = $this->createForm(new UserType(), $user);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $userdetail = $form->get("userDetail")->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $userdetail->setUser($user);
            $em->persist($userdetail);
            $em->flush();
            $formsuccess = true;
            $form = $this->createForm(new UserType(), new User());
        }
        return $this->render('account/user/create.html.twig', array("pagetitle" => "Create New User", "adduserform" => $form->createView(), "formsuccess" => $formsuccess));
    }

    /**
     * @Route("/account/agent/create", name="createagent")
     */
    public function createAgentAction(Request $request) {
        // replace this example code with whatever you need
        $formsuccess = false;
        $agent = new Agent();
        $form = $this->createForm(new AgentType(), $agent);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $query = $em->createQuery('SELECT a FROM AppBundle:Agent a  ORDER BY a.regNo DESC');
            $dbagent = $query->setMaxResults(1)->getOneOrNullResult();
            if ($dbagent == null) {
                $agent->setRegNo("AG001");
            } else {
                $rg = $dbagent->getRegNo();
                $sn = substr($rg, 2);
                $sn = $sn + 1;
                if ($sn < 10) {
                    $sn = "00" . $sn;
                } else if ($sn < 100) {
                    $sn = "0" . $sn;
                }
                $agent->setRegNo("AG" . $sn);
            }
            $em->persist($agent);
            $em->flush();
            $formsuccess = true;
            $form = $this->createForm(new AgentType(), new Agent());
        }
        return $this->render('account/agent/create.html.twig', array("pagetitle" => "Create New Agent", "addagentform" => $form->createView(), "formsuccess" => $formsuccess));
    }

    /**
     * @Route("/account/agent/list", name="listagent")
     */
    public function listAgentAction(Request $request) {
        $em = $this->getDoctrine();
        $rep = $em->getRepository("AppBundle:Agent");
        $agents = $rep->findAll();
        return $this->render("account/agent/list.html.twig", array("agents" => $agents, "pagetitle" => "List of Agents"));
    }

    /**
     * @Route("/account/user/list", name="listuser")
     */
    public function listAction(Request $request) {
        $em = $this->getDoctrine();
        $rep = $em->getRepository("AppBundle:User");
        $users = $rep->findAll();
        return $this->render("account/user/list.html.twig", array("users" => $users, "pagetitle" => "List of Users"));
    }

}
