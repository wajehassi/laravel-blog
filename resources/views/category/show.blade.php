
@extends('layouts.app')
@section('content')
<div class="container">
                <div class="table-wrapper" style="margin-top:100px;">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h2>Posts List for {{$category->name}} category</h2>
                            </div>
                         
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <div class="row">
                                <tr>
                                    <div class="col-sm-6">

                                        <th>Name</th>
                                    </div>
                                    <div class="col-sm-6">

                                        <th>Actions</th>
                                    </div>
                                </tr>
                            </div>
                        </thead>
                        <tbody>
                        @foreach($category->posts as $post)
             <tr>
                     <td>{{$post->title}}</td>
                     <td>
                     <form method="POST" action="{{ route('post.destroy', ['id' => $post->id]) }}" onsubmit="return confirm('Are you sure?')">
                         <input type="hidden" name="_method" value="DELETE">
                         <input type="hidden" name="_token" value="{{ csrf_token() }}">
                         <a href="{{ route('post.edit', ['id' => $post->id]) }}" class="edit" title="Edit" data-toggle="tooltip"><i class="fa fa-edit"></i></a>
                         <a href="{{ route('post.show', ['id' => $post->id]) }}" class="show" title="show" data-toggle="tooltip"><i  class="fa fa-eye" ></i></a>
                         <button type="submit" class="delete" title="delete" ><i class="fa fa-trash"></i>
                                
                                                   </button>
                         </form>
                        </td>
                 </tr>
                 @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


@endsection
@section('content')
@endsection