@extends('layouts.app')
@section('content')
<?php $hobbies[] = $user->hobbies;
// print_r($hobbies)

?>

<div class="col-md-4 col-12 mx-auto rounded bg-light border p-3">
    @if($errors->any())
    @foreach($errors->all() as $error)
    <div class="alert alert-danger" role="alert"> {{ $error }}</div>
    @endforeach
    @endif
    <form action="{{isset($user)?route('user.update',$user->id):route('user.store')}}" method="post" enctype="multipart/form-data" id="form">
        @csrf
        @if(isset($user))
        @method('put')
        @endif
        <div class="form-group">
            <label for="name">User Name</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{$user->name??''}}" aria-describedby="name">
        </div>
        <label for="image">Image</label>
        <div class="custom-file mb-3 form-group">

            <input type="file" name="image" value="{{$user->image??''}}" class="custom-file-input @error('image') is-invalid @enderror" id="image">
            <label class="custom-file-label" for="image">{{$user->image??'Choose file...'}}</label>
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" name="email" value="{{$user->email??''}}" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="email">
        </div>
        @if(empty($user))
        <div class="form-group">
            <label for="Password">Password</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="Password">
        </div>
        @endif
        <div class="form-group form-check">
            <div class=" d-inline-block  ml-2">
                <input type="checkbox" class="form-check-input hobbies @error('hobbies[]') is-invalid @enderror" name="hobbies[]" value="dance" id="dance" @foreach($hobbies[0] as $hobbie) {{($hobbie=='dance')?'checked':''}} @endforeach>
                <label class="form-check-label" for="dance">Dance</label>
            </div>
            <div class="d-inline-block form-check ml-2">
                <input type="checkbox" class="form-check-input hobbies @error('hobbies[]') is-invalid @enderror" name="hobbies[]" value="yoga" id="yoga" @foreach($hobbies[0] as $hobbie) {{($hobbie=='yoga')?'checked':''}} @endforeach>
                <label class="form-check-label" for="yoga">Yoga</label>
            </div>
            <div class="d-inline-block form-check  ml-2">
                <input type="checkbox" class="form-check-input hobbies @error('hobbies[]') is-invalid @enderror" name="hobbies[]" value="cooking" id="cooking" @foreach($hobbies[0] as $hobbie) {{($hobbie=='cooking')?'checked':''}} @endforeach>
                <label class="form-check-label" for="cooking">Cooking</label>
            </div>
            <div class="d-inline-block form-check ml-2">
                <input type="checkbox" class="form-check-input hobbies @error('hobbies[]') is-invalid @enderror" name="hobbies[]" value="blogging" id="blogging" @foreach($hobbies[0] as $hobbie) {{($hobbie=='blogging')?'checked':''}} @endforeach>
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
                    required: true,
                    regex: '/^[a-zA-Z ]*$/'
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
                    regex: '/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/'
                }
            }
        });
    });
    // let hobbie[] = $('.hobbies').val();
    console.log(hobbie);
    // if ()
</script>
@endsection