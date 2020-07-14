@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>投稿一覧</h2>
            <div class="card text-left">
                @foreach ($posts as $post)
                <div class="row card-body">
                    <div class="col-md-8">
                        <h5 class="card-title">タイトル：{{ $post->title }}</h5>
                        <p class="card-text">内容：{{ $post->body }}</p>
                        @if ($post->image_path)
                            <img src="{{ $post->image_path }}" alt="画像">
                        @endif
                        <p class="card-text">投稿者：{{ $post->user->name }}</p>
                        <div class="text-muted col-md-12" style="padding:0px;">
                            投稿日時：{{ $post->created_at }}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="justify-content-center">
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary col-md-12" style="min-width:160px; max-width:160px;">詳細へ</a>
                            @if($post->users()->where('user_id', Auth::id())->exists())
                                <div class="col-md-12 text-center" style="padding:0px; margin:10px 0;">
                                    <form action="{{ route('unfavorites', $post) }}" method="POST">
                                    @csrf
                                        <input type="submit" value="&#xf164;いいね取り消す" class="fas btn btn-danger" style="width:160px;">
                                    </form>
                                </div>
                            @else
                                <div class="col-md-12 text-center" style="padding:0px; margin:10px 0;">
                                    <form action="{{ route('favorites', $post) }}" method="POST">
                                    @csrf
                                        <input type="submit" value="&#xf164;いいね" class="fas btn btn-success" style="width:160px;">
                                    </form>
                                </div>
                            @endif
                            <div class="text-center col-md-12">
                                <p>いいね数：{{ $post->users()->count() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-2 text-center" style="padding-top:50px;">
            <a href="{{ route('posts.create') }}" class="btn btn-primary">新規投稿</a>
        </div>
    </div>
</div>
@endsection