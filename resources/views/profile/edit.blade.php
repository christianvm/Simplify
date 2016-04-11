@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update profile</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('profile.edit') }}">
                        @if(Session::has('info'))
                            <div class="alert">
                                {{ Session::get('info') }}
                            </div>
                        @endif
                        <div class="form-group {{ $errors->has('name') ? ' has-error': '' }}">
                            <label class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ Request::old('name') ?: Auth::user()->name }}">

                                @if($errors->has('name'))
                                    <span class="help-block"> {{ $errors->first('name') }} </span>
                                @endif

                            </div>

                            <label class="col-md-4 control-label">Location</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="location" value="{{ Request::old('location') ?: Auth::user()->profile->location }}">

                                @if($errors->has('location'))
                                    <span class="help-block"> {{ $errors->first('location') }} </span>
                                @endif

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Update
                                </button>
                            </div>
                        </div>
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
