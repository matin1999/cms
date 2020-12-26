<?php


namespace App\Repositories;


use App\Models\User;

class PostRepository extends BaseRepository implements PostInterface
{
    public $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

}
