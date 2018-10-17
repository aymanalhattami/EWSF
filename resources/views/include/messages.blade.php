<div class="row">
    <div class="col-md-2"></div>
    <div class="col-xs-8">
        @if(count($errors) > 0)
            @foreach($errors->all() as $error)
                <div class="alert alert-dismissable alert-danger msg-feedback" style="position: absolute; top: 70px; z-index: 999; width: 98%">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong></strong> <span>{{ $error }}</span>
                </div>
            @endforeach
        @endif


        @if(session('success'))
            <div class="alert alert-dismissable alert-success msg-feedback" style="position: absolute; top: 70px; z-index: 999; width: 98%">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Well done !</strong> <span>{{ session('success') }}</span>
            </div>
        @endif


        @if(session('error'))
            <div class="alert alert-dismissable alert-danger msg-feedback" style="position: absolute; top: 70px; z-index: 999; width: 98%">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong></strong> <span>{{ session('error') }}</span>
            </div>
        @endif
    </div>
</div>