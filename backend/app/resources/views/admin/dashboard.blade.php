@extends('admin/layouts/app-dark')

@section('title', 'صفحه داشبورد')



@section('contents')

<div class="row">
      <div class="col-md-3 mx-auto col-sm-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-9">
                <div class="d-flex align-items-center align-self-start">
                  <h3 class="mb-0">{{$allUser}}</h3>

                </div>
              </div>
              <div class="col-3">
                <div class="icon icon-box-success">
                  <span
                    class="fa fa-user icon-item"
                  ></span>
                </div>
              </div>
            </div>
            <h6 class="text-muted text-center  font-weight-normal">
                کاربران
            </h6>
          </div>
        </div>
      </div>
      <div class="col-md-3 mx-auto col-sm-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-9">
                <div class="d-flex align-items-center align-self-start">
                  <h3 class="mb-0">{{$banUser}}</h3>

                </div>
              </div>
              <div class="col-3">
                <div class="icon icon-box-danger">
                  <span
                    class="fa fa-ban icon-item"
                  ></span>
                </div>
              </div>
            </div>
            <h6 class="text-muted text-center font-weight-normal">کاربران مسدود شده</h6>
          </div>
        </div>
      </div>
      <!--<div class="col-md-3 mx-auto col-sm-12 grid-margin stretch-card">-->
      <!--  <div class="card">-->
      <!--    <div class="card-body">-->
      <!--      <div class="row">-->
      <!--        <div class="col-9">-->
      <!--          <div class="d-flex align-items-center align-self-start">-->
      <!--            <h3 class="mb-0">4</h3>-->

      <!--          </div>-->
      <!--        </div>-->
      <!--        <div class="col-3">-->
      <!--          <div class="icon icon-box-success">-->
      <!--            <span-->
      <!--              class="fa fa-portrait icon-item"-->
      <!--            ></span>-->
      <!--          </div>-->
      <!--        </div>-->
      <!--      </div>-->
      <!--      <h6 class="text-muted text-center font-weight-normal">-->
      <!--          مدیر فروش-->
      <!--      </h6>-->
      <!--    </div>-->
      <!--  </div>-->
      <!--</div>-->
      <div class="col-md-3 mx-auto col-sm-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-9">
                <div class="d-flex align-items-center align-self-start">
                  <h3 class="mb-0">{{$article}}</h3>

                </div>
              </div>
              <div class="col-3">
                <div class="icon icon-box-warning">
                  <span
                    class="fa fa-mail-bulk icon-item"
                  ></span>
                </div>
              </div>
            </div>
            <h6 class="text-muted text-center font-weight-normal">
                تعداد پست ها
            </h6>
          </div>
        </div>
      </div>


</div>

@endsection
