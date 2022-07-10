@extends('admin/layouts/app-dark')

@section('title', 'مدیریت تبلیغات')


@push('scripts')

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
                    <h4 class="card-title">نظرات</h4>
                    <a href="{{ route('admin.articles.create') }}" class="btn btn-outline-success btn-icon-text"><i
                            class="fas fa-plus-circle"></i> افزودن </a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="advertisements" class="display" style="width:100%">
                            <thead class="text-primary primary-font">
                                <th class="text-center">ردیف</th>
                                <th class="text-center">نام نام خانوادگی</th>
                                <th class="text-center">مدیریت</th>
                            </thead>
                            <tbody class="secondary-font">
                                @forelse ($tickets as $ticket)
                                    <tr>
                                        <td class="text-center">{{ $ticket->ticketable->id }}</td>
                                        <td class="text-center">{{ $ticket->ticketable->name . ' ' . $ticket->ticketable->lastname }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.tickets.gettickets', ['id' => $ticket->ticketable->id]) }}"
                                                class="btn btn-outline-success btn-icon-text"><i
                                                    class="fas fa-pencil-alt"></i>
                                                مشاهده تیکت ها</a>
                                            <a href="{{ route('admin.tickets.subticket.view', ['id' => $ticket->ticketable->id]) }}"
                                                class="btn btn-outline-warning btn-icon-text"><i
                                                    class="fas fa-pencil-alt"></i>
                                                ارسال تیکت</a>
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
