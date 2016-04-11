@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Ucp</div>

                <div class="panel-body">
                    @if (Auth::user()->profile)
                        <h1>{{ Auth::user()->username }} <small>{{ Auth::user()->profile->location }}</small></h1>
                        <div class="bio">
                            <p>
                                {{ Auth::user()->profile->bio }}
                            </p>
                        </div>

                        <ul class="links">

                        </ul>

                        @if (Auth::user()->isCurrent())
                            {{ link_to_route('profile.edit', 'Edit Your Profile', Auth::user()->username) }}
                        @endif
                    @else
                        <p>No profile yet.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
