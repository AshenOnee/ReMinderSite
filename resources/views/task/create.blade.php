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
                    <div class="panel-heading">Новая задача</div>

                    <div class="panel-body">

                        {!! Html::ul($errors->all()) !!}

                        {!! Form::open(array('url' => 'tasks')) !!}

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
                            {{ Form::label('date', 'Время и дата') }}
                            <div class='input-group date' id='datetimepicker2'>
                                {!! Form::text('date', null, array('class' => 'form-control')) !!}
                                <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('periodical', 'Задача регулярная') }}
                            {{ Form::checkbox('periodical', null, false, array('class' => 'form-check-input', 'id' => 'periodical')) }}
                        </div>


                        <div class="form-group" id="period">
                            {{ Form::label('period', 'Повторять каждые') }}

                            <div class="input-group">
                                  <span class="input-group-btn">
                                      <button type="button" class="btn btn-danger btn-number"  data-type="minus" data-field="quant">
                                        <span class="glyphicon glyphicon-minus"></span>
                                      </button>
                                  </span>
                                    {{Form::text('quant', 1, array('class' => 'form-control input-number', 'value' => '1', 'min' => '1', 'max' => '100'))}}
                                    <span class="input-group-btn">
                                      <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quant">
                                          <span class="glyphicon glyphicon-plus"></span>
                                      </button>
                                    </span>
                                    {{Form::select('minuts', array('1' => 'Минуты', '60' => 'Часа', '1440' => 'Дня', '10080' => 'Недели'), null, array('class' => 'form-control'))}}
                            </div>
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

    {{--<script type="text/javascript" src={{ URL::asset('js/bootstrap.min.js') }}></script>--}}
    <script type="text/javascript" src={{ URL::asset('js/bootstrap-datetimepicker.min.js') }}></script>
    <script type="text/javascript" src={{ URL::asset('js/ru.js') }}></script>



@endsection

@section('myscript')
    <script type="text/javascript" src={{ URL::asset('js/scripts.js') }}></script>
@endsection