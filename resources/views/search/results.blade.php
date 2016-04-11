@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Search result for : {{ Request::input('query') }}</div>

                @if (!$users->count())
                <div class="panel-body">

                    No data found !
                    
                </div>
                @else
                <div class="panel-body">

                    @foreach ($users as $user)
                        @include('user/partials/userblock')
                    @endforeach

                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
