@extends('admin/layouts/app-dark')

@section('title', 'مدیریت تبلیغات')


@push('script')

    <script>
        $(document).ready(function() {
            $('#articles').DataTable({
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
                    <a href="{{ route('admin.articles.create') }}" class="btn btn-outline-success btn-icon-text"><i
                            class="fas fa-plus-circle"></i> افزودن </a>
                </div>


                <div class="card-body">
                    <div class="table-responsive">
                        <table id="articles" class="display" style="width:100%">
                            <thead class="text-primary primary-font">
                                <th class="text-center">ردیف</th>
                                <th class="text-center">عنوان</th>
                                <th class="text-center">slug</th>
                                <th class="text-center">دسته بندی</th>
                                <th class="text-center">نوع</th>
                                <th class="text-center">کشور</th>
                                <th class="text-center">امتیاز</th>
                                <th class="text-center">مدیریت</th>
                            </thead>
                            <tbody class="secondary-font">
                                @forelse ($articles as $article)
                                    <tr>
                                        <td class="text-center">{{ $article->id }}</td>
                                        <td class="text-center">{{ $article->title }}</td>
                                        <td class="text-center">{{ $article->slug }}</td>
                                        <td class="text-center">{{ $article->categories->title }}</td>
                                        <td class="text-center">
                                            @switch($article->type)
                                                @case('news')
                                                    آخرین اخبار و رویدادها
                                                @break

                                                @case('rules')
                                                    قوانین بریتانیا
                                                @break

                                                @case('asylum')
                                                    مهاجرت و پناهندگی
                                                @break

                                                @case('covid')
                                                    کوید 19
                                                @break

                                            @endswitch
                                        </td>
                                        <td class="text-center">{{ $article->country->title }}</td>
                                        <td class="text-center">
                                            {{ isset($article->score->rate) ? substr($article->score->rate, '0', '4') : '0' }}
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.articles.edit', $article->id) }}"
                                                class="btn btn-outline-warning btn-icon-text">
                                                <i class="fas fa-pencil-alt"></i>
                                                ویرایش
                                            </a>

                                            <form
                                                action="{{ route('admin.articles.destroy', $article->id) }}?_method=DELETE"
                                                method="POST" id="delete-item-{{ $article->id }}">
                                                @csrf
                                                @method('delete')
                                                <button type="button" class="btn btn-outline-danger btn-icon-text"
                                                    onclick="deleteItem({{ $article->id }})">
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
