@extends('admin/layouts/app-dark')

@section('title', 'ثبت تبلیغ جدید')
@section('contents')
    <div class="container d-flex justify-content-center">
        <div class="card col-lg-6 px-3 py-4">
            <div class="panel-body">
                <div class="chat">
                    @foreach ($comments as $comment)
                        <div class="left clearfix">
                            <div class="chat-body clearfix text-right">
                                <div class="header d-flex flex-row justify-content-between">
                                    <div>
                                        <h4 class="d-inline">نام : </h4><strong
                                            class="primary-font">{{ $comment->author }}</strong>
                                    </div>
                                    <small class="pull-right text-muted">
                                        <span class="glyphicon glyphicon-time"></span>
                                        {{ $comment->created_at }}
                                    </small>
                                </div>
                                <h3 class="h3">پیغام : </h3>
                                <p class="bg-white rounded text-dark p-2">
                                    {{ $comment->message }}
                                </p>
                            </div>
                            <div class="flex-row-reverse d-flex">
                                {{ Form::open(['route' => 'admin.comments.changestatus', 'method' => 'post']) }}
                                <input type="text" name="comment_id" value="{{ $comment->id }}" hidden>
                                <input type="text" name="status" value="{!! $comment->status == 0 ? '1' : '0' !!}" hidden>
                                <input type="text" name="article_id" value="{{ $comment->commentable_id }}" hidden>
                                <input type="text" name="article_type" value="{{ $comment->commentable_type }}" hidden>
                                <button type="submit"
                                    class="btn btn-{!! $comment->status != 0 ? 'success' : 'danger' !!}">{!! $comment->status != 0 ? 'تایید شده' : 'منتظر تایید' !!}</button>
                                {{ Form::close() }}
                                {{ Form::open(['route' => 'admin.comments.replycomment.view', 'method' => 'post', 'class' => 'mx-2']) }}
                                <input type="text" name="comment_id" value="{{ $comment->id }}" hidden>
                                <input type="text" name="article_id" value="{{ $comment->commentable_id }}" hidden>
                                <input type="text" name="article_type" value="{{ $comment->commentable_type }}" hidden>
                                <button type="submit" class="btn btn-warning">ارسال جواب</button>
                                {{ Form::close() }}
                                {{ Form::open(['route' => 'admin.comments.delete', 'method' => 'post']) }}
                                <input type="text" name="comment_id" value="{{ $comment->id }}" hidden>
                                <input type="text" name="article_id" value="{{ $comment->commentable_id }}" hidden>
                                <input type="text" name="article_type" value="{{ $comment->commentable_type }}" hidden>
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('آیا مطمعن هستید?')">حذف</button>
                                {{ Form::close() }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
