{{ Form::open(['action' => ['UserController@update', $theUser->id], "method" => "POST", 'class' => 'form-horizontal'])}}
<div class="form-group">
    {{ Form::label('id', 'ID', ['class' => 'col-md-3 control-label']) }}
    <div class="col-md-9 input-group">
        <span class="input-group-addon">#</span>
        {{ Form::text("id", $theUser->id, ['class' => 'form-control', 'readonly' => 'readonly']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('name', 'Name', ['class' => 'col-md-3 control-label']) }}
    <div class="col-md-9 input-group">
        <span class="input-group-addon"><i class="fa fa-user"></i></span>
        {{ Form::text("name", $theUser->name, ['class' => 'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('email', 'Email', ['class' => 'col-md-3 control-label']) }}
    <div class="col-md-9 input-group">
        <span class="input-group-addon">@</span>
        {{ Form::email("email", $theUser->email, ['class' => 'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('password', 'Password', ['class' => 'col-md-3 control-label']) }}
    <div class="col-md-9 input-group">
        <span class="input-group-addon"><i class="fa fa-eye"></i></span>
        {{ Form::password("password", ['class' => 'form-control']) }}
    </div>
</div>
<div class="form-group">
    <lable for="admin" class="control-label col-md-3">Admin</lable>
    <div class="col-md-9 input-group">
        <span class="input-group-addon">#</span>
        <select name="admin" class="form-control">
            <option value="1" @if($theUser->admin == 1) {{ "selected" }} @endif >Yes</option>
            <option value="0" @if($theUser->admin == 0) {{ "selected" }} @endif >No</option>
        </select>
    </div>
</div>
<div class="form-group">
    <button type="submit" name="update" class="btn btn-default btn-sm fa-pull-right">Update</button>
    <div class="clearfix"></div>
</div>
{{ FORM::close() }}