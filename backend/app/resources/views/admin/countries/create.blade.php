@extends('admin/layouts/app-dark')

@section('title', 'ثبت تبلیغ جدید')


@section('scripts')

    <script>


        function deleteItem(id) {

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
        }

    </script>

@endsection


@section('styles')

@endsection


@section('contents')
    <div class="content">
        <div class="row px-3">
            <div class=" col-sm-12 col-md-8 mx-auto  py-3">
                <div class="card p-4">
                    <div class="header">
                        <h4 class="title"></h4>
                    </div>
                    <div class="content">

                        {!! Form::open(['route' => 'admin.countries.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}



                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title">نام کشور </label>
                                        <input type="text" id="title" name="title" class="form-control border-input"
                                               placeholder="نام کشور" value="">
                                    </div>
                                </div>
                            </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-outline-success btn-icon-text">
                                        <i class="fas fa-check-circle"></i>
                                        ثبت
                                    </button>
                                </div>
                                <div class="clearfix"></div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

