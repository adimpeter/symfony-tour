<?php
namespace App\Controller;

class PostsController {

    public function __construct()
    {
    }

    protected $posts = array(
        array(
            'id' => 0,
            'Title' => 'Seven ways to skin a cat',
            'Author' => 'Badmus Olatunji',
            'Date' => '12-05-2019',
            'body' => 'You see when you want to skin a cat, you have to...',
            'slug' => 'seven-ways-to-skin-a-cat',
        ),
        array(
            'id' => 1,
            'Title' => 'The trials of Kogi State',
            'Author' => 'Badmus Olatunji',
            'Date' => '13-05-2019',
            'body' => 'Some time ago, you might think that the existance of some...',
            'slug' => 'the-trials-of-kogi-state',
        ),
        array(
            'id' => 2,
            'Title' => 'Makeup tools you really need',
            'Author' => 'Sharon Adibe',
            'Date' => '12-05-2019',
            'body' => 'Its all about the glam, the benjamines and shit. wait did you just say...',
            'slug' => 'makeup-tools-you-really_need',
        ),
        array(
            'id' => 3,
            'Title' => 'The greate economic rivival',
            'Author' => 'Badmus Olatunji',
            'Date' => '20-05-2019',
            'body' => 'You might have seen the currency lately and tought to yourself...',
            'slug' => 'the-great-economic-rivival',
        )
    );

    public function getPosts(){
        return $this->posts;
    }

    public function getPost($slug){
        foreach($this->posts as $post){
            if($post['slug'] == $slug){
                return $post;
            }
        }

        return null;
    }
}