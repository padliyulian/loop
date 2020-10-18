@extends('layouts.public.app')

@section('content')
    @isset($post)
        <div class="row">
            <div class="col-12">
                @include('messages.success')
            </div>
            <div class="col-12">
                <h4>{{$post->title}}</h4>
                <div>post at {{\Carbon\Carbon::parse($post->created_at)->format('d/m/Y')}}</div>
                <div>post by {{$post->user->name}}, {{$post->user->email}}</div>
                <div class="my-3">{!!$post->content!!}</div>
                <a href="{{url('/post')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
    @endisset
@endsection
