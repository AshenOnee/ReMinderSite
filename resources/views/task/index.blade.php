@extends('layouts.app')



@section('css')
    <link rel="stylesheet" type="text/css" href={{ URL::asset('css/bootstrap.min.css') }}>
    <link rel="stylesheet" type="text/css" href={{ URL::asset('css/bootstrap-theme.min.css') }}>

    {{--<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootswatch/4.0.0-beta.2/sketchy/bootstrap.min.css">--}}
@endsection

@section('content')
    <div id="app_content" class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default custom-table">
                    <div class="panel-heading">
                        <h4 class="pull-left">
                            Задачи
                        </h4>
                        <a href="/tasks/create">
                            <button class="btn btn-success pull-right glyphicon glyphicon-plus">
                            </button>
                        </a>
                        <div class="clearfix">

                        </div>
                    </div>
                    <table class="table table-striped table-bordered">
                        <tbody>
                        {{--@foreach($tasks as $key => $value)--}}
                            {{--<tr>--}}
                                {{--<td>{{ $value->title }}</td>--}}
                                {{--<td>{{ $value->topic->name }}</td>--}}
                                {{--<td>--}}
                                    {{--{{ $value->date }}--}}
                                    {{--{{ date('d-m-Y H:i', $value->date/1000) }}--}}
                                {{--</td>--}}

                                {{--<td>--}}
                                    {{--{{ Form::open(array('url' => 'tasks/' . $value->id, 'class' => 'pull-right')) }}--}}
                                    {{--{{ Form::hidden('_method', 'DELETE') }}--}}
                                    {{--{{ Form::submit('Удалить', array('class' => 'btn btn-warning')) }}--}}
                                    {{--{{ Form::close() }}--}}

                                    {{--<a class="btn btn-small btn-info" href="{{ URL::to('tasks/' . $value->id . '/edit') }}">Редактировать</a>--}}
                                {{--</td>--}}
                            {{--</tr>--}}
                        {{--@endforeach--}}


                            <tr v-for="value in tasks">
                                <td>@{{ value.title }}</td>
                                <td>@{{ value.topic.name }}</td>
                                <td>
                                    @{{ format(value.date) }}
                                </td>

                                <td>
                                    <div class="row">

                                        <form v-bind:action="editPath(value.id)" method="get" class="col-md-4 col-md-offset-1">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-small btn-info glyphicon glyphicon-edit" ></button>
                                        </form>

                                        <form v-bind:action="deletePath(value.id)" class="col-md-4 col-md-offset-1" method="post">
                                            {{ csrf_field() }}
                                            <input hidden name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger glyphicon glyphicon-remove" ></button>
                                        </form>

                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('javascript')
    <script type="text/javascript" src={{ URL::asset('js/moment-with-locales.js') }}></script>

    <script type="text/javascript" src={{ URL::asset('js/vue.js') }}></script>
    <script type="text/javascript" src={{ URL::asset('js/axios.min.js') }}></script>
    <script type="text/javascript">
        window.tasks = <?=json_encode($tasks);?>;
    </script>
@endsection

@section('myscript')
    <script type="text/javascript" src={{ URL::asset('js/task/index.js') }}></script>
@endsection
