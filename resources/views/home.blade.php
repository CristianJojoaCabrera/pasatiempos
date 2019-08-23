@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Auth::user()->hasRole('admin'))
                @include('admin')
            @endif
            @if(Auth::user()->hasRole('user'))
                @include('user')
            @endif
        </div>
    </div>
</div>
@endsection
