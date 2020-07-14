@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header">
                <h5>タイトル：{{ $post->title }}</h5>
            </div>
            <div class="card-body">
                <p class="card-text">内容：{{ $post->body }}</p>
                <p>投稿日時：{{ $post->created_at }}</p>
                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">編集する</a>
            </div>
        </div>
    </div>
</div>
@endsection