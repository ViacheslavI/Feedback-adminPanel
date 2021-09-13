@extends('layouts.app')

@section('title', 'Сообщения')

@section('content')
    <div class="row">
        <div class="col-lg-9 mx-auto">

            <h3>Сообщение № {{$UserFeedback->id}}</h3>
            <span>Тема: {{$UserFeedback->subject}} <b></b></span>
            <br/>
            <span>Сообщение: {{$UserFeedback->message}} <b></b></span>
            <br/>
            <span>Дата создания:{{$UserFeedback->created_at}} <b><time></time></b></span>

            <hr>

            <p class="mt-4"></p>
            @if ($UserFeedback->hasFile())
                <a href="{{Storage::url($UserFeedback->file)}}" class="btn btn-outline-dark mt-2" download="message #{{$UserFeedback->id}}">Скачать файл <i class="fas fa-file-download ml-2"></i></a>
            @endif
            <div class="btn-group-lg"  role="group">
                @if (! $UserFeedback->isViewed())
                    <div class="col-auto mx-2">
                        <form method="POST" action="{{ route('feedback.view', $UserFeedback) }}">

                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-success" >Отметить <i class="fas fa-check ml-2"></i></button>
                        </form>
                    </div>
                @endif
                <div class="col-auto mx-2">
                    <form method="POST" action="{{route('feedback.destroy',$UserFeedback)}}">
                        @csrf

                        <button type="submit" class="btn btn-outline-danger btn-danger" >Удалить <i class="fas fa-trash-alt ml-2"></i></button>
                    </form>
                </div>
                <div class="col-auto mx-2">
                    <a  href="{{route('feedbacks')}}" class="btn btn-default"> Вернуться назад к списку</a>
                </div>
            </div>

        </div>
    </div>
@endsection
