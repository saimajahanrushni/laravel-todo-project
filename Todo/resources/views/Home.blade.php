@extends('layouts.FrontedLayout')

@section("title", "- Add")

@section("content")
    <div class="col-lg-5 mx-auto">
        <div class="card mt-5">
            @if (session()->has("msg"))
                <p class="alert alert-success text-center">{{ session("msg")}}</p>
            @endif
            <div class="card-header bg-dark text-light">
                <h3 class="text-center">Add Todo</h3>
            </div>
            <div class="card-body">
            <form action="{{ route('todo.store')}}" method="post">
                    @csrf
                    <input type="text" name="title" value="{{ old('title')}}" class="form-control my-2" placeholder="Todo Title">
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <textarea name="detail" value="{{ old('detail')}}" class="form-control my-2" placeholder="Todo Detail"></textarea>
                    @error('detail')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="text" name="user" value="{{ old('user')}}" class="form-control my-2" placeholder="User">
                    @error('user')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <button class="btn btn-dark w-100 rounded-0">Store Todo</button>
                </form>
            </div>  
        </div>
    </div>
@endsection
