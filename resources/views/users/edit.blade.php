<?php $pageSubTitle = 'userEdit' ?>
@extends('layouts.app')
@section('content')
    <div class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="title-breadcrumb">
                    <h2 class="pull-left">
                        <i class="fa fa-edit"> Editing User Data</i>
                    </h2>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{ url('/dashboard') }}"><i class="fa fa-home main-color"></i></a></li>
                        <li><a href="{{ url('/users') }}"><i class="fa fa-users main-color"></i></a></li>
                        <li>edit</li>
                    </ol>
                </div>
            </div>
        </div>

        @if(isset($error))
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-dismissable alert-danger">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Oh !</strong> <span> {{ $error }}</span>
                    </div>
                </div>
            </div>
        @endif

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-body side-effect">
                        {{ Form::open(['action' => ['UserController@update', $theUser->id], "method" => "POST", 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) }}
                        <div class="form-group">
                            {{ Form::label('id', 'ID', ['class' => 'col-md-3 control-label']) }}
                            <div class="col-md-9 input-group">
                                <span class="input-group-addon main-color">#</span>
                                {{ Form::text("id", $theUser->id, ['class' => 'form-control', 'readonly' => 'readonly']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('name', 'Name', ['class' => 'col-md-3 control-label']) }}
                            <div class="col-md-9 input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                {{ Form::text("name", $theUser->name, ['class' => 'form-control', 'required' => 'required']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('email', 'Email', ['class' => 'col-md-3 control-label']) }}
                            <div class="col-md-9 input-group">
                                <span class="input-group-addon main-color">@</span>
                                {{ Form::email("email", $theUser->email, ['class' => 'form-control', 'required' => 'required']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('password', 'Password', ['class' => 'col-md-3 control-label']) }}
                            <div class="col-md-9 input-group">
                                <span class="input-group-addon"><i class="fa fa-eye main-color"></i></span>
                                {{ Form::password("password", ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <div class="form-group">
                            <lable for="admin" class="control-label col-md-3">Admin</lable>
                            <div class="col-md-9 input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <select name="admin" class="form-control" required>
                                    <option value="1" @if($theUser->admin == 1) {{ "selected" }} @endif >Yes</option>
                                    <option value="0" @if($theUser->admin == 0) {{ "selected" }} @endif >No</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-right">
                                {{ Form::hidden("_method", "PUT") }}
                                {{ Form::submit("Update", ['class' => 'btn btn-default btn-sm pull-right']) }}
                                <a href="{{ url('/users/'.$theUser->id . '/delete') }}" class="btn btn-danger btn-sm">Delete</a>
                            </div>
                        </div>

                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection