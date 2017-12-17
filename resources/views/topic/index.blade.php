@extends('layouts.app')

@section('javascript')
    <script type="text/javascript" src={{ URL::asset('js/vue.js') }}></script>
    <script type="text/javascript" src={{ URL::asset('js/axios.min.js') }}></script>
@endsection

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
                            <button class="btn btn-success pull-right">
                                + Добавить
                            </button>
                        </a>
                        <div class="clearfix">

                        </div>
                    </div>
                        <table class="table table-striped table-bordered">
                            <tbody>
                                @foreach($topics as $key => $value)
                                    <tr>
                                        <td >{{ $value->name }}</td>
                                        <td >
                                            {{ Form::open(array('url' => 'topics/' . $value->id, 'class' => 'pull-right')) }}
                                                {{ Form::hidden('_method', 'DELETE') }}
                                                {{ Form::submit('Удалить', array('class' => 'btn btn-warning')) }}
                                            {{ Form::close() }}

                                            <a class="btn btn-small btn-info" href="{{ URL::to('topics/' . $value->id . '/edit') }}">Редактировать</a>
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



@section('myscript')
    <script type="text/javascript" src={{ URL::asset('js/scripts.js') }}></script>


@endsection
