@extends('admin/layouts/app-dark')

@section('title', 'مدیریت تبلیغات')


@push('script')

    <script>
        $(document).ready(function() {
            $('#payments').DataTable({
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
                </div>


                <div class="card-body">
                    <div class="table-responsive">
                        <table id="payments" class="display" style="width:100%">
                            <thead class="text-primary primary-font">
                                <th class="text-center">ردیف</th>
                                <th class="text-center">نوع پرداخت</th>>
                                <th class="text-center">مبلغ</th>
                                <th class="text-center">آگهی</th>
                                <th class="text-center">کاربر</th>
                            </thead>
                            <tbody class="secondary-font">
                                @forelse ($payments as $payment)
                                    <tr>
                                        <td class="text-center">{{ $payment->id }}</td>
                                        <td class="text-center">
                                            @switch($payment->type)
                                                @case('zarinpal')
                                                    زرین پال
                                                @break

                                                @case('paypal')
                                                    پی پال
                                                @break

                                            @endswitch
                                        </td>
                                        </td>
                                        <td class="text-center">
                                            @switch($payment->type)
                                                @case('zarinpal')
                                                    {{ toPersianMoney($payment->amount) }} تومان
                                                @break

                                                @case('paypal')
                                                    {{ toPersianMoney($payment->amount) }} پوند
                                                @break

                                            @endswitch
                                        </td>
                                        <td class="text-center">
                                            {{ $payment->paymentsable->title }}
                                        </td>
                                        <td class="text-center">
                                            <a href="{{route('admin.users.edit', $payment->user->id)}}">
                                            {{ $payment->user->lastName }}
                                            </a>
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
