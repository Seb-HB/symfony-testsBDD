<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Category;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Form\CategoryType;
use App\Repository\CategoryRepository;

#[Route('/category', name:"category_")]
class CategoryController extends AbstractController
{

    #[Route('/', name: 'list')]
    public function index(CategoryRepository $categoryRepository): Response
    {
        return $this->render('category/index.html.twig', [
            'categories'=>$categoryRepository->findAll(),
        ]);
    }

    #[Route('/add', name: 'add')]
    public function add(EntityManagerInterface $entityManager, Request $request){
        $form=$this->createForm(CategoryType::class, new Category());
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) { 
            $category = $form->getData(); 
            $entityManager = $this->getDoctrine()->getManager(); 
            $entityManager->persist($category); 
            $entityManager->flush(); 
            return $this->redirectToRoute('category_list');
        }else {   
            return $this->render('category/form.html.twig', [ 
                'form' => $form->createView(), 
                'errors'=>$form->getErrors(),
                'title'=>'Ajouter une catégorie'
            ]); 
        } 
    }

    #[Route('/edit/{category}', name: 'edit')]
    public function edit(EntityManagerInterface $entityManager, Request $request, Category $category): Response
    {
        $form=$this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) { 
            $category = $form->getData(); 
            $entityManager = $this->getDoctrine()->getManager(); 
            $entityManager->persist($category); 
            $entityManager->flush(); 
            return $this->redirectToRoute('category_list');
        }else { 
            return $this->render('category/form.html.twig', [ 
                'form' => $form->createView(), 
                'errors'=>$form->getErrors(),
                'title'=>'Modifier la catégorie'.$category->getLibelle()
            ]); 
        } 
    }

    #[Route('/delete/{category}', name: 'delete')]
    public function delete(EntityManagerInterface $entityManager, Request $request, Category $category): Response
    {
        $entityManager = $this->getDoctrine()->getManager(); 
        $entityManager->remove($category); 
        $entityManager->flush(); 
        return $this->redirectToRoute('category_list');
    }
}
