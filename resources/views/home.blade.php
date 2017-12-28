@extends('layouts.app')

@section('css')
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Pacifico', sans-serif;
            font-weight: 100;
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
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }


    </style>
@endsection

@section('content')
<div class="container">
    <div class="row">
        {{--<div class="col-md-8 col-md-offset-2">--}}
            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">Dashboard</div>--}}

                {{--<div class="panel-body">--}}
                    {{--@if (session('status'))--}}
                        {{--<div class="alert alert-success">--}}
                            {{--{{ session('status') }}--}}
                        {{--</div>--}}
                    {{--@endif--}}
                    {{----}}
                    {{--You are logged in!--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

        <div class="content">
            {{--<div class="title m-b-md">--}}
                {{--ReMinder--}}
            {{--</div>--}}

            <div class="links">
                {{--<a href="/tasks/">Мои задачи</a>--}}
                {{--<a href="/topics/">Мои категории</a>--}}

                {{--<a href="https://laracasts.com">Laracasts</a>--}}
                {{--<a href="https://laravel-news.com">News</a>--}}
                {{--<a href="https://forge.laravel.com">Forge</a>--}}
                {{--<a href="https://github.com/laravel/laravel">GitHub</a>--}}
            </div>
            <div class="embed-responsive embed-responsive-16by9">
                <img src="https://memegenerator.net/img/instances/500x/12552244/-.jpg">
                {{--<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/Qhh0igzqtqY?rel=0" allowfullscreen></iframe>--}}
            </div>
        </div>
    </div>
</div>
@endsection
