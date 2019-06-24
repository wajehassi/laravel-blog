@extends('layouts.app')

@section('content')
<div class="content">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats" style="background-color: papayawhip;">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-5 col-md-4 col-sm-12">
                                        <div class="icon fa fa-list-alt  fa-3x">
                                        </div>
                                    </div>
                                    <div class="col-7 col-md-8 col-sm-12">
                                        <a href="{{ route('category.index') }}"><em><strong>Categories</strong></em></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats" style="background-color:rgb(204, 224, 236);">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-5 col-md-4 col-sm-12">
                                        <div class="icon fa fa-list-alt  fa-3x">
                                        </div>
                                    </div>
                                    <div class="col-7 col-md-8 col-sm-12">
                                       <a  href="{{ route('post.index') }}"><em><strong>Posts</strong></em></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
