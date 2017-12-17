@extends('layouts.app')

@section('css')
    <link rel="stylesheet" type="text/css" href={{ URL::asset('css/bootstrap.min.css') }}>
    <link rel="stylesheet" type="text/css" href={{ URL::asset('css/bootstrap-theme.min.css') }}>
@endsection

@section('content')
    <div id="app_content" class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Новая категория</div>

                    <div class="panel-body">
                        {!! Html::ul($errors->all()) !!}

                        {!! Form::model($topic, array('route' => array('topics.update', $topic->id), 'method' => 'PUT')) !!}

                        <div class="form-group">
                            {!! Form::label('name', 'Name') !!}
                            {!! Form::text('name', null, array('class' => 'form-control')) !!}
                        </div>

                        {!! Form::submit('Сохранить', array('class' => 'btn btn-primary')) !!}

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
@endsection

@section('myscript')
    <script type="text/javascript" src={{ URL::asset('js/scripts.js') }}></script>
@endsection