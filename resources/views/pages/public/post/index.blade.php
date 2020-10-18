@extends('layouts.public.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h4>Post List</h4>
        </div>
        <div class="col-12 my-3">
            @isset($posts)
                @foreach ($posts as $post)
                    <div>
                        <h5><a href="{{url('/post/'.$post->id)}}">{{$post->title}}</a></h5>
                        <div>{!!$post->content!!}</div>
                        <hr>
                    </div>
                @endforeach
            @endisset
        </div>
        <div class="col-12">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
