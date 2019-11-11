<?php

namespace App\Controller;
use App\Entity\Produit;
use App\Repository\ProduitRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProduitController extends AbstractController
{
    /**
     * @Route("/produit/add" , name="produit")
    
     */

    public function add()
    {
        $manager = $this->getDoctrine()->getManager();

        $produit = new Produit();
        $produit->setName('fraise');
        $produit->setPrix(2000);
        $produit->setDescription('fruit');
       

        $manager->persist($produit);
        $manager->flush();
        return $this->render('produit/add.html.twig', [
            'Produit' => $produit,
        ]);
        }
        
 
        /**
     * @Route("/produit/show" , name="showProduit")
     */

    public function show(ProduitRepository $repos)
    {
        $produits = $repos->findAll();
       
        return $this->render('produit/show.html.twig', [
            'produits' => $produits
        ]);
    }

      /**
     * @Route("/produit/delete/{id}" , name="deleteProduit")
     */

    public function delete(ProduitRepository $repos,$id )
    {
        $manager = $this->getDoctrine()->getManager();
        $produit = $repos->find($id);

            if (!$produit) {
                throw $this->createNotFoundException(
                'll n\'y a pas un identifiant de nbre :' . $id
                );
            }

        $manager->remove($produit);
        $manager->flush();

        return $this->render('produit/delete.html.twig', [
            'produit' => $produit
        ]);
    }
    
}
   
 


    

