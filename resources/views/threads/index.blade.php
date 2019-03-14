@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Forum</div>


                @foreach($threads as $thread)

                <div class="card-body">
                    <article>
                        <div class="level">

                            <h3 class="flex">
                                <a href="{{$thread->path()}}">{{ $thread->title }}</a>
                            </h3>

                            <strong>{{$thread->replies_count}} {{str_plural('Reply', $thread->replies_count)}}</strong>
                        </div>
                        
                        <p>{{ $thread->body }}</p>
                        <hr>
                    </article>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection
