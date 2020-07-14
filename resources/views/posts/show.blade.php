@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header">
                <h5>タイトル：{{ $post->title }}</h5>
            </div>
            <div class="card-body row">
                <div class="col-md-8">
                    <p>投稿日時：{{ $post->created_at }}</p>
                    <p>投稿者：{{ $post->user->name }}</p>
                    @if ($post->image_path)
                        <img src="{{ $post->image_path }}" alt="画像">
                    @endif
                    <p class="card-text">内容：{{ $post->body }}</p>
                </div>
                <div class="col-md-3">
                    <div class="col-md-12" style="margin-bottom:10px;">
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">
                            編集する
                        </a>
                    </div>
                    <div class="col-md-12" style="margin-bottom:10px;">
                        <form action='{{ route('posts.destroy', $post->id) }}' method='post'>
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input type='submit' value='削除' class="btn btn-delete" onclick='return confirm("削除しますか？");'>
                        </form>
                    </div>
                    <div class="col-md-12 justify-content-center" style="margin-bottom:10px;">
                        @if($post->users()->where('user_id', Auth::id())->exists())
                            <form action="{{ route('unfavorites', $post) }}" method="POST">
                            @csrf
                                <input type="submit" value="&#xf164;いいね取り消す" class="fas btn btn-danger">
                            </form>
                        @else
                            <form action="{{ route('favorites', $post) }}" method="POST">
                            @csrf
                                <input type="submit" value="&#xf164;いいね" class="fas btn btn-success">
                            </form>
                        @endif
                        <p>いいね数：{{ $post->users()->count() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('comments.store') }}" method="POST">
            {{csrf_field()}}
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <div class="form-group">
                    <label>コメント</label>
                    <textarea class="form-control" placeholder="内容" rows="5" name="body"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">コメントする</button>
            </form>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($post->comments as $comment)
            <div class="card mt-3">
                <h5 class="card-header">投稿者：{{ $comment->user->name }}</h5>
                <div class="card-body">
                    <h5 class="card-title">投稿日時：{{ $comment->created_at }}</h5>
                    <p class="card-text">内容：{{ $comment->body }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
