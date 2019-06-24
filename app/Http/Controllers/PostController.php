<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Category;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        if(Auth::user()->hasRole('Admin')) {
            
            $posts = Post::all();
          
            return view('post/index', ['posts' => $posts]); 
           } 
           else
            {
            return response('Unauthorized.', 401);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->hasRole('Admin')) {
                
            $categories = Category::all();

            return view('post/create', ['categories' => $categories]);       
           } 
           else
            {
            return response('Unauthorized.', 401);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if(Auth::user()->hasRole('Admin')) {
        
            $this->validateInput($request);

            $categories  = $request->input('categories');
            $title       = $request->input('title');
            $description = $request->input('description');
            $image = $request->file('image');
            $input = ['title'=>$title,'description'=>$description,  ];

         
            $new_post = Post::create($input);
            $new_post_with_category = $new_post->categories()->attach($categories);

            if ($image) {
                $new_post->addMedia($image)->toMediaCollection('posts');
            }

            if($new_post){
                return redirect()->route('post.edit',['id'=>$new_post->id])->with('success', 'Post has been Created Successfully');

        }else{
            return redirect()->route('post.index')->with('error', 'Something Went Wrong!');
             }  
         } 
           else
            {
            return response('Unauthorized.', 401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        die;
        if(Auth::user()->hasRole('Admin')) {
            $post = Post::findorfail($id);
        }
        else
        {
            return response('Unauthorized.', 401);
        }
      return view('post/show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->hasRole('Admin')) {
            $post = Post::findorfail($id);
            $categories = Category::all();
        }
        else
        {
            return response('Unauthorized.', 401);
        }
      return view('post/edit', ['post' => $post , 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Auth::user()->hasRole('Admin')) {
        
           $this->validateInput($request);

            $categories    = $request->input('categories');
            $title     = $request->input('title');
            $description = $request->input('description');
            $image = $request->file('image');

            $input = ['title'=>$title,'description'=>$description,  ];

            $post = Post::findorfail($id);

            $new_post = Post::where('id', $id)->update($input);


            $new_post_with_category =   $post->categories()->sync($categories);
          
            if ($image) {
                $post->clearMediaCollection();
                $post->addMedia($image)->toMediaCollection('posts');
            }
            if($new_post){
                return redirect()->route('post.edit',['id'=>$post->id])->with('success', 'Updated Successfully');

        }else{
            return redirect()->route('post.index')->with('error', 'Something Went Wrong!');
             }  
         } 
           else
            {
            return response('Unauthorized.', 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->hasRole('Admin')) 
        {
        $post = Post::findorfail($id);
        $post->categories()->detach();
        $post->clearMediaCollection();
        $deleted = $post->delete();

            if($deleted){
                return redirect()->route('post.index')->with('success', 'Deleted Successfully');
            }
            else
            {
               return redirect()->route('post.index')->with('error', 'Something Went Wrong!');
            }  
        }
        else
        {
             return response('Unauthorized.', 401);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detach_category(Request $request, $id)
    {
        if(Auth::user()->hasRole('Admin')) {
        
            $this->validateInput($request);

            $categories  = $request->input('categories');

            $detach_category =   $user->categories()->detach($categories);
          
            if($detach_category){
                return redirect()->route('post.edit',['id'=>$new_post->id])->with('success', 'Updated Successfully');

        }else{
            return redirect()->route('post.index')->with('error', 'Something Went Wrong!');
             }  
         } 
           else
            {
            return response('Unauthorized.', 401);
        }
    }

    private function validateInput($request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',      
            'image' => 'max:10000|mimes:png,jpg,gif'
        ]);
    }
}
