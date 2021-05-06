@extends('layouts.app')
@section('content')

<div class="col-md-4 col-12 mx-auto rounded bg-light border p-3">
    @if($errors->any())
    @foreach($errors->all() as $error)
    <div class="alert alert-danger" role="alert"> {{ $error }}</div>
    @endforeach
    @endif
    <form action="{{isset($user)?route('user.update',$user->id):route('user.store')}}" method="post" enctype="multipart/form-data" id="form">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">User Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{$user->name??''}}" aria-describedby="name">
        </div>
        <div class="custom-file my-3">
            <input type="file" name="image" value="{{$user->image??''}}" class="custom-file-input" id="image">
            <label class="custom-file-label" for="image">{{$user->image??'Choose file...'}}</label>
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" name="email" value="{{$user->email??''}}" class="form-control" id="email" aria-describedby="email">
        </div>
        @if(empty($user))
        <div class="form-group">
            <label for="Password">Password</label>
            <input type="password" name="password" class="form-control" id="Password">
        </div>
        @endif
        <div class="form-group form-check">
            <div class=" d-inline-block  ml-2">
                <input type="checkbox" class="form-check-input hobbies" name="hobbies[]" value="dance" id="dance">
                <label class="form-check-label" for="dance">Dance</label>
            </div>
            <div class="d-inline-block form-check ml-2">
                <input type="checkbox" class="form-check-input hobbies" name="hobbies[]" value="yoga" id="yoga">
                <label class="form-check-label" for="yoga">Yoga</label>
            </div>
            <div class="d-inline-block form-check  ml-2">
                <input type="checkbox" class="form-check-input hobbies" name="hobbies[]" value="cooking" id="cooking">
                <label class="form-check-label" for="cooking">Cooking</label>
            </div>
            <div class="d-inline-block form-check ml-2">
                <input type="checkbox" class="form-check-input hobbies" name="hobbies[]" value="blogging" id="blogging">
                <label class="form-check-label" for="blogging">Blogging</label>
            </div>
        </div>
        <button type="submit" value="submit" class="btn btn-primary">Submit</button>
        <a href="{{route('user.index')}}" class="btn btn-success">Back</a>
    </form>
</div>
<script>
    $(document).ready(function() {


        $('#form').validate({ // initialize the plugin
            rules: {
                name: {
                    required: true
                },
                image: {
                    required: true,
                    extension: "jpeg|png"
                },
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 8,
                    maxlength: 16,
                }
            }
        });
    });
    // let hobbie[] = $('.hobbies').val();
    console.log(hobbie);
    // if ()
</script>
@endsection