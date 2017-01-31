<?php

namespace FormationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\DateTime;
use Doctrine\ORM\Query\ResultSetMapping;
use AppBundle\Entity\PartForm;

class DefaultController extends Controller
{
    /**
     * @Route("/formation ",name="formation")
     */
    public function FormationAction(Request $request)

    {
    	$session = $request->getSession();
         
        if(!$session->has('id')){
            return $this->redirectToRoute('login');
        }
        $nom = $session->get('nom');
        $prenom = $session->get('prenom');
        $query = $this->getDoctrine()->getRepository('AppBundle:Formation')->findAll();
        $jours = 0 ;
        foreach( $query as $x)
        {
        	$date = new \DateTime("now");
        	$interval = $date->diff($x->getDate());
        	$j=intval($interval->format('%R%a'));
    

        	if( ($j + $x->getDuree()) >0)
        		$jours+=($j<0)?($x->getDuree()+$j):($x->getDuree());
        }

        return $this->render('FormationBundle:Formation:formation.html.twig',array(
            'title'=>'Formation', 'nom'=>$nom, 'prenom'=>$prenom,'formation'=>$query,'jours'=>$jours,'compte'=>true));
    }

    /**
     * @Route("formation/mesFormations/{id}",name="mesFormation")
     */
    public function mesFormationAction(Request $request, $id=-100)

    {
    	$session = $request->getSession();
         
        if(!$session->has('id')){
            return $this->redirectToRoute('login');
        }
        $nom = $session->get('nom');
        $prenom = $session->get('prenom');
        $idSalarie = 0 ;

        if($id==-100)
        	$idSalarie= $session->get('id_salaire');
       	else
       		$idSalarie=$id;

        $salarie = $this->getDoctrine()->getRepository('AppBundle:Salarie')->findOneById($idSalarie);
        $formation= $this->getDoctrine()->getRepository('AppBundle:PartForm')->findBySalarie($salarie);
        $cout=0;
        foreach ($formation as $f) {
                if($f->getEtats()=='Formation Validée')
                    $cout+=$f->getFormation()->getCout();
	    }
	    $idSalarie = $id ;
        /*$repository = $this->getDoctrine()->getRepository('AppBundle:Formation');
    	$query = $repository->createQueryBuilder('f')
    		->leftJoin('f.idUsers', 'u')
    		->where('u = :user')
    		->setParameter('user', $salarie)
    		->getQuery();

    	$formations = $query->getResult();
    	*/

  
        return $this->render('FormationBundle:Formation:mesformation.html.twig',array(
            'title'=>'Formation', 'nom'=>$nom, 'prenom'=>$prenom,'formation'=>$formation,'idSalaire'=>$idSalarie,'compte'=>false,'cout'=> $cout));
           
    }

    /**
     * @Route("/formation/{contenu}/{id}/{idSalarie} ",name="formation_show")
     */

    public function FormAffAction(Request $request, $id,$contenu,$idSalarie=-100)
    {

    	$session = $request->getSession();
        if(!$session->has('id')){
            return $this->redirectToRoute('login');
        }
        $nom = $session->get('nom');
        $prenom = $session->get('prenom');

        $idSal= $session->get('id_salaire');
        $valide = false ; 
        if($idSalarie!=-100){$idSal=$idSalarie;$valide = true ;}

        $query = $this->getDoctrine()->getRepository('AppBundle:Formation')->findOneById($id);

        if(!$query)
        {
        	return $this->redirectToRoute('formation');

        }

        $inscrit = false ;
		$partform = $this->getDoctrine()->getRepository('AppBundle:PartForm')->findOneBy(
			array('formation' => $query->getId(), 'salarie' => $idSal)
			);       
		if($partform)$inscrit=true;

        $date = new \DateTime("now");
        $interval = $date->diff($query->getDate());
       	$j=intval($interval->format('%R%a'));
       	$message = "La formation n'a pas encore débutée";
       	if($j<0)
       		if( ($j + $query->getDuree()) >0)
       			$message="Formation encours" ;
       		else
       			$message="Formation terminée" ;
        		

        return $this->render('FormationBundle:Formation:afficheFormation.html.twig',array(
            'title'=>'Inscription formation', 'nom'=>$nom, 'prenom'=>$prenom,'formation'=>$query,'inscrit'=>$inscrit,'message'=>$message,'partform'=>$partform,'valider'=>true,'idSalarie'=>$idSalarie
            ,'valide'=>$valide));


    }

    /**
     * @Route("/formation/inscription/{contenu}/{id}/{idSalarie}/{valider}",name="inscription")
     */

    public function InscrAction(Request $request, $id,$contenu,$valider='false',$idSalarie=-100)
    {

    	$session = $request->getSession();
        if(!$session->has('id')){
            return $this->redirectToRoute('login');
        }

        
        
        $nom = $session->get('nom');
        $prenom = $session->get('prenom');

        if($idSalarie==-100)
        	$idSalarie= $session->get('id_salaire');

        $query = $this->getDoctrine()->getRepository('AppBundle:Formation')->findOneById($id);
        $salarie = $this->getDoctrine()->getRepository('AppBundle:Salarie')->findOneById($idSalarie);
        

        if(!$query )
        {
        	return $this->redirectToRoute('formation');

        }

        $partform=null ;
        if($idSalarie==-100)
        {
	        $partform = new PartForm();
	        $partform->setFormation($query);
	        $partform->setSalarie($salarie);
	        if($salarie->getSuperieurhierarchique()==0)
	        {
	        	$partform->setLu(true);
	        	$partform->setEtats("Formation Validée");

	        }
	        else
	        {
	        	$partform->setLu(false);
	        	$partform->setEtats("La formation n'a pas encore été validée");
	        }
	    }
	    else
	    {
	    	$partform = $this->getDoctrine()->getRepository('AppBundle:PartForm')->findOneBy(
	    		array('formation' => $query, 'salarie' => $salarie)
	    		);
	    	$partform->setEtats($valider);
	    }
	    $em = $this->getDoctrine()->getManager();
	   	$em->persist($partform);
	    $em->flush();
	    
	    return $this->redirectToRoute('formation', array('mess'=>'Votre demande sera traitée par votre supérieur hierarchique. Vous serez notifié.',));


    }
}
