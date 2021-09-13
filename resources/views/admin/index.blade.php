@extends('layouts.app')
@section('content')
    <div class="col-md-12">
        <h1>Messages</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    #
                </th>
                <th>
                    Subject
                </th>
                <th>
                    File
                </th>
                <th>
                    Date Created
                </th>
                <th>
                    Actions
                </th>
            </tr>
            @foreach($feedbacks as $feedback)
                <tr>
                    <td>{{$feedback->id}}</td>
                    <td>{{$feedback->subject}}</td>
                    <td>{{$feedback->file}}</td>
                    <td>{{$feedback->created_at->format('H:i d/m/y')}}</td>
                    <td>
                        <form method="POST" action="{{route('user.message',$feedback)}}">
                        <div class="btn-group" role="group">
                            <a class="btn btn-success" type="button" href="{{route('user.message',$feedback)}}"

                            >Open</a>
                        </div>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

