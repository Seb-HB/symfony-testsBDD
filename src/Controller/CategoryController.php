<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Category;
use Doctrine\ORM\EntityManagerInterface;

class CategoryController extends AbstractController
{
    #[Route('/category', name: 'category')]
    public function index(): Response
    {
        return $this->render('category/index.html.twig', [
            'controller_name' => 'CategoryController',
        ]);
    }

    #[Route('/category/add/{name}', name: 'add-category')]
    public function add(EntityManagerInterface $entityManager, $name){
        $category= new Category();
        $category->setLibelle($name);
        $entityManager->persist($category);
        $entityManager->flush();
        return $this->render('category/add.html.twig', [
            'controller_name' => 'CategoryController',
        ]);

    }
}
