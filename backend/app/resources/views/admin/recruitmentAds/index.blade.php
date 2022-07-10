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


@section('styles')
@endsection


@section('contents')
    <div class="content">
        <div class="row px-3">
            <div class="col-md-12 py-3 card">
                <div class="card-header">
                    <h4 class="card-title"></h4>
                    <a href="{{ route('admin.recruitmentAds.create') }}" class="btn btn-outline-success btn-icon-text"><i
                            class="fas fa-plus-circle"></i> افزودن </a>
                </div>


                <div class="card-body">
                    <div class="table-responsive">
                        <table id="advertisements" class="display" style="width:100%">
                            <thead class="text-primary primary-font">
                                <th class="text-center">ردیف</th>
                                <th class="text-center">عنوان</th>
                                <th class="text-center">slug</th>
                                <th class="text-center">دسته بندی</th>
                                <th class="text-center">کشور</th>
                                <th class="text-center">نوع</th>
                                <th class="text-center">جایگاه</th>
                                @if($type == 'user')
                                <th class="text-center">ارسال پیام</th>
                                @endif
                                <th class="text-center">وضعیت</th>
                                <th class="text-center">مدیریت</th>
                            </thead>
                            <tbody class="secondary-font">
                            @forelse ($RecruitmentAds as $item)
                                <tr>
                                    <td class="text-center">{{$item->id}}</td>
                                    <td class="text-center">{{$item->title}}</td>
                                    <td class="text-center">{{$item->slug}}</td>
                                    <td class="text-center">{{$item->categories()->first()->title}}</td>
                                    <td class="text-center">{{$item->country->title}}</td>
                                    <td class="text-center">
                                        @if ($item->type != "Advertising")
                                            نیازمندی ها
                                        @else
                                            آگهی های
                                        @endif
                                    </td>
                                    <td class="text-center">{{$item->index!=0 ? $item->index : 'نامشخص'}}</td>
                                    @if($type == 'user')
                                    <td class="text-center">
                                        <a href="{{ route('admin.tickets.create', [$item->id,$item->recruitment_adsable_id]) }}"class="btn btn-outline-success btn-icon-text">
                                            ارسال پیام
                                        </a>
                                    </td>
                                    @endif
                                    <td class="text-center">
                                        @if ($item->status != 0)
                                        <a href="{{ route('admin.recruitmentAds.sattus', $item->id) }}"class="btn btn-outline-success btn-icon-text">
                                             منتشر شده
                                        </a>
                                        @else
                                        <a href="{{ route('admin.recruitmentAds.sattus', $item->id) }}" class="btn btn-outline-warning btn-icon-text">
                                             منتشر نشده
                                        </a>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.recruitmentAds.edit',$item->id) }}"
                                           class="btn btn-outline-warning btn-icon-text">
                                            <i class="fas fa-pencil-alt"></i>
                                            ویرایش
                                        </a>

                                        <form action="{{route('admin.recruitmentAds.destroy' , $item->id)}}?_method=DELETE"
                                              method="POST" id="delete-item-{{$item->id}}">
                                            @csrf
                                            @method('delete')
                                            <button type="button" class="btn btn-outline-danger btn-icon-text"
                                                    onclick="deleteItem({{ $item->id  }})">
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
