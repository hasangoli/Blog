@extends('admin/layouts/app-dark')

@section('title', 'ثبت تبلیغ جدید')
@section('contents')
    <div class="container d-flex justify-content-center">
        <div class="card col-lg-6 px-3 py-4">
            <div class="panel-body">
                <div class="chat">
                    @foreach ($tickets as $ticket)
                        <div class="left clearfix">
                            <div class="chat-body clearfix text-right">
                                <div class="header d-flex flex-row justify-content-between">
                                    <div>
                                        <h4 class="d-inline">کاربر : </h4><strong
                                            class="primary-font">{{ $ticket->ticketable->name . ' ' . $ticket->ticketable->lastname }}</strong>
                                    </div>
                                    
                                </div>
                                <h3 class="h3">پیغام : </h3>
                                <p class="bg-white rounded text-dark p-2">
                                    {{ $ticket->message }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                    <a href="{{ route('admin.tickets.subticket.view', ['id' => $user_id]) }}"
                        class="btn btn-outline-warning btn-icon-text"><i
                            class="fas fa-pencil-alt"></i>
                        ارسال تیکت</a>
                </div>
            </div>
        </div>
    </div>
@endsection
