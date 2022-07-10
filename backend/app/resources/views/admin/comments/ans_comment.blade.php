@extends('admin/layouts/app-dark')

@section('title', 'ثبت تبلیغ جدید')
@section('contents')
    <div class="container d-flex justify-content-center">
        <div class="card col-lg-6 px-3 py-4">
            {{ Form::open(['route' => 'admin.comments.replycomment.store', 'method' => 'post']) }}
            <div class="form-group d-flex flex-column align-items-start">
                <h4 class="h4 mb-2">متن پیغام</h4>
                <p class="text-right">{{ $comment_message }}</p>
            </div>
            <div class="form-group">
                <label for="ansTextarea1">متن پیغام شما</label>
                <textarea class="form-control" name="message" id="ansTextarea1" rows="8"></textarea>
            </div>
            <input type="text" name="parent_id" value="{{ $comment_id }}" hidden>
            <input type="text" name="article_id" value="{{ $article_id }}" hidden>
            <input type="text" name="article_type" value="{{ $article_type }}" hidden>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">ثبت پیام</button>
            </div>
            {{ Form::close() }}
        </div>
    @endsection
