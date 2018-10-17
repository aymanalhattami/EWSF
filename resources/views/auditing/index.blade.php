@php $pageSubTitle = "auditing" @endphp
@extends('layouts.app');
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="title-breadcrumb auditing-breadcrumb">
                    <h2 class="pull-left">
                        Auditing
                    </h2>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{ url('/dashboard') }}"><i class="fa fa-home main-color"></i></a></li>
                        <li>auditing</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 text-left">
                <form action="" method="get" class="user-search">
                    <div class="form-group form-group-sm">
                        <div class="col-md-8 input-group">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                            <input type="search" class="form-control" placeholder="Search for User" id="search-auditing" name="search-auditing"/>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6 text-right">
                <div class="btn-group btn-group-sm">
                    <a class="btn btn-primary btn-sm" href="{{ url('/audit_pdf') }}"><i class="fa fa-file-pdf-o"></i> <span> Export to PDF</span></a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-condense audit-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User Name</th>
                                <th>User Email</th>
                                <th>Type</th>
                                <th>Action</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($allAuditing as $a)
                            <tr>
                                <td>{{ $a->id }}</td>
                                <td>{{ $a->user_name }}</td>
                                <td>{{ $a->user_email }}</td>
                                <td>{{ $a->type }}</td>
                                <td>{{ $a->action }}</td>
                                <td>{{ $a->created_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection