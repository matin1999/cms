<?php


namespace App\Repositories;


use App\Models\Post;
use App\Models\User;

class PostRepository extends BaseRepository implements PostInterface
{
    public $model;

    public function __construct(Post $post)
    {
        $this->model = $post;
    }

}
