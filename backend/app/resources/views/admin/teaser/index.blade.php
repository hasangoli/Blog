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
</script>

@endpush



@section('contents')
    <div class="content">
        <div class="row px-3">
            <div class="col-md-12 py-3 card">
                <div class="card-header">
                    <h4 class="card-title"></h4>

                </div>
                {!! Form::open(['route' => 'admin.teaser.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                
                <div class="col-md-12 mx-auto">
                     <div class="form-group">
                        <label for="title">عنوان</label>
                        <input class="form-control" name="title" id="title" >
                    </div>
                </div>
                {{--  new image  --}}
                <div class="col-md-12 mx-auto">
                    <div class="my-4 my-1 drop-region" >
                        <label for="image">عکس
                        </label>
                        {{-- <div class="drop-message">
                            جهت بارگزاری عکس ،عکس ها را به داخل کادر بکشید و یا  <strong class="text-info">اینجا</strong> کلیک کنید
                            <i class="fas fa-upload cus-upload-icon"></i> --}}
                            <input type="file" id="files" accept="video/*" name="video"/>
                        {{-- </div> --}}
                        {{-- <div class="image-preview">


                        </div> --}}
                    </div>
                </div>
                <div class="text-center col-6 m-auto">
                    <button type="submit" class="btn btn-outline-success btn-icon-text">
                        <i class="fas fa-check-circle"></i>
                                     ثبت
                     </button>
                 </div>
            </div>

                {!! Form::close() !!}

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="advertisements" class="display" style="width:100%">
                            <thead class="text-primary primary-font">
                            <th class="text-center">ردیف</th>
                            <th class="text-center">عنوان</th>
                            <th class="text-center">ویدیو</th>
                            <th class="text-center">مدیریت</th>
                            </thead>
                            <tbody class="secondary-font">
                            @forelse ($teaser as $item)
                                <tr>
                                    <td class="text-center">{{$item->id}}</td>
                                    <td class="text-center">{{$item->title}}</td>
                                    <td class="text-center td-cus ">

                                        <video controls class="float-right thumbnail">
                                            <source src="{{ asset('storage/teaser/' . $item->video) }}" type="video/mp4">
                                            <source src="movie.ogg" type="video/ogg">
                                            Your browser does not support the video tag.
                                        </video>

                                        {{-- <img style="width:165px;height:55px" src="{{ asset('storage/slider/'.$item->image)}}"> --}}
                                    </td>
                                    <td class="text-center">
                                        <form action="{{route('admin.teaser.destroy' , $item->id)}}?_method=DELETE"
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
                                <p class="alert alert-info text-center" style="margin-top: 10rem">teaser not found</p>
                            @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection








