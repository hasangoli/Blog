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
                <div class="card-header">
                    <h4 class="card-title"></h4>
                    <a href="{{ route('admin.categories.create' , $model) }}"
                       class="btn btn-outline-success btn-icon-text"><i
                            class="fas fa-plus-circle"></i> افزودن </a>
                </div>


                <div class="card-body">
                    <div class="table-responsive">
                        <h4 class="title"></h4>
                        <table id="advertisements" class="display" style="width:100%">
                            <thead class="text-primary primary-font">
                            <th class="text-center">ردیف</th>
                            <th class="text-center">عنوان</th>
                            @if ($model=='article')
                            <th class="text-center">نوع</th>
                            @endif
                            <th class="text-center">مدیریت</th>
                            </thead>
                            <tbody class="secondary-font">
                            @forelse ($categories as $category)
                                <tr>
                                    <td class="text-center">{{$category->id}}</td>
                                    <td class="text-center">{{$category->title}}</td>
                                    @if ($model=='article')
                                    <td class="text-center">
                                        @switch ($category->type)
                                            @case ('news')
                                                اخبار
                                                @break

                                            @case ('rules')
                                                قوانین بریتانیا
                                                @break

                                            @case ('asylum')
                                                مهاجرت و پناهندگی
                                                @break

                                            @case ('covid')
                                                کوید 19
                                                @break
                                        @endswitch
                                    </td>
                                    @endif
                                    <td class="text-center">
                                        <a href="{{ route('admin.categories.edit',['category'=>$category->id,'model'=>$model]) }}"
                                           class="btn btn-outline-warning btn-icon-text">
                                            <i class="fas fa-pencil-alt"></i>
                                            ویرایش
                                        </a>

                                        <form action="{{route('admin.categories.destroy' , $category->id)}}?_method=DELETE" method="POST" id="delete-item-{{$category->id}}">
                                            @csrf
                                            @method('delete')
                                            <button type="button" class="btn btn-outline-danger btn-icon-text"
                                                    onclick="deleteItem({{ $category->id }})">
                                                <i class="fas fa-trash-alt"></i>
                                                حدف
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








