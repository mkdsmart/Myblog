<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Psy\TabCompletion\Matcher\FunctionsMatcher;

class PostController extends Controller
{
    public function indexguest(){
        $posts= Post::all();
        return view('welcome', ['posts'=> $posts]);
    }
    public function indexadmin(){
        $posts= Post::all();
        
        return view('/adminonly', ['posts'=> $posts]);
    }

    public function index(){
        $posts= Post::all();
        return view('/home', ['posts'=> $posts]);
    }

    // To store a new post in the database
    public function store(Request $request){
        $validatedData = $request->validate([
            'title'=>'required|max:255',
            'content'=> 'required',
            'image' => 'required|image|max:2048',
        ]);

        
        // [
        //     'title.required'=> 'Please enter a title',
        //     'content.required'=> 'Please enter a content',
        //     'image.required'=> 'Please upload an image',
        // ]);
        // dd($request->File('image'));
        $fileName = time().$request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('images', $fileName, 'public');
        $validatedData['image']= '/storage/'.$path;
        // dd($validatedData);
        
        $post = Post::create($validatedData);
        $post->createdby = auth()->user()->name;
        $post->save();
        

        return redirect(route('home'));
    }

    // To delete a post
    public function delete($id){
        $post = Post::find($id);

        $post->delete();
        return redirect(route('home'));

    }

    // To access a post
    public function edit($id){
        $post = Post::find($id);
        return view('/editpost', ['post'=> $post]);

    }
    
    // To update a post
    public function update(Request $request){
        $validatedData = $request->validate([
            'title'=>'required|max:255',
            'content'=> 'required',
            'image' => 'required|image|max:2048',
        ]);
        
        $fileName = time().$request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('images', $fileName, 'public');
        $validatedData['image']= '/storage/'.$path;

        $id= $request->input('id');
        $post = Post::find($id);
        $post->update($validatedData);
        

        return redirect(route('home'));

    }

    //updating likes of the user
    public function like($id){
        $post = Post::find($id);
        $likes= $post->num_like + 1;
        $post->update(['num_like' => $likes]);

        return redirect(route('home'));

    }
    public function viewpost($id){
        $post = Post::find($id);
        $comments = Comment::all();

        return view('/postdisplay', with(['post'=> $post, 'comments'=> $comments]) );
    }
    
    public function savecomment(Request $request){
        $validatedData = $request->validate([
            'message'=>'required',
        ]);  
        
        $comment = Comment::create([
            'message' => $request->message,
            'postid' => $request -> postid,
            'author' =>  auth()->user()->name,
        ]);
        // dd($comment-> author);  

        $comment->save();
        
        $comments = Comment::all();

        return redirect(route('comment_post', ['id' => $comment->postid]));
    }

}
