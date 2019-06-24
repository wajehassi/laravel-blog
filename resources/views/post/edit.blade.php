
@extends('layouts.app')
@section('css')

@endsection
@section('content')

<div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-wrapper" style="margin-top:100px;">
                        @include('flash-message')
                            <div class="table-title">
                            <form method="POST" action="{{ route('post.update', ['id' =>$post->id]) }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input name="_method" type="hidden" value="PUT">
                                    <div class="col-md-12 col-sm-6">
                                        <div class="col-md-6 col-sm-6 {{ $errors->has('title') ? ' has-error' : '' }}">
                                            <label for="exampleFormControlInput1">Title</label>
                                            <input type="text" name="title" value="{{$post->title}}" class="form-control" id="exampleFormControlInput1"
                                                placeholder="example">
                                                <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 {{ $errors->has('image') ? ' has-error' : '' }}">
                                            <label for="exampleFormControlFile1">Image</label>
                                            <input type="file" class="form-control" name="image" >
                                            <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            @if(count($post->media))
                                        <img src="{{$post->media[0]->getUrl()}}" alt="..." class="img-thumbnail">
                                        @else
                                        <img src="" alt="There is no imge" class="img-thumbnail">
                                        @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <label for="exampleFormControlSelect2">Catigories</label>
                                            <select name="categories[]" multiple class="form-control" id="exampleFormControlSelect2">
                                         @foreach($categories as $category)
                                         <option value="{{$category->id}}">{{$category->name}}</option>
                                         @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-12 col-12 col-sm-12 {{ $errors->has('description') ? ' has-error' : '' }}">
                                            <label for="exampleFormControlTextarea1">Description</label>
                                            <textarea name="description" class="form-control" id="exampleFormControlTextarea1"
                                                rows="3">{{$post->description}}</textarea>
                                                <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                        </div>
                                    </div>
                                    <div class="col-md-12"></div>
                                    <div class="col-lg-6 col-md-6 col-sm-4">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                            </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection
@section('content')
@endsection