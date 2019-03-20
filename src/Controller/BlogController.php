<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\PostsController;

class BlogController extends AbstractController{
    /**
     * @Route("/blog", name="show_all_posts")
     */
    public function index(){
        // return an array of posts
        return $this->render('blog/index.html.twig', [
            'posts' => $this->returnMockPostsArray()
        ]);
    }

    /**
     * @Route("/blog/{slug}", name="show_post")
     * @param $slug
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function post($slug){
        // return the selected post
        return $this->render('blog/post.html.twig', [
            'post' => $this->getPost($slug)
        ]);
    }
    
//    /**
//     * @Route("/blog/{title}")
//     */
//    public function getArticle($title){
//
//    }

    /**
     * @return array
     */
    public function returnMockPostsArray(){
        // list of mock posts
        $posts = new PostsController();
        return $posts->getPosts();
    }

    public function getPost($slug){
        $post = new PostsController();
        return $post->getPost($slug);
    }
    
}