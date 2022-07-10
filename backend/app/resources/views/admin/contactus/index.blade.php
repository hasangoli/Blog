@extends('admin/layouts/app-dark')

@section('title', 'مدیریت تبلیغات')


@push('script')

    <script>$(document).ready(function () {
            $('#advertisements').DataTable({
                dom: 'Bfrtip',
                buttons: ['excelHtml5'],
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Persian.json',
                },
            });
        });</script>
    <script>


        function deleteItem(id) {

            swal.fire({
                title: 'آیا مطمئن هستید؟',
                text: "توجه! عملیات انجام شده قابل بازگشت نیستند.",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#dc3545',
                confirmButtonText: 'بله',
                cancelButtonText: 'خیر',
            }).then((result) => {
                if (result.value) {
                    document.getElementById('delete-item-' + id).submit();
                    swal.fire(
                        'موفق!',
                        'تغییرات با موفقیت انجام شد.',
                        'success',
                    );
                }
            })

        }

        function statusItem(id) {

            swal.fire({
                title: 'آیا مطمئن هستید؟',
                text: "توجه! عملیات انجام شده قابل بازگشت نیستند.",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#dc3545',
                confirmButtonText: 'بله',
                cancelButtonText: 'خیر',
            }).then((result) => {
                if (result.value) {
                    $(x).parent(' form ').submit();
                    swal.fire(
                        'موفق!',
                        'تغییرات با موفقیت انجام شد.',
                        'success',
                    );
                }
            })

        }

    </script>

@endpush


@section('styles')
@endsection



@section('contents')
    <div class="content">
        <div class="row px-3">
            <div class="col-md-12 py-3 card">

                <div class="card-body">
                    <div class="table-responsive">
                        <h4 class="title">type of message</h4>
                        <table id="advertisements" class="display" style="width:100%">
                            <thead class="text-primary primary-font">
                            <th class="text-center">ردیف</th>
                            <th class="text-center">نام</th>
                            <th class="text-center">نام خانوادگی</th>
                            <th class="text-center">شماره تماس</th>
                            <th class="text-center">مدیریت</th>
                            </thead>
                            <tbody class="secondary-font">
                            @forelse ($messages as $message)
                                <tr>
                                    <td class="text-center">{{$message->id}}</td>
                                    <td class="text-center">{{$message->name}}</td>
                                    <td class="text-center">{{$message->lastName}}</td>
                                    <td class="text-center">{{$message->phone}}</td>

                                    <td class="text-center">
                                        <a href="{{ route('admin.contactus.show',$message->id) }}"
                                           class="btn
                                           @if ($message->status == 1)
                                            btn-outline-success
                                           @else
                                            btn-outline-warning
                                           @endif
                                             btn-icon-text">
                                            <i class="fas fa-eye"></i>

                                            @if ($message->status == 1)
                                            show (Read)
                                           @else
                                            show (Unread)
                                           @endif

                                        </a>

                                        <form action="{{route('admin.contactus.destroy' , $message->id)}}?_method=DELETE" method="POST" id="delete-item-{{$message->id}}">
                                            @csrf
                                            @method('delete')
                                            <button type="button" class="btn btn-outline-danger btn-icon-text"
                                                    onclick="deleteItem({{ $message->id }})">
                                                <i class="fas fa-trash-alt"></i>
                                                delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                               
                            @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection








