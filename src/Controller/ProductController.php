<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Product;
use App\Form\ProductType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="product")
     */
    public function index()
    {
        // fetch all products
        $products = $this->getDoctrine()
            ->getRepository(Product::class)
            ->findAll();

        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
            'products' => $products,
        ]);
    }

    /**
     * @Route("/product/new", name="new_product")
     */
    public function createNewProduct(Request $request, EntityManagerInterface $entityManager){

        $product = new Product();

        // create the form
        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);

        // on submit, add product to the database
        if($form->isSubmitted() && $form->isValid()){
            $product = $form->getData();

            // add to database
            $entityManager->persist($product);
            $entityManager->flush();

            // redirect to home
            return $this->redirectToRoute("product");
        }

        // render form page
        return $this->render('product/add.html.twig', [
            'controller_name' => 'ProductController',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("product/{id}", name="find_product")
     */
    public function findProduct($id){
        $product = $this->getDoctrine()
            ->getRepository(Product::class)
            ->find($id);

        if(!$product){
            throw $this->createNotFoundException('Oops! Seems like this product cant be found at the moment. id:' . $id);
        }

        return $this->render('product/product.html.twig', [
            'controller_name' => 'ProductController',
            'product' => $product,
        ]);
    }

    /**
     * @Route("product/edit/{id}", name="edit_product")
     */
    public function updateProduct(Request $request, EntityManagerInterface $entityManager, $id){
        $product = $this->getDoctrine()
            ->getRepository(Product::class)
            ->find($id);

        if(!$product){
            throw $this->createNotFoundException('Oops! Seems like this product cant be found at the moment. id:' . $id);
        }

        // create form
        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);

        // check for form submission
        if($form->isSubmitted() && $form->isValid()){
            $product = $form->getData();

            // update database
            $entityManager->persist($product);
            $entityManager->flush();

            return $this->redirectToRoute('product');
        }

        return $this->render('product/edit.html.twig', [
            'controller_name' => 'ProductController',
            'product' => $product,
            'form' => $form->createView(),
        ]);

    }


    /**
     * @Route("product/delete/{id}", name="delete_product")
     */
    public function deleteProduct(EntityManagerInterface $entityManager, $id){
        // find product
        $product = $this->getDoctrine()
            ->getRepository(Product::class)
            ->find($id);

        if(!$product){
            throw $this->createNotFoundException('Oops! Seems like this product cant be found at the moment. id:' . $id);
        }

        $entityManager->remove($product);
        $entityManager->flush();

        return $this->redirectToRoute('product');

    }
}
