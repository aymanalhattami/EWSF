<?php $pageSubTitle = 'userIndex' ?>
@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="title-breadcrumb">
                    <h2 class="pull-left">
                        <i class="fa fa-users main-color"></i> Users
                    </h2>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{ url('/dashboard') }}"><i class="fa fa-home main-color"></i></a></li>
                        <li>users</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="margin-bottom">
                    @if($allUsers != null)
                        {!! $admins_chart->html() !!}
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="user-settings">
                <div class="col-md-6 text-left">
                    <form action="" method="get" class="user-search">
                        <div class="form-group form-group-sm">
                            <div class="col-md-8 input-group">
                                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                <input type="search" class="form-control" placeholder="Search for User" id="search" name="search"/>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 text-right">
                    <div class="btn-group btn-group-sm">
                        <a href="{{ url('/users') }}" class="btn btn-link"><i class="fa fa-refresh"></i></a>
                        <a href="{{ url('/register') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i><span> Add User</span></a>
                        <button type="button" class="btn btn-danger">User Types</button>
                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('/users') }}"><i class="fa fa-users"></i> <span> All Users</span></a></li>
                            <li><a href="{{ url('/admins') }}"><i class="fa fa-user"></i><span> Admins Users</span></a></li>
                            <li><a href="{{ url('/users_not_admins') }}"><i class="fa fa-user"></i> <span> Users | not Admins</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-condense table-hover user-table">
                        <thead>
                            <tr>
                                <th class="text-center">User ID</th>
                                <th class="text-center">User Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Is Admin <i class="fa fa-question color-red"></i></th>
                                <th class="text-center">Date</th>
                                <th class="text-center"><i class="fa fa-ellipsis-h"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(isset($allUsers))
                            @foreach($allUsers as $u)
                            <tr class="text-center">
                                <td>{{ $u->id }}</td>
                                <td>{{ $u->name }}</td>
                                <td>{{ $u->email }}</td>
                                <td>
                                    @if($u->admin == 0)
                                        {{ "User" }}
                                    @else
                                        {{ "Admin" }}
                                    @endif
                                </td>
                                <td>{{ $u->created_at }}</td>
                                <td>
                                    @if($u->id > 2)
                                        <a href="/users/{{ $u->id }}/edit"><i class="fa fa-edit"></i></a>
                                        {{ Form::open(['action' => ['UserController@destroy', $u->id], "method" => "POST", 'class' => 'form-horizontal']) }}
                                        {{ Form::hidden("_method", "DELETE") }}
                                        <button type="submit" class="btn btn-link color-red"><i class="fa fa-trash"></i></button>
                                        {{ Form::close() }}
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        @endif
                        @if(isset($admins))
                            @foreach($admins as $u)
                                <tr class="text-center">
                                    <td>{{ $u->id }}</td>
                                    <td>{{ $u->name }}</td>
                                    <td>{{ $u->email }}</td>
                                    <td>
                                        @if($u->admin == 0)
                                            {{ "User" }}
                                        @else
                                            {{ "Admin" }}
                                        @endif
                                    </td>
                                    <td>{{ $u->created_at }}</td>
                                    <td>
                                        @if($u->id > 2)
                                            <a href="/users/{{ $u->id }}/edit"><i class="fa fa-edit"></i></a>
                                            {{ Form::open(['action' => ['UserController@destroy', $u->id], "method" => "POST", 'class' => 'form-horizontal']) }}
                                            {{ Form::hidden("_method", "DELETE") }}
                                            <button type="submit" class="btn btn-link color-red"><i class="fa fa-trash"></i></button>
                                            {{ Form::close() }}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        @if(isset($user_not_admins))
                            @foreach($user_not_admins as $u)
                                <tr class="text-center">
                                    <td>{{ $u->id }}</td>
                                    <td>{{ $u->name }}</td>
                                    <td>{{ $u->email }}</td>
                                    <td>
                                        @if($u->admin == 0)
                                            {{ "User" }}
                                        @else
                                            {{ "Admin" }}
                                        @endif
                                    </td>
                                    <td>{{ $u->created_at }}</td>
                                    <td>
                                        @if($u->id > 2)
                                            <a href="/users/{{ $u->id }}/edit"><i class="fa fa-edit"></i></a>
                                            {{ Form::open(['action' => ['UserController@destroy', $u->id], "method" => "POST", 'class' => 'form-horizontal']) }}
                                            {{ Form::hidden("_method", "DELETE") }}
                                            <button type="submit" class="btn btn-link color-red"><i class="fa fa-trash"></i></button>
                                            {{ Form::close() }}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 text-center">
                @if(isset($allUsers))
                    {{ $allUsers->links() }}
                @endif
            </div>
        </div>
    </div>
    @if($allUsers != null)
        {!! Charts::Scripts() !!}
        {!! $admins_chart->script() !!}
    @endif
@endsection