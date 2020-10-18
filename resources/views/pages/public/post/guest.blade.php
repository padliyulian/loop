@extends('layouts.public.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h4>Comment by Guest</h4>
        </div>
        <div class="col-12 my-3">
            @isset($comments)
                @foreach ($comments as $comment)
                    <div class="mb-4">
                        <h5>{{$comment->name}}</h5>
                        <div>{{$comment->email}}</div>
                        <div>{{$comment->comment}}</div>
                        <hr>
                    </div>
                @endforeach
            @endisset
        </div>
        <div class="col-12">
            {{ $comments->links() }}
        </div>
    </div>
@endsection
