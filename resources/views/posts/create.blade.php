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
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
                <div class="form-group">
                    <label>タイトル</label>
                    <input type="text" class="form-control" placeholder="タイトルを入力して下さい" name="title">
                </div>
                <div class="form-group">
                    <label>監督</label>
                    <input type="text" class="form-control" placeholder="監督" name="director">
                </div>
                <div class="form-group">
                    <label>出演</label>
                    <input type="text" class="form-control" placeholder="出演" name="actor">
                </div>
                <div class="form-group">
                    <label>時間</label>
                    <input type="text" class="form-control" placeholder="時間" name="time">分
                </div>
                <div class="form-group">
                    <label>初回公開日</label>
                    <input type="text" class="form-control" placeholder="初回公開日" name="release">
                </div>
                <div class="form-group">
                    <label>内容</label>
                    <textarea class="form-control" placeholder="内容" rows="5" name="body"></textarea>
                </div>
                <div class="form-group">
                    <label for="image">画像</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                </div>
                <button type="submit" class="btn btn-primary">作成する</button>
            </form>
        </div>
    </div>
</div>
@endsection