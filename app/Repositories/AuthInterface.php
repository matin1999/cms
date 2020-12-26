<?php


namespace App\Repositories;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

interface AuthInterface extends BaseRepositoryInterface
{

    public function create(array $datas);

}
