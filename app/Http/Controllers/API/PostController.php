<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Repositories\PostInterface;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class PostController extends Controller
{
    protected $user;
    protected $post;

    public function __construct(PostInterface $post)
    {
        $this->user = JWTAuth::parseToken()->authenticate();
        $this->post = $post;

    }

    public function index()
    {
//        return $this->user->post->get();
        return $this->post->where($col='user_id',$this->user->id)->get();

    }
    public function show($id)
    {
        $post = $this->post->where($col='user_id',$this->user->id)->find($id);

        if (!$post) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, product with id ' . $id . ' cannot be found'
            ], 400);
        }

        return $post;
    }

    public function store(PostRequest $request)
    {
//        $this->validate($request, [
//            'name' => 'required',
//            'price' => 'required|integer',
//            'quantity' => 'required|integer'
//        ]);
//
//        $product = new Product();
//        $product->name = $request->name;
//        $product->price = $request->price;
//        $product->quantity = $request->quantity;
        $post = $this->post->create($request->validated());

        if ($this->user->products()->save($post))
            return response()->json([
                'success' => true,
                'product' => $post
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'Sorry, product could not be added'
            ], 500);
    }

    public function update($request, $id)
    {
        $product = $this->user->products()->find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, product with id ' . $id . ' cannot be found'
            ], 400);
        }

        $updated = $post->fill($request->all())
            ->save();

        if ($updated) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, product could not be updated'
            ], 500);
        }
    }

    public function destroy($id)
    {
        $post = $this->post->find($id);

        if (!$post) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, product with id ' . $id . ' cannot be found'
            ], 400);
        }

        if ($this->post->deleteById($id)) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Product could not be deleted'
            ], 500);
        }
    }
}
