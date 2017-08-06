@extends('layouts.email')

@section('content')
    <repeater>
        <layout label="Text only">
            <table class="w580" width="580" cellpadding="0" cellspacing="0" border="0">
                <tbody><tr>
                    <td class="w580" width="580">
                        <p align="left" class="article-title"><singleline label="Title">Dear {{ $user->email }},</singleline></p>
                        <div align="left" class="article-content">
                            <multiline label="Description">Your new account in {{ config('app.name') }} detail is:</multiline>
                            <br>
                            <multiline>
                                Email: <b>{{ $user->email }}</b><br>
                                Password: <b>{{ $password }}</b><br>
                                IP: <b>{{ $ip }}</b><br>
                            </multiline>
                            <br>
                            <multiline>
                                Thanks and Regard,<br>
                                {{ config('app.name') }}
                            </multiline>
                        </div>
                    </td>
                </tr>
                <tr><td class="w580" width="580" height="10"></td></tr>
                </tbody></table>
        </layout>
    </repeater>
@endsection