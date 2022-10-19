<?php
class HomePageController
{
    public static function index()
    {
        $posts = PostsDB::getPublishedPosts();
        require_once '/views/homepage/home.php';
    }
}