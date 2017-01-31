<?php

 namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use AppBundle\Entity\Users;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;   
 use Symfony\Component\HttpFoundation\Response;                                                                                                                                                        

class SecurityController extends Controller
{
	 /**
     * @Route("/login", name="login")
     */    

    public function loginAction(Request $request)
    {

        $user = new Users();
        $err = false ;
        $mess ='';
        $form = $this->createFormBuilder($user)

            ->add('username',TextType::class, array(
                'required' => true 

                ))
            ->add('pass',PasswordType::class, array(
                'required' => true 
                ))
            ->add('save', SubmitType::class, array('label' => 'Connection'))
            ->getForm();

            $form->handleRequest($request);

            if ( $form->isSubmitted()) {

                  
                $username = strtolower($form['username']->getData() );
                $pass = sha1($form['pass']->getData()) ;
                $query = $this->getDoctrine()->getRepository('AppBundle:Users')->findOneBy(
                	array('username' => $username, 'pass'=> $pass,)
                	);
               	if(!$query)
               	{
               		$err = true ;
               		$mess = 'Nom d\'utilisateur ou mot de passe incorrect ';
               	}

               	else
               	{
               		/*if($query->getIsActive())
	               	{
	               		 return $this->redirectToRoute('acceuil');
	               	}*/


	               	$session = new Session();

	               	$query->setIsActive(false);

	               	/*Mise à jour is_active a true */
	               	$em = $this->getDoctrine()->getManager();
	               	$em->persist($query);
	               	$em->flush();

	               	$salarie = $query->getIdSalaire();
	               	$session->set('id',$user->getId());
	               	$session->set('id_salaire',$salarie->getId());
	               	$session->set('nom', $salarie->getNom());
	               	$session->set('prenom', $salarie->getPrenom());
	               	return $this->redirectToRoute('acceuil');
	              }
            }

        return $this->render('logBox.html.twig', array(
            'form' => $form->createView(),'error'=>$err, 'message'=>$mess,));
    }

    /**
     * @Route("/deconnect", name="deconnect")
     */    

    public function logoffAction(Request $request)
    {
      $session = $request->getSession();
      $session->invalidate();
      return $this->redirectToRoute('login');
    }
}
