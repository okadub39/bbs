@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('posts.update', $post->id) }}" method="POST">
            {{csrf_field()}}
            {{method_field('PATCH')}}
                <div class="form-group">
                    <label>タイトル</label>
                    <input type="text" class="form-control" value="{{ $post->title }}" name="title">
                </div>
                <div class="form-group">
                    <label>監督</label>
                    <input type="text" class="form-control" value="{{ $post->director }}" name="director">
                </div>
                <div class="form-group">
                    <label>出演</label>
                    <input type="text" class="form-control" value="{{ $post->actor }}" name="actor">
                </div>
                <div class="form-group">
                    <label>時間</label>
                    <input type="text" class="form-control" value="{{ $post->time }}" name="time">分
                </div>
                <div class="form-group">
                    <label>初回公開日</label>
                    <input type="text" class="form-control" value="{{ $post->release }}" name="release">
                </div>
                <div class="form-group">
                    <label>内容</label>
                    <textarea class="form-control" rows="5" name="body">{{ $post->body }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">更新する</button>
            </form>
        </div>
    </div>
</div>
@endsection