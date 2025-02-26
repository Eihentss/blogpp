<?php
require "models/Blog.php";


class BlogController
{
  public function index()
  {
    $posts = Blog::all();
    require "views/blog/index.view.php";
  }
  public function show()
  {
    $id = $_GET['id'];
    $post = Blog::find($id);
    require "views/blog/show.view.php";
  }
  public function create()
  {
    require "views/blog/create.view.php";
  }
  public function store()
  {
    $content = $_POST['content'];
    $post = new Blog();
    $post->content = $content;
    $post->save();
    header("Location: /blog");
  }
  public function edit()
  {
    $id = $_GET['id'];
    $post = Blog::find($id);
    require "views/blog/edit.view.php";
  }
  public function update()
  {
    $id = $_GET['id'];
    $content = $_POST['content'];
    $post = Blog::find($id);
    $post->content = $content;
    $post->save();
    header("Location: /blog");
  }
  public function destroy()
  {
    $id = $_GET['id'];
    $post = Blog::find($id);
    $post->delete();
    header("Location: /blog");
  }
}

