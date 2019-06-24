<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->hasRole('Admin')) {
            
            $categories = Category::all();
          
            return view('category/index', ['categories' => $categories]); 
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
                
            return view('category/create');       
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

         
            $name = $request->input('name');
            $description = $request->input('description');

            $input = ['name'=>$name ,'description'=>$description ];

            $new_category = Category::create($input);

            if($new_category){
                return redirect()->route('category.edit', ['id'=>$new_category->id])->with('success', 'Category has been Created Successfully');
        }else{
            return redirect()->route('stock.index')->with('error', 'Something Went Wrong!');
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
        if(Auth::user()->hasRole('Admin'))
        {
            $category = Category::findorfail($id);
        }
        else
        {
            return response('Unauthorized.', 401);
        }
      return view('category/show', ['category' => $category]);
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
            $category = Category::findorfail($id);
        }
        else
        {
            return response('Unauthorized.', 401);
        }
      return view('category/edit', [ 'category' => $category]);
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
            $name   = $request->input('name');
            $description   = $request->input('description');

            $input = ['name'=>$name ,'description'=>$description  ];

            $update_category = Category::where('id', $id)->update($input);
          
            if($update_category){
                return redirect()->route('category.edit',['id'=>$id])->with('success', 'category has been Updated Successfully');

        }else{
            return redirect()->route('category.index')->with('error', 'Something Went Wrong!');
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
            $category = Category::findorfail($id);
            $category->posts()->detach();
            $deleted = $category->delete();

            if($deleted){
                return redirect()->route('category.index')->with('success', 'Deleted Successfully');
            }
            else
            {
               return redirect()->route('category.index')->with('error', 'Something Went Wrong!');
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
            'name' => 'required',
            'description' => 'required',      
        ]);
    }
}
