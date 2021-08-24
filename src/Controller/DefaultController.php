<?php

namespace App\Controller;

use App\Entity\Task;
use App\Entity\Categories;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class DefaultController extends AbstractController {

       
    /**
     * @Route ("/inicio"), options={"expose"=true}
     * muesta la plantilla de la pag principal 
     */
    public function principal() { 
        
        $em = $this->getDoctrine()->getManager();
        $query_select ="SELECT t.id, t.task, c.category from task t, categories c where t.id_category=c.id_category";
        $db=$em->getConnection() -> prepare($query_select);
        $params = array ();
        $db-> execute();
        $tasks=$db->fetchAll();

        return $this->render('base.html.twig', array ('tasks' => $tasks));
    }

        /**
         * @Route ("new")
         */
        public function new(Request $request){

            $task=$request->get('task');
            $category=$request->get('category');
            // Preparo la conexion a entidad
            $con = $this->getDoctrine()->getManager();
          
           //INSERTAR
           $newtask = new Task();
           $newtask->setTask($task);
           $newtask->setIdCategory($category);

           $con->persist($newtask);
           $con->flush();
            
           return $this->principal();
        }

        /**
         * @Route("deleteTask/{id}") ,options={"expose"=true}, name="deleteTask"
         */
        public function deleteTask(Task $request){
         
            $con = $this->getDoctrine()->getManager();
            $con->remove($request);
            $con->flush();

            return $this->principal();
        }
}

?>