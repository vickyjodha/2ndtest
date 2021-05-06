@extends('layouts.app')
@section('content')
<style>
    th,
    td {
        text-align: center;
    }

    img {
        height: 45px;
        width: 45px;
    }
</style>
<div class="col-md-10 col-12 mx-auto ">
    <div class="card">
        <div class="card-header">{{ __('User`s') }}
            <a href="{{route('user.create')}}" class="btn btn-primary btn-sm  float-right">
                <b class="h4">+</b> Add
            </a>
        </div>

        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Hobbies</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <th scope="row"><img src="{{asset('storage')}}/{{$user->image}}" class="rounded-circle" alt="..."></th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            {{$user->hobbies}}
                        </td>
                        <td>
                            <form action="{{ route('user.destroy',$user->id) }}" class="d-inline" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm  btn-danger">Delete</button>
                            </form>
                            <a href="{{route('user.edit',$user->id)}}" class="btn btn-sm btn-success ml-2">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection