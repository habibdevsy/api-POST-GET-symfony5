<?php
namespace App\Controller;
use App\Entity\Name;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\NameRepository;
use Symfony\Component\HttpFoundation\Request;
//use Symfony\Component\HttpFoundation\JsonResponse;
/**
 * Class Api_name
 *
 *
 * @Route(path="/api/")
 */
class Api_name extends AbstractController
{

    /**
     * 
     * @Route("name", name="api_add_name", methods={"POST"})
     */
    public function add(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        
        $newName = new Name();
        
        $f_name      = $request->request->get("f_name");
        $l_name      = $request->request->get("l_name"); 
        $description = $request->request->get("description");

       
        $errors=[];

        if(empty($f_name) | empty($l_name)){
           
            $errors[]="first name or last name are empty";
            
            }
        
        if (count($errors) > 0) {
            return $this->json(['errors' => $errors], 400);
            }
           
        $newName->setFName($f_name);
        $newName->setLName($l_name);
        $newName->setdescription($description);

        $entityManager->persist($newName);
        $entityManager->flush();
            
       return new Response('Saved new name...');
       
        
    }
    /**
     * @Route("name", name="list_name", methods={"GET"})
     */

     public function list(NameRepository $NameRepository)
    {                
        $names = $this->getDoctrine()
            ->getRepository(Name::class)
            ->getAll();
           
           return $this->json(['name'=>$names]);
        
     }
 


}
