<?php
 //Created by FIlip Lorenc 
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Post;
  
class PostController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $posts = Post::get();
  
        return view('components.posts', compact('posts'));
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'body' => 'required',
            'points' => 'required',
        ]);
  
        if ($validator->fails()) {
            return response()->json([
                        'error' => $validator->errors()->all()
                    ]);
        }
       
        Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'points' => $request->points,
        ]);
  
        return response()->json(['success' => 'Feedback post created successfully.']);
    }
}