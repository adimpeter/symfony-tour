<?php

class PostsController {

    protected $posts = array(
        array(
        'id' => 0,
        'Title' => 'Seven ways to skin a cat',
        'Author' => 'Badmus Olatunji',
        'Date' => '12-05-2019',
        'body' => 'You see when you want to skin a cat, you have to...'
        ),
        array(
        'id' => 1,
        'Title' => 'The trials of Kogi State',
        'Author' => 'Badmus Olatunji',
        'Date' => '13-05-2019',
        'body' => 'Some time ago, you might think that the existance of some...'
        ),
        array(
        'id' => 2,
        'Title' => 'Makeup tools you really need',
        'Author' => 'Sharon Adibe',
        'Date' => '12-05-2019',
        'body' => 'Its all about the glam, the benjamines and shit. wait did you just say...'
        ),
        array(
        'id' => 3,
        'Title' => 'The greate economic rivival',
        'Author' => 'Badmus Olatunji',
        'Date' => '20-05-2019',
        'body' => 'You might have seen the currency lately and tought to yourself...'
        )
    );

    public function getPosts(){
        return $this->posts;
    }
}