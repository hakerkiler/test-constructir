@extends('master')
@section('content')
    @if ($errors->has())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
    @endif
    <form class="form-horizontal col-md-4" action="{{ route('register.post') }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="text" name="email" class="form-control" placeholder="Introdu emailu">
        </div>
        <div class="form-group">
            <label for="email">Parola</label>
            <input type="text" name="password" class="form-control" placeholder="Introdu parola">
        </div>
        <div class="form-group">
            <input type="submit" class="form-control" placeholder="Intra">
        </div>
    </form>
    <div class="clearfix"></div>
@endsection