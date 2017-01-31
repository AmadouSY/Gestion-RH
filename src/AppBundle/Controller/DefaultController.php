<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Users;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;                                                                                                                                                           
class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }

    
    /**
     * @Route("/acceuil", name="acceuil")
     */   

    public function AcceuilAction(Request $request)
    {
        $session = $request->getSession();
         
        if(!$session->has('id')){
            return $this->redirectToRoute('login');
        }
        $nom = $session->get('nom');
        $prenom = $session->get('prenom');

        // replace this example code with whatever you need
        return $this->render('acceuil.html.twig',array(
            'title'=>'Acceuil', 'nom'=>$nom, 'prenom'=>$prenom,));
    }
    
    
    /**
     * @Route("/annuaire", name="annuaire")
     */   

    public function AnnuaireAction(Request $request)
    {
        $session = $request->getSession();
         
        if(!$session->has('id')){
            return $this->redirectToRoute('login');
        }
        $nom = $session->get('nom');
        $prenom = $session->get('prenom');

        // replace this example code with whatever you need
        return $this->render('annuaire.html.twig',array(
            'title'=>'Annuaire', 'nom'=>$nom, 'prenom'=>$prenom,));
    }
}
