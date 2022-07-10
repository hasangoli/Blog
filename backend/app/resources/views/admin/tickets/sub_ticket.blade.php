@extends('admin/layouts/app-dark')

@section('title', 'ثبت تبلیغ جدید')
@section('contents')
    <div class="container d-flex justify-content-center">
        <div class="card col-lg-6 px-3 py-4">
            {{ Form::open(['route' => 'admin.tickets.store', 'method' => 'post']) }}
            <div class="form-group">
                <label for="ansinput1">عنوان تیکت شما</label>
                <input type="text" class="form-control" name="title" id="ansinputarea1" value=" @if($ticket) {{$ticket->title}} @endif">
            </div>
            <div class="form-group">
                <label for="ansTextarea1">متن تیکت شما</label>
                <textarea class="form-control" name="message" id="ansTextarea1" rows="8">@if($ticket) {{$ticket->message}} @endif</textarea>
            </div>
            <input type="text" name="ads_id" value="{{ $adsId }}" hidden>
            <input type="text" name="user_id" value="{{ $userId }}" hidden>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">ثبت تیکت</button>
            </div>
            {{ Form::close() }}
        </div>
    @endsection
