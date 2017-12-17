@extends('layouts.app')

@section('css')
    <link rel="stylesheet" type="text/css" href={{ URL::asset('css/bootstrap.min.css') }}>
    <link rel="stylesheet" type="text/css" href={{ URL::asset('css/bootstrap-theme.min.css') }}>
    <link rel="stylesheet" type="text/css" href={{ URL::asset('css/bootstrap-datetimepicker.min.css') }}>
@endsection

@section('content')
    <div id="app_content" class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Новая категория</div>

                    <div class="panel-body">
                        {!! Html::ul($errors->all()) !!}

                        {!! Form::model($task, array('route' => array('tasks.update', $task->id), 'method' => 'PUT')) !!}

                        <div class="form-group">
                            {{ Form::label('topic', 'Категория') }}
                            {{ Form::select('topic', $topics, Input::old('topic'), array('class' => 'form-control')) }}
                        </div>

                        <div class="form-group">
                            {!! Form::label('title', 'Заголовок') !!}
                            {!! Form::text('title', Input::old('title'), array('class' => 'form-control')) !!}
                        </div>

                        <div class="form-group">
                            {{ Form::label('description', 'Описание') }}
                            {{ Form::text('description', Input::old('description'), array('class' => 'form-control')) }}
                        </div>


                        <div class="form-group">
                            {{ Form::label('datetime', 'Время и дата') }}
                            <div class='input-group date' id='datetimepicker2'>
                                {!! Form::text('date', $task->date, array('class' => 'form-control')) !!}
                                <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('periodical', 'Задача регулярная') }}
                            {{ Form::text('periodical', $task->periodical, array('class' => 'form-control')) }}
                        </div>

                        {!! Form::submit('Добавить', array('class' => 'btn btn-primary')) !!}

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script type="text/javascript" src={{ URL::asset('js/vue.js') }}></script>
    <script type="text/javascript" src={{ URL::asset('js/axios.min.js') }}></script>
    <script type="text/javascript" src={{ URL::asset('js/jquery.min.js') }}></script>
    {{--<script type="text/javascript" src={{ URL::asset('js/moment.min.js') }}></script>--}}
    <script type="text/javascript" src={{ URL::asset('js/moment-with-locales.js') }}></script>

    <script type="text/javascript" src={{ URL::asset('js/bootstrap.min.js') }}></script>
    <script type="text/javascript" src={{ URL::asset('js/bootstrap-datetimepicker.min.js') }}></script>
    <script type="text/javascript" src={{ URL::asset('js/ru.js') }}></script>

    <script type="text/javascript">
        var moment = moment();
        moment.lang = 'ru';
        $(function () {
            $('#datetimepicker2').datetimepicker({
                locale : 'ru',
                format: 'YYYY-MM-DD HH:mm'
            });
        });
    </script>
@endsection

@section('myscript')
    <script type="text/javascript" src={{ URL::asset('js/scripts.js') }}></script>
@endsection