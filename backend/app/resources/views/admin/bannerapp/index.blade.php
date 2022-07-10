@extends('admin/layouts/app-dark')

@section('title', 'مدیریت تبلیغات')


@push('script')

    <script>
        $(document).ready(function() {
            $('#festivalsApp').DataTable({
                dom: 'Bfrtip',
                buttons: ['excelHtml5'],
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Persian.json',
                },
            });
        });
    </script>
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


<style>
    td {
        width: 13% !important;
    }

</style>

@section('contents')
    <div class="content">
        <div class="row px-3">
            <div class="col-md-12 py-3 card">
                <div class="card-header">
                    <h4 class="card-title"></h4>
                    <a href="{{ route('admin.banner-app.create') }}" class="btn btn-outline-success btn-icon-text"><i
                            class="fas fa-plus-circle"></i> افزودن </a>
                </div>


                <div class="card-body">
                    <div class="table-responsive">
                        <table id="festivalsApp" class="display" style="width:100%">
                            <thead class="text-primary primary-font">
                                <th class="text-center">ردیف</th>
                                <th class="text-center">لینک</th>
                                <th class="text-center">مدیریت</th>
                            </thead>
                            <tbody class="secondary-font">
                                @forelse ($bannerApps as $bannerApp)
                                    <tr>
                                        <td class="text-center">{{ $bannerApp->id }}</td>
                                        <td class="text-center">{{ $bannerApp->link }}</td>
                                        <td>
                                            <img width="100" src="{{ asset('storage/bannerapp/'.$bannerApp->image)}}"/>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.banner-app.edit', $bannerApp->id) }}"
                                                class="btn btn-outline-warning btn-icon-text">
                                                <i class="fas fa-pencil-alt"></i>
                                                ویرایش
                                            </a>

                                            <form
                                                action="{{ route('admin.banner-app.destroy', $bannerApp->id) }}?_method=DELETE"
                                                method="POST" id="delete-item-{{ $bannerApp->id }}">
                                                @csrf
                                                @method('delete')
                                                <button type="button" class="btn btn-outline-danger btn-icon-text"
                                                    onclick="deleteItem({{ $bannerApp->id }})">
                                                    <i class="fas fa-trash-alt"></i>
                                                    حدف
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
