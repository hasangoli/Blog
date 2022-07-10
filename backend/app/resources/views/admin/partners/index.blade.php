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

    </script>

@endpush

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
</script>
@section('styles')
@endsection
<style>
.imageTable{
  width: 100px !important ;
  height: 66px !important ;
}
</style>


@section('contents')
    <div class="content">
        <div class="row px-3">
            <div class="col-md-12 py-3 card">
                <div class="card-header">
                    <h4 class="card-title"></h4>
                    <a href="{{ route('admin.partners.create') }}" class="btn btn-outline-success btn-icon-text"><i
                            class="fas fa-plus-circle"></i> افزودن </a>
                </div>


                <div class="card-body">
                    <div class="table-responsive">
                        <table id="advertisements" class="display" style="width:100%">
                            <thead class="text-primary primary-font">
                            <th class="text-center">ردیف</th>
                            <th class="text-center">لوگو</th>
                            <th class="text-center">عنوان</th>
                            <th class="text-center">آی دی پیج</th>
                            <th class="text-center">لینک</th>
                            <th class="text-center">مدیریت</th>
                            </thead>
                            <tbody class="secondary-font">
                            @forelse ($partners as $partner)
                                <tr>
                                    <td class="text-center">{{$partner->id}}</td>
                                    <td class="text-center">
                                        <img src="{{ asset('storage/partners/'.$partner->image->title)}}" class="imageTable">
                                    </td>
                                    <td class="text-center">
                                        {{ $partner->title }}
                                    </td>
                                    </td>
                                    <td class="text-center">
                                        {{ $partner->name_page }}
                                    </td>
                                    <td class="text-center">
                                    {{$partner->url}}
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.partners.edit',$partner->id) }}"
                                           class="btn btn-outline-warning btn-icon-text">
                                            <i class="fas fa-pencil-alt"></i>
                                            ویرایش
                                        </a>

                                        <form action="{{route('admin.partners.destroy' , $partner->id)}}?_method=DELETE"
                                              method="POST" id="delete-item-{{$partner->id}}">
                                            @csrf
                                            @method('delete')
                                            <button type="button" class="btn btn-outline-danger btn-icon-text"
                                                    onclick="deleteItem({{ $partner->id  }})">
                                                <i class="fas fa-trash-alt"></i>
                                                حذف
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <p class="alert alert-info text-center" style="margin-top: 10rem">محتوایی یافت نشد</p>
                            @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection








