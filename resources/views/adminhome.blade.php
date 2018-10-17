<form action="{{ url('UserController@update') }}" method="POST">
    <div class="form-group">
        <lable for="id" class="control-label col-md-3">ID</lable>
        <div class="col-md-9 input-group">
            <span class="input-group-addon">#</span>
            <input type="text" class="form-control" name="id" readonly value="{{ $theUser->id }}"/>
        </div>
    </div>
    <div class="form-group">
        <lable for="name" class="control-label col-md-3">Name</lable>
        <div class="col-md-9 input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input type="text" class="form-control" name="name" value="{{ $theUser->name }}"/>
        </div>
    </div>
    <div class="form-group">
        <lable for="email" class="control-label col-md-3">Email</lable>
        <div class="col-md-9 input-group">
            <span class="input-group-addon">@</span>
            <input type="email" class="form-control" name="email" value="{{ $theUser->email }}"/>
        </div>
    </div>
    <div class="form-group">
        <lable for="password" class="control-label col-md-3">Password</lable>
        <div class="col-md-9 input-group">
            <span class="input-group-addon"><i class="fa fa-eye"></i></span>
            <input type="password" class="form-control" name="password"/>
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
</form>