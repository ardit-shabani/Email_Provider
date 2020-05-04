@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center bg-info text-white text-center font-weight-bold ">Scheduled Mails</div>

                <div class="card mt-5">
                    <div class="card-body">
                        <table class="table" >
                            <thead class="bg-danger">
                            <tr>
                                <th>Subject</th>
                                <th>Receivers</th>
                                <th>Scheduled</th>

                            </tr>
                            </thead>
                            <tbody class="bg-primary text-white">
                            @foreach($mails as $mail)
                                <tr>
                                    <td>{{$mail->subject}}</td>
                                    <td>{{count(json_decode($mail->to))}}</td>
                                    <td>{{$mail->scheduled_at}}</td>
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


