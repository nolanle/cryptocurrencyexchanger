@extends('layouts.fullapp')

@section('style')
    <!-- some CSS styling changes and overrides -->
    <style>
        .kv-avatar .krajee-default.file-preview-frame,.kv-avatar .krajee-default.file-preview-frame:hover {
            margin: 0;
            padding: 0;
            border: none;
            box-shadow: none;
            text-align: center;
        }
        .kv-avatar .file-input {
            display: table-cell;
            max-width: 220px;
        }
        .kv-reqd {
            color: red;
            font-family: monospace;
            font-weight: normal;
        }
    </style>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">Edit profile</a></li>
                <li class="active">{{ Auth::user()->name }}</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('danger'))
                <div class="alert alert-danger">
                    {{ session('danger') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>

    <div class="row">

        <div class="col-md-9 col-sm-9">

            <div class="row">
                <div class="col-md-7">
                    <div class="block block-drop-shadow">

                        <div class="header">
                            <h2>Edit profile</h2>
                        </div>

                        <form method="post" action="{{ url('profile-update') }}">
                            {{ csrf_field() }}
                            <div class="content controls">
                                <div class="form-row">
                                    <div class="col-md-3">E-mail:</div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" value="{{ Auth::user()->email }}" disabled/>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-3">Full name:</div>
                                    <div class="col-md-9">
                                        <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}"/>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-3">Nick name:</div>
                                    <div class="col-md-9">
                                        <input type="text" name="nickname" class="form-control" value="{{ Auth::user()->nickname }}"/>
                                    </div>
                                </div>

                            </div>



                            <div class="footer tar">
                                <button class="btn btn-default btn-clean">Confirm Change</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="block block-drop-shadow">

                        <div class="header">
                            <h2>Change password</h2>
                        </div>
                        <form method="post" action="{{ url('password-update') }}">
                            {{ csrf_field() }}
                            <div class="content controls">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <input type="password" name="old_password" class="form-control" placeholder="Old password" required/>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <input type="password" name="password" class="form-control" placeholder="New password" required/>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <input type="password" name="password_confirmation" class="form-control" placeholder="Re-password" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="footer tar">
                                <button class="btn btn-default btn-clean">Confirm Change</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="block block-drop-shadow">
                <div class="header">
                    <h2>List of Wallets</h2>
                </div>
                <div class="content">

                    <table cellpadding="0" cellspacing="0" width="100%" class="table table-bordered table-striped sortable">
                        <thead>
                        <tr>
                            <th><input type="checkbox" class="checkall"/></th>
                            <th width="25%">ID</th>
                            <th width="25%">Currency</th>
                            <th width="25%">Amount</th>
                            <th width="25%"></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($wallets as $wallet)
                            <tr>
                                <td><input type="checkbox" name="checkbox"/></td>
                                <td>{{ $wallet->id }}</td>
                                <td>{{ $wallet->currency()->name }}</td>
                                <td>{{ $wallet->amount }}</td>
                                <td></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

        </div>

        <div class="col-md-3 col-sm-3">

            <div class="block block-drop-shadow">
                <form action="{{ url('upload/avatar') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="head bg-dot30 npb">
                        <h2>Avatar</h2>
                        <div class="pull-right">
                            <button class="btn btn-default btn-clean">Save</button>
                        </div>
                    </div>
                    <div class="head bg-dot30 np tac">
                        <img src="{{ Auth::user()->avatar }}" class="img-thumbnail img-circle"/>
                    </div>
                    <div class="content controls">
                        <div class="form-row">

                                <div class="col-md-12">
                                    <div class="input-group file">
                                        <input type="file" name="avatar" required/>
                                        <span class="input-group-btn">
                                            <button class="btn" type="button">Browse</button>
                                        </span>
                                    </div>
                                </div>

                        </div>
                    </div>
                </form>
            </div>

            <div class="block block-drop-shadow">
                <div class="header">
                    <h2>Settings</h2>
                </div>
                <div class="content controls">
                    <div class="form-row">
                        <div class="col-md-6">Active:</div>
                        <div class="col-md-6">
                            <input type="checkbox" class="ibutton" checked="checked"/>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">Updating:</div>
                        <div class="col-md-6">
                            <input type="checkbox" class="ibutton"/>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">Notifications:</div>
                        <div class="col-md-6">
                            <input type="checkbox" class="ibutton" checked="checked"/>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">Quick upload:</div>
                        <div class="col-md-6">
                            <input type="checkbox" class="ibutton" checked="checked"/>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">Locations:</div>
                        <div class="col-md-6">
                            <input type="checkbox" class="ibutton" disabled="disabled"/>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">Items on page:</div>
                        <div class="col-md-6">
                            <input id="spinner" class="form-control" name="spinner" value="10"/>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection

@section('scripts')
    <script type='text/javascript' src='{{ asset('js/plugins/tagsinput/jquery.tagsinput.min.js') }}'></script>
    <script type='text/javascript' src='{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}'></script>
@endsection