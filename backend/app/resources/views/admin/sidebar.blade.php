<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div
        class="
      sidebar-brand-wrapper
      d-none d-lg-flex
      align-items-center
      justify-content-center
      fixed-top
    ">
        <a class="sidebar-brand brand-logo" href="index.html"><img
                src="{{ asset('backend/assets/images/faces/face15.jpg') }}" alt="logo" /></a>
        <a class="sidebar-brand brand-logo-mini" href="index.html"><img
                src="{{ asset('backend/assets/images/faces/face15.jpg') }}" alt="logo" /></a>
    </div>
    <ul class="nav">
        <li class="nav-item profile">
            {{-- <nav class="col-xs-12 header-item mx-auto col-md-12 clock-wapper">
              <h6 id="demo"></h6>
           </nav> --}}
            <div class="profile-desc">
                <div class="profile-pic">
                    <div class="count-indicator">
                        <img class="img-xs rounded-circle"
                            src="{{ asset('storage/settings/' . $adminInfo->image->title) }}" alt="" />

                        <span class="count bg-success"></span>
                    </div>
                    <div class="profile-name">
                        <h5 class="my-2 font-weight-normal mx-2 ">{{ $adminInfo->name }}</h5>
                        <span class="mx-2 ">ادمین</span>
                    </div>
                </div>
                <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                <div class="
            dropdown-menu dropdown-menu-right
            sidebar-dropdown
            preview-list
          "
                    aria-labelledby="profile-dropdown">
                    <a href="{{ route('admin.settings.edit') }}" class="dropdown-item preview-item">
                        <div class="preview-thumbnail mx-2">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="	fa fa-cogs text-primary"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">
                                تنظیمات
                            </p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('admin.profile') }}" class="dropdown-item preview-item">
                        <div class="preview-thumbnail mx-2">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="fa fa-user text-info"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">
                                پروفایل
                            </p>
                        </div>
                    </a>


                    <form method="POST" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <input type="submit" value="خروج" class="btn btn-danger btn-block text-center">

                    </form>
                    </a>
                </div>
            </div>
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link">دسترسی ها</span>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <span class="menu-icon mx-2 ">
                    <i class="fa fa-tachometer-alt text-success"></i>
                </span>
                <span class="menu-title">داشبورد</span>
            </a>
        </li>

        <li class="nav-item menu-items @if (Request::is('admin/countries/*') || Request::is('admin/countries')) active @endif">
            <a class="nav-link" href="{{ route('admin.countries.index') }}">
                <span class="menu-icon mx-2">
                    <i class="fas fa-globe-europe text-primary"></i>
                </span>
                <span class="menu-title">کشور ها</span>
            </a>
        </li>

        <li class="nav-item menu-items @if (Request::is('admin/categories/article') || Request::is('admin/categories/*/article')) active @endif">
            <a class="nav-link" href="{{ route('admin.categories.index', 'article') }}">
                <span class="menu-icon mx-2">
                    <i class="fas fa-clipboard-list text-info"></i>
                </span>
                <span class="menu-title">دسته بندی بلاگ ها</span>
            </a>
        </li>

        <li class="nav-item menu-items @if (Request::is('admin/articles') || Request::is('admin/articles/*')) active @endif">
            <a class="nav-link" href="{{ route('admin.articles.index') }}">
                <span class="menu-icon mx-2">
                    <i class="fa fa-mail-bulk text-success"></i>
                </span>
                <span class="menu-title">بلاگ ها</span>
            </a>
        </li>

        <li class="nav-item menu-items @if (Request::is('admin/categories/product') || Request::is('admin/categories/*/product')) active @endif">
            <a class="nav-link" href="{{ route('admin.categories.index', 'product') }}">
                <span class="menu-icon mx-2">
                    <i class="fas fa-clipboard-list text-warning"></i>
                </span>
                <span class="menu-title">دسته بندی فروشگاه آنلاین</span>
            </a>
        </li>

        <li class="nav-item menu-items @if (Request::is('admin/products') || Request::is('admin/products/*')) active @endif">
            <a class="nav-link" href="{{ route('admin.products.index') }}">
                <span class="menu-icon mx-2">
                    <i class="fa fa-store text-danger"></i>
                </span>
                <span class="menu-title">فروشگاه آنلاین</span>
            </a>
        </li>

        <li class="nav-item menu-items @if (Request::is('admin/categories/recruitmentAds') || Request::is('admin/categories/*/recruitmentAds')) active @endif">
            <a class="nav-link" href="{{ route('admin.categories.index', 'RecruitmentAds') }}">
                <span class="menu-icon mx-2">
                    <i class="fas fa-clipboard-list text-primary"></i>
                </span>
                <span class="menu-title">دسته بندی آگهی ها و نیازمندی ها</span>
            </a>
        </li>

        <li class="nav-item menu-items @if (Request::is('admin/recruitmentAds') || Request::is('admin/recruitmentAds/*')) active @endif">
            <a class="nav-link" href="{{ route('admin.recruitmentAds.index') }}">
                <span class="menu-icon mx-2">
                    <i class="fab fa-adversal text-info"></i>
                </span>
                <span class="menu-title">آگهی ها و نیازمندی ها</span>
            </a>
        </li>

        <li class="nav-item menu-items @if (Request::is('admin/contactus') || Request::is('admin/contactus/*')) active @endif">
            <a class="nav-link" href="{{ route('admin.contactus.index') }}">
                <span class="menu-icon mx-2">
                    <i class="fa fa-phone-square text-success"></i>
                </span>
                <span class="menu-title">تماس با ما</span>
            </a>
        </li>

        <li class="nav-item menu-items @if (Request::is('admin/NetworkActives') || Request::is('admin/NetworkActives/*')) active @endif">
            <a class="nav-link" href="{{ route('admin.NetworkActives.index') }}">
                <span class="menu-icon mx-2">
                    <i class="fa fa-network-wired text-info"></i>
                </span>
                <span class="menu-title">فعالیت های شبکه</span>
            </a>
        </li>

        <li class="nav-item menu-items @if (Request::is('admin/galleries') || Request::is('admin/galleries/*')) active @endif">
            <a class="nav-link" href="{{ route('admin.galleries.index') }}">
                <span class="menu-icon mx-2">
                    <i class="fa fa-photo-video text-danger"></i>
                </span>
                <span class="menu-title">گالری</span>
            </a>
        </li>

        <li class="nav-item menu-items @if (Request::is('admin/socialNetworks') || Request::is('admin/socialNetworks/*')) active @endif">
            <a class="nav-link" href="{{ route('admin.socialNetworks.index') }}">
                <span class="menu-icon mx-2">
                    <i class="fab fa-facebook text-primary"></i>
                </span>
                <span class="menu-title">شبکه های اجتماعی</span>
            </a>
        </li>


        <li class="nav-item menu-items @if (Request::is('admin/comments') || Request::is('admin/comments/*')) active @endif">
            <a class="nav-link" href="{{ route('admin.comments.index') }}">
                <span class="menu-icon mx-2">
                    <i class="fa fa-question text-danger"></i>
                </span>
                <span class="menu-title">نظرات</span>
            </a>
        </li>

        <!--<li class="nav-item menu-items @if (Request::is('admin/tickets') || Request::is('admin/tickets/*')) active @endif">-->
        <!--    <a class="nav-link" href="{{ route('admin.tickets.users.index') }}">-->
        <!--        <span class="menu-icon mx-2">-->
        <!--            <i class="fa fa-question text-danger"></i>-->
        <!--        </span>-->
        <!--        <span class="menu-title">تیکت ها</span>-->
        <!--    </a>-->
        <!--</li>-->

        <li class="nav-item menu-items @if (Request::is('admin/aboutus') || Request::is('admin/aboutus/*')) active @endif">
            <a class="nav-link" href="{{ route('admin.settings.editAboutUs') }}">
                <span class="menu-icon mx-2">
                    <i class="fa fa-question text-danger"></i>
                </span>
                <span class="menu-title">صفحه درباره ما</span>
            </a>
        </li>

        <li class="nav-item menu-items @if (Request::is('admin/users') || Request::is('admin/users/*')) active @endif">
            <a class="nav-link" href="{{ route('admin.users.index') }}">
                <span class="menu-icon mx-2">
                    <i class="fa fa-question text-danger"></i>
                </span>
                <span class="menu-title">لیست کاربران</span>
            </a>
        </li>

        <li class="nav-item menu-items @if (Request::is('admin/products') || Request::is('admin/products/*')) active @endif">
            <a class="nav-link" href="{{ route('admin.products.index') }}">
                <span class="menu-icon mx-2">
                    <i class="fa fa-question text-danger"></i>
                </span>
                <span class="menu-title">محصولات</span>
            </a>
        </li>

        <li class="nav-item menu-items @if (Request::is('admin/introductionApplication') || Request::is('admin/introductionApplication/*')) active @endif">
            <a class="nav-link" href="{{ route('admin.settings.editIntroductionApplication') }}">
                <span class="menu-icon mx-2">
                    <i class="fa fa-tablet-alt text-info"></i>
                </span>
                <span class="menu-title">معرفی اپلیکیشن</span>
            </a>
        </li>

        <li class="nav-item menu-items @if (Request::is('admin/PartnersLogo') || Request::is('admin/PartnersLogo/*')) active @endif">
            <a class="nav-link" href="{{ route('admin.partners.index') }}">
                <span class="menu-icon mx-2">
                    <i class="fa fa-users text-success"></i>
                </span>
                <span class="menu-title">لوگو همکاران</span>
            </a>
        </li>

        <li class="nav-item menu-items @if (Request::is('admin/pages') || Request::is('admin/pages/*')) active @endif">
            <a class="nav-link" href="{{ route('admin.pages.index') }}">
                <span class="menu-icon mx-2">
                    <i class="fa fa-users text-success"></i>
                </span>
                <span class="menu-title">صفحه ساز</span>
            </a>
        </li>

        <li class="nav-item menu-items @if (Request::is('admin/Festivals') || Request::is('admin/Festivals/*')) active @endif">
            <a class="nav-link" href="{{ route('admin.festivals.edit') }}">
                <span class="menu-icon mx-2">
                    <i class="fa fa-vector-square text-danger"></i>
                </span>
                <span class="menu-title">لینک جشنواره ها
                     و مراسمات و کالج زبان صفحه اصلی</span>
            </a>
        </li>

        <li class="nav-item menu-items @if (Request::is('admin/slider') || Request::is('admin/slider/*')) active @endif">
            <a class="nav-link" href="{{ route('admin.slider.index') }}">
                <span class="menu-icon mx-2">
                    <i class="fa fa-images text-success"></i>
                </span>
                <span class="menu-title">اسلایدر</span>
            </a>
        </li>


        <li class="nav-item nav-category">
            <span class="nav-link">اپلیکیشن موبایل</span>
        </li>


        <li class="nav-item menu-items @if (Request::is('admin/galleries/bannerApp/') || Request::is('admin/galleries/bannerApp/*')) active @endif">
            <a class="nav-link" href="{{ route('admin.bannerAppEdit') }}">
                <span class="menu-icon mx-2">
                    <i class="fa fa-images text-success"></i>
                </span>
                <span class="menu-title">بنر های ویدیوهای تلوزیونی</span>
            </a>
        </li>


        <li class="nav-item menu-items @if (Request::is('admin/banner-app/') || Request::is('admin/banner-app/*')) active @endif">
            <a class="nav-link" href="{{ route('admin.banner-app.index') }}">
                <span class="menu-icon mx-2">
                    <i class="fa fa-images text-success"></i>
                </span>
                <span class="menu-title">بنر ها در اپلیکیشن</span>
            </a>
        </li>

        <li class="nav-item menu-items @if (Request::is('admin/festivalapps/') || Request::is('admin/festivalapps/*')) active @endif">
            <a class="nav-link" href="{{ route('admin.festivalapps.index') }}">
                <span class="menu-icon mx-2">
                    <i class="fa fa-images text-success"></i>
                </span>
                <span class="menu-title">جشنواره ها در اپلیکیشن</span>
            </a>
        </li>


        <li class="nav-item menu-items @if (Request::is('admin/teaser') || Request::is('admin/teaser/*')) active @endif">
            <a class="nav-link" href="{{ route('admin.teaser.index') }}">
                <span class="menu-icon mx-2">
                    <i class="fa fa-images text-success"></i>
                </span>
                <span class="menu-title">تیزر ها و پشت صحنه ها</span>
            </a>
        </li>



        <li class="nav-item menu-items @if (Request::is('admin/recruitmentAds/for-user') || Request::is('admin/recruitmentAds/for-user/*')) active @endif">
            <a class="nav-link" href="{{ route('admin.recruitmentAds.forUser') }}">
                <span class="menu-icon mx-2">
                    <i class="fa fa-images text-success"></i>
                </span>
                <span class="menu-title">آگهی های کاربران</span>
            </a>
        </li>


        <li class="nav-item menu-items @if (Request::is('admin/payment') || Request::is('admin/payments/recruitmentAds')) active @endif">
            <a class="nav-link" href="{{ route('admin.payments.recruitmentAds') }}">
                <span class="menu-icon mx-2">
                    <i class="fa fa-images text-success"></i>


                </span>
                <span class="menu-title">پرداختی های آگهی ها</span>
            </a>
        </li>



        <li class="nav-item menu-items @if (Request::is('admin/payment') || Request::is('admin/payments/store')) active @endif">
            <a class="nav-link" href="{{ route('admin.payments.store') }}">
                <span class="menu-icon mx-2">
                    <i class="fa fa-images text-success"></i>
                </span>
                <span class="menu-title">پرداختی های فروشگاه</span>
            </a>
        </li>


    </ul>
</nav>
