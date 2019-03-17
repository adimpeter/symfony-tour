<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController{
    /**
     * @Route("/blog")
     */
    public function index(){
        // return an array of posts
        return $this->render('blog/index.html.twig', [
            'posts' => $this->returnMockPostsArray()
        ]);
    }
    
//    /**
//     * @Route("/blog/{title}")
//     */
//    public function getArticle($title){
//
//    }

    /**
     * @Route("/blog/posts/" name="all_posts")
     * @return array
     */
    public function returnMockPostsArray(){
        // list of mock posts
        $posts = new \PostsController();
        return $posts->getPosts();
    }
    
}