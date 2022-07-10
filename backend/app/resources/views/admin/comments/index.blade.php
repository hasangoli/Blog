@extends('admin/layouts/app-dark')

@section('title', 'مدیریت تبلیغات')


@push('script')


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
    <script>
        $(document).ready(function() {
            $('#advertisements').DataTable({
                dom: 'Bfrtip',
                buttons: ['excelHtml5'],
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Persian.json',
                },
            });
        });
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


<style>
    td {
        width: 13% !important;
    }

</style>

@section('contents')
    <div class="content">
        <div class="row px-3">
            <div class="col-md-12 py-3 card">
                {{-- <div class="card-header">
                    <h4 class="card-title">نظرات</h4>
                    <a href="{{ route('admin.articles.create') }}" class="btn btn-outline-success btn-icon-text"><i
                            class="fas fa-plus-circle"></i> افزودن </a>
                </div> --}}

                <div class="card-body">
                    @php
                        /*Check type isset or not . its used in comments button*/
                        isset($type) ? null : ($type = 'article');
                    @endphp
                    {{ Form::open(['route' => 'admin.comments.type', 'method' => 'post']) }}
                    <div class="form-row align-items-center">
                        <div class="col-auto my-1">
                            <select class="custom-select mr-sm-2" name="type">
                                <option selected>نوع مطالب را انتخاب کنید</option>
                                <option value="article" {!! $type == 'article' ? 'selected' : null !!}>وبلاگ</option>
                                <option value="gallery" {!! $type == 'gallery' ? 'selected' : null !!}>گالری</option>
                                <option value="recruitmentads" {!! $type == 'recruitmentads' ? 'selected' : null !!}>نیازمندی ها</option>
                                <option value="networkactive" {!! $type == 'networkactive' ? 'selected' : null !!}>فعالیت شبکه</option>
                                <option value="product" {!! $type == 'product' ? 'selected' : null !!}>محصولات</option>
                            </select>
                        </div>
                        <div class="col-auto my-1">
                            <button type="submit" class="btn btn-outline-primary mx-2">نمایش</button>
                        </div>
                    </div>
                    {{ Form::close() }}
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="advertisements" class="display" style="width:100%">
                                <thead class="text-primary primary-font">
                                    <th class="text-center">ردیف</th>
                                    <th class="text-center">عنوان</th>
                                    <th class="text-center">تعداد کامنت ها</th>
                                    <th class="text-center">تعداد کامنت های خوانده نشده</th>
                                    <th class="text-center">مدیریت</th>
                                </thead>
                                <tbody class="secondary-font">
                                    @forelse ($items as $item)
                                        <tr>
                                            <td class="text-center">{{ $item->id }}</td>
                                            <td class="text-center">{{ $item->title }}</td>
                                            <td class="text-center">{{ count($item->comments) }}</td>
                                            <td class="text-center">{{ count($item->comments->where('view', '0')) }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.comments.getcomments', ['id' => $item->id, 'type' => $type]) }}"
                                                    class="btn btn-outline-success btn-icon-text"><i
                                                        class="fas fa-pencil-alt"></i>
                                                    مشاهده نظرات</a>
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
        </div>
    </div>
@endsection
