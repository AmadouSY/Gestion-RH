<?php

 namespace FormationBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use AppBundle\Entity\Formation ;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType; 
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;    
 use Symfony\Component\HttpFoundation\Response;                                                                                                                                                        

class FormationController extends Controller
{

    /**
     * @Route("formation/suivi", name="suivi")
     */   
    public function SuivreAction(Request $request)
    {
      
      $session = $request->getSession();
         
        if(!$session->has('id')){
            return $this->redirectToRoute('login');
        }
        $nom = $session->get('nom');
        $prenom = $session->get('prenom');

        $formation= new Formation();
        $err = false ;
        $mess ='';
        $idSalarie= $session->get('id_salaire');
        $salarie = $this->getDoctrine()->getRepository('AppBundle:Salarie')->findBysuperieurhierarchique($idSalarie);
        return $this->render('FormationBundle:Formation:listSalarie.html.twig',array(
            'title'=>'Suivre formations', 'nom'=>$nom, 'prenom'=>$prenom,'salarie'=>$salarie,));

    }
	  /**
     * @Route("formation/ajout", name="ajouts")
     */    

    public function AjourterAction(Request $request)
    {
        $session = $request->getSession();
         
        if(!$session->has('id')){
            return $this->redirectToRoute('login');
        }
        $nom = $session->get('nom');
        $prenom = $session->get('prenom');

        $formation= new Formation();
        $err = false ;
        $mess ='';

        $form = $this->createFormBuilder($formation)

            ->add('contenu',TextType::class, array(
                'required' => true 

                ))
            ->add('cout',IntegerType::class, array(
                'required' => true 
                ))
            ->add('date',DateType::class, array(
                'widget' => 'single_text','required' => true 
                ))
            ->add('duree',IntegerType::class, array(
                
                'required' => false
                ))
            ->add('preRequis',TextType::class, array(
                'required' => true 

                ))
            ->add('save', SubmitType::class, array('label' => 'Enregistrer'))
            ->getForm();

            $form->handleRequest($request);

              if ( $form->isSubmitted() && $form->isValid()) {

	               	$em = $this->getDoctrine()->getManager();
	               	$em->persist($formation);
	               	$em->flush();

	               	return $this->redirectToRoute('formation', array('mess'=>'Formation enregistrée!',));
	              }
            

        return $this->render('FormationBundle:Formation:ajout.html.twig', array('nom'=>$nom,'prenom'=>$prenom,
            'form' => $form->createView(),'error'=>$err, 'message'=>$mess,'title'=>'Formation',));
    }
}