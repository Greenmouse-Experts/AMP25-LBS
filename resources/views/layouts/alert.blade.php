@if($errors->any())
    @foreach($errors->all() as $error)
    <div class="col-12 mb-2">
        <div class="alert alert-danger alert-timeout alert-dismissible alert-alt fade show">
            <!-- <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
            </button> -->
            <strong>Error!</strong> {{$error}}!
        </div>
    </div>
    @endforeach
@endif

@if(session()->has('type'))
<div class="col-12 mb-2">
    <div class="alert alert-{{session()->get('type')}} alert-timeout alert-dismissible alert-alt fade show">
        <!-- <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close">
            <span><i class="mdi mdi-close"></i></span>
        </button> -->
        <strong>Success!</strong> {{session()->get('message')}}
    </div>
</div>
@endif