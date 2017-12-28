@extends('layouts.app')



@section('css')
    <link rel="stylesheet" type="text/css" href={{ URL::asset('css/bootstrap.min.css') }}>
    <link rel="stylesheet" type="text/css" href={{ URL::asset('css/bootstrap-theme.min.css') }}>
@endsection

@section('content')
    <div id="app_content" class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default custom-table">
                    <div class="panel-heading">
                        <h4 class="pull-left">
                            Категории
                        </h4>
                        <a href="/topics/create">
                            <button class="btn btn-success pull-right glyphicon glyphicon-plus">
                            </button>
                        </a>
                        <div class="clearfix">

                        </div>
                    </div>
                        <table class="table table-striped table-bordered">
                            <tbody>
                                @foreach($topics as $key => $value)
                                    <tr>
                                        <td>{{ $value->name }}</td>
                                        <td>
                                            <div class="row">

                                                <form action="{{URL::to('topics/' . $value->id . '/edit')}}" method="get" class="col-md-4 col-md-offset-1">
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-small btn-info glyphicon glyphicon-edit" ></button>
                                                </form>

                                                {{--<a class="btn btn-small btn-info col-md-4 col-md-offset-1  glyphicon glyphicon-edit" href="{{ URL::to('topics/' . $value->id . '/edit') }}"></a>--}}

                                                {{ Form::open(array('url' => 'topics/' . $value->id, 'class' => 'pull-right col-md-4 col-md-offset-1')) }}
                                                    {{ Form::hidden('_method', 'DELETE') }}
                                                    <button type="submit" class="btn btn-danger glyphicon glyphicon-remove" ></button>
                                                {{ Form::close() }}

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script type="text/javascript" src={{ URL::asset('js/vue.js') }}></script>
    <script type="text/javascript" src={{ URL::asset('js/axios.min.js') }}></script>
@endsection

@section('myscript')
    <script type="text/javascript" src={{ URL::asset('js/scripts.js') }}></script>
@endsection
