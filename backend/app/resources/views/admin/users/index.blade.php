@extends('admin/layouts/app-dark')

@section('title', 'صفحه داشبورد')


@section('scripts')

    <script>
        $(document).ready(function() {
            $('#users').DataTable({
                dom: 'Bfrtip',
                buttons: ['excelHtml5'],
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Persian.json',
                },
            });
        });
    </script>


    <script>
        function blockItem(id) {

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
                    document.getElementById('block-item-' + id).submit();
                    swal.fire(
                        'موفق!',
                        'تغییرات با موفقیت انجام شد.',
                        'success',
                    );
                }
            })
        }
    </script>



@endsection


@section('styles')

@endsection


@section('contents')
    <div class="content">
        <div class="row px-3">
            <div class="col-md-12 py-3 card">
                <div class="card-header">
                    <h4 class="card-title">کابران</h4>
                </div>
                <div class="search-card">

                </div>

                <div class="card-body">
                    <div class="table-responsive">

                        <table id="users" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ردیف</th>
                                    <th>عکس</th>
                                    <th>نام </th>
                                    <th>شماره تماس</th>
                                    <th>ایمیل</th>
                                    <th>وضعیت کاربر</th>
                                    <th>مدیریت</th>
                                </tr>
                            </thead>
                            <tbody style="text-align:center">
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id + 1 }}</td>
                                        @if($user->image)
                                            <td><img width=100 height=100 src="{{ asset('storage/users/' . $user->image->title) }}" alt=""></td>
                                            @else
                                            <td>
                                                <img width=100 height=100 src="{{ asset('storage/users/default.png') }}" alt="">
                                            </td>
                                        @endif
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            {{ Form::open(['route' => 'admin.users.changestatus', 'method' => 'post']) }}
                                            <input type="text" name="user_id" value="{{ $user->id }}" hidden>
                                            <input type="text" name="status" value="{!! $user->status == 0 ? '1' : '0' !!}" hidden>
                                            <button type="submit"
                                                class="btn btn-{!! $user->status != 0 ? 'success' : 'danger' !!}">{!! $user->status != 0 ? 'فعال' : 'مسدود' !!}</button>
                                            {{ Form::close() }}
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.users.edit', $user->id) }}"
                                                class="btn btn-outline-warning btn-icon-text">
                                                <i class="fas fa-pencil-alt"></i>
                                                ویرایش
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>



                    @endsection
