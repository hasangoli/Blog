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
                    document.getElementById('status-item-' + id).submit();
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
                    document.getElementById('status-item-' + id).submit();
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
                <div class="card-header">
                    <h4 class="card-title"></h4>
                    <a href="{{ route('admin.galleries.create') }}" class="btn btn-outline-success btn-icon-text"><i
                            class="fas fa-plus-circle"></i> افزودن </a>
                </div>


                <div class="card-body">
                    <div class="table-responsive">
                        <table id="advertisements" class="display" style="width:100%">
                            <thead class="text-primary primary-font">
                            <th class="text-center">ردیف</th>
                            <th class="text-center">عنوان</th>
                            <th class="text-center">slug</th>
                            <th class="text-center">نوع</th>
                            <th class="text-center">مدیریت</th>
                            </thead>
                            <tbody class="secondary-font">
                            @forelse ($galleries as $gallery)
                                <tr>
                                    <td class="text-center">{{$gallery->id}}</td>
                                    <td class="text-center">{{$gallery->title}}</td>
                                    <td class="text-center">{{$gallery->slug}}</td>
                                    <td class="text-center">

                                        @switch($gallery->type)
                                            @case('yellowCard')
                                                کارت زرد
                                                @break

                                            @case('greenCard')
                                                کارت سبز
                                                @break

                                            @case('BritainInTheMirrorOfHistory')
                                                بریتانیا در آیینه تاریخ
                                                @break

                                            @case('interview')
                                                مصاحبه
                                                @break

                                            @case('pictures')
                                                تصاویر
                                                @break

                                        @endswitch

                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.galleries.edit',$gallery->id) }}"
                                           class="btn btn-outline-warning btn-icon-text">
                                            <i class="fas fa-pencil-alt"></i>
                                            ویرایش
                                        </a>

                                        <form action="{{route('admin.galleries.destroy' , $gallery->id)}}?_method=DELETE"
                                              method="POST" id="delete-item-{{$gallery->id}}">
                                            @csrf
                                            @method('delete')
                                            <button type="button" class="btn btn-outline-danger btn-icon-text"
                                                    onclick="deleteItem({{ $gallery->id  }})">
                                                <i class="fas fa-trash-alt"></i>
                                                حذف
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








