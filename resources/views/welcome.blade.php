<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body id="top_page">
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Movie Reviews
                </div>
                <div class="comment">
                    <h4>映画レビューサイトについて</h4>
                    <p>映画の投稿やコメントを追加・閲覧したい場合はぜひ登録をしてください。</p>
                    <p>自分以外の人が新規追加した投稿は、編集・削除はできませんのでご了承ください。</p>
                </div>
                <div class="links">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/posts') }}" class="btn view">閲覧する</a>
                    @else
                        <a href="{{ route('login') }}" class="btn login">ログイン</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn register">登録</a>
                        @endif
                    @endauth
                @endif
                </div>
            </div>
        </div>
    </body>
</html>
