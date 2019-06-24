
@extends('layouts.app')
@section('css')
<style type="text/css">
        body {
            color: #404E67;
            background: #F5F7FA;
            font-family: 'Open Sans', sans-serif;
        }
        
        .table-wrapper {
            width: 600px;
            margin: 30px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        }
        
        .table-title {
            padding-bottom: 10px;
            margin: 0 0 10px;
        }
        
        .table-title h2 {
            margin: 6px 0 0;
            font-size: 22px;
        }
        
        .table-title .add-new {
            float: right;
            height: 30px;
            font-weight: bold;
            font-size: 12px;
            text-shadow: none;
            min-width: 100px;
            border-radius: 50px;
            line-height: 13px;
        }
        
        .table-title .add-new i {
            margin-right: 4px;
        }
        
        table.table {
            table-layout: fixed;
        }
        
        table.table tr th,
        table.table tr td {
            border-color: #e9e9e9;
        }
        
        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }
        
        table.table td a {
            cursor: pointer;
            display: inline-block;
            margin: 0 5px;
            min-width: 24px;
        }
        
        table.table td a.add {
            color: #27C46B;
        }
        
        table.table td a.edit {
            color: #FFC107;
        }
        
        table.table td a.delete {
            color: #E34724;
        }
        
        table.table td i {
            font-size: 19px;
        }
        
        table.table td a.add i {
            font-size: 24px;
            position: relative;
            top: 3px;
        }
        
        table.table .form-control {
            height: 32px;
            line-height: 32px;
            box-shadow: none;
            border-radius: 2px;
        }
        
        table.table .form-control.error {
            border-color: #f50000;
        }
        
        table.table td .add {
            display: none;
        }
    </style>
@endsection
@section('content')
<div class="row">
<div class="container">
                <div class="table-wrapper" style="margin-top:100px;">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h2>Posts List</h2>
                            </div>
                            <div class="col-sm-4">
                            <a href="{{ route('post.create') }}" class="btn btn-info add-new"> <i class="fa fa-plus"></i> Add New</a>
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
                        @foreach($posts as $post)
                       <tr>
                             <td>{{$post->title}}</td>
                             <td>
                             <form method="POST" action="{{ route('post.destroy', ['id' => $post->id]) }}" onsubmit="return confirm('Are you sure?')">
                                 <input type="hidden" name="_method" value="DELETE">
                                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                 <a href="{{ route('post.edit', ['id' => $post->id]) }}" class="edit" title="Edit" data-toggle="tooltip"><i class="fa fa-edit"></i></a>
                                 <button type="submit" class="delete" title="delete" ><i class="fa fa-trash"></i></button>
                             </form>
                            </td>
                      </tr>
                 @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
</div>
@endsection
