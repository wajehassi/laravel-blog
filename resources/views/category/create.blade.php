
@extends('layouts.app')
@section('content')
<div class="container">
                <div class="row">
  
                    <div class="col-md-12">
                        <div class="table-wrapper" style="margin-top:100px;">
                        @include('flash-message')
                            <div class="table-title">
                                <form method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                    <div class="col-md-12 col-sm-6">
                                        <div class="col-md-6 col-sm-6 {{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label for="exampleFormControlInput1">name</label>
                                            <input type="text" name="name" class="form-control" id="exampleFormControlInput1"
                                                placeholder="example">
                                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        </div>
                                    
                                    </div>
                                    <div class="col-md-12">
                                        <div class="col-lg-12 col-12 col-sm-12 {{ $errors->has('description') ? ' has-error' : '' }}">
                                            <label for="exampleFormControlTextarea1">Description</label>
                                            <textarea name="description" class="form-control" id="exampleFormControlTextarea1"
                                                rows="3"></textarea>
                                                <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                        </div>
                                    </div>
                                    <div class="col-md-12"></div>
                                    <div class="col-lg-6 col-md-6 col-sm-4">
                                        <button type="submit" class="btn btn-primary">Submit</button>
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