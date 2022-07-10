@extends('admin/layouts/app-dark')

@section('title', 'ویرایش تبلیغ جدید')


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


@section('styles')\

@endsection


@section('contents')
    <div class="content">
        <div class="row px-3">
            <div class=" col-sm-12 col-md-8 mx-auto  py-3">
                <div class="card p-4">
                    <div class="header">
                        <h4 class="title">ویرایش ({{ $country->title }})</h4>
                    </div>
                    <div class="content">

                        {!! Form::open(['route' => ['admin.countries.update',$country->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}

                        <div class="row">
                            <input type="hidden" name="modelType" value="{{ $country->modelType }}">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">نام کشور</label>
                                    <input type="text" id="title" name="title" class="form-control border-input"
                                           placeholder="نام کشور" value="{{ $country->title }}">
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

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

