@extends('app-admin')
@section('content')

    <!--begin::Content-->
    <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-2">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Caroline's Attendance Dashboard</h5>
                    <!--end::Page Title-->
                    <!--begin::Actions-->
                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
                    <span class="text-muted font-weight-bold mr-4"><a href="mailto:info@chadema.digital">Attendace for Today </a></span>
                    <!--end::Actions-->
                </div>
                <!--end::Info-->

            </div>

        </div>


        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class=" container ">
                <!--begin::Dashboard-->
                <!--Begin::Row-->
                <div class="row">
                    <div class="col-xl-3">
                        <!--begin::Stats Widget 29-->
                        <div class="card card-custom bgi-no-repeat card-stretch gutter-b"
                             style="background-position: right top; background-size: 30% auto; background-image: url(assets/media/svg/shapes/abstract-1.svg)">
                            <!--begin::Body-->
                            <div class="card-body">
         <span class="svg-icon svg-icon-2x svg-icon-info"><!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg--><svg
                 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                 viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5"/>
        <rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5"/>
        <rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5"/>
        <rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5"/>
    </g>
</svg><!--end::Svg Icon--></span>
                                <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">
                                  00
                                </span>
                                <span class="font-weight-bold text-muted  font-size-sm">Registrations (Today)</span>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Stats Widget 29-->
                    </div>
                    <div class="col-xl-3">
                        <!--begin::Stats Widget 30-->
                        <div class="card card-custom bg-info card-stretch gutter-b">
                            <!--begin::Body-->
                            <div class="card-body">
        <span class="svg-icon svg-icon-2x svg-icon-white"><!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg--><svg
                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5"/>
        <rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5"/>
        <rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5"/>
        <rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5"/>
    </g>
</svg><!--end::Svg Icon--></span>
                                <span class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 d-block">00</span>
                                <span class="font-weight-bold text-white font-size-sm">Events (This Week)</span>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Stats Widget 30-->
                    </div>
                    <div class="col-xl-3">
                        <!--begin::Stats Widget 31-->
                        <div class="card card-custom bg-danger card-stretch gutter-b">
                            <!--begin::Body-->
                            <div class="card-body">
        <span class="svg-icon svg-icon-2x svg-icon-white"><!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg--><svg
                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5"/>
        <rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5"/>
        <rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5"/>
        <rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5"/>
    </g>
</svg><!--end::Svg Icon--></span>
                                <span class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 d-block">
                                   000
                                </span>
                                <span class="font-weight-bold text-white  font-size-sm">Funds (This week)</span>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Stats Widget 31-->
                    </div>
                    <div class="col-xl-3">
                        <!--begin::Stats Widget 32-->
                        <div class="card card-custom bg-dark card-stretch gutter-b">
                            <!--begin::Body-->
                            <div class="card-body">
       <span class="svg-icon svg-icon-2x svg-icon-white"><!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg--><svg
               xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
               viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5"/>
        <rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5"/>
        <rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5"/>
        <rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5"/>
    </g>
</svg><!--end::Svg Icon--></span>
                                <span class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 text-hover-primary d-block">00</span>
                                <span class="font-weight-bold text-white  font-size-sm">Total Members</span>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Stats Widget 32-->
                    </div>
                </div>
                <!--End::Row-->
                <!--begin::Row-->
                <div class="row">

                    <div class="col-lg-6 col-xxl-4 order-1 order-xxl-1">
                        <!--begin::List Widget 1-->
                        <div class="card card-custom card-stretch gutter-b">
                            <!--begin::Header-->
                            <div class="card-header border-0 pt-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label font-weight-bolder text-dark">Events this week</span>
                                    <span class="text-muted mt-3 font-weight-bold font-size-sm">About 10+ events</span>
                                </h3>
                            </div>
                            <!--end::Header-->

                            <!--begin::Body-->
                            <div class="card-body pt-8">
                                <!--begin::Item-->
                                @foreach($events as $event)
                                    <div class="d-flex align-items-center mb-10">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-40 symbol-light-primary mr-5">

                                        </div>
                                        <!--end::Symbol-->

                                        <!--begin::Text-->
                                        <div class="d-flex flex-column font-weight-bold">
                                            <a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">{{ $event->name }}</a>
                                            <span class="text-muted">{{ $event->start_date }}</span>
                                        </div>
                                        <!--end::Text-->
                                    </div>
                                @endforeach
                                <!--end::Item-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::List Widget 1-->
                    </div>
                    <div class="col-xxl-8 order-2 order-xxl-1">
                        <!--begin::Advance Table Widget 2-->
                        <div class="card card-custom card-stretch gutter-b">
                            <!--begin::Header-->
                            <div class="card-header border-0 pt-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label font-weight-bolder text-dark">Registration Statistics</span>
                                </h3>
                            </div>
                            <!--end::Header-->

                            <!--begin::Body-->
                            <div class="card-body pt-3 pb-0">
{{--                                <member-chart-summary height="200px"></member-chart-summary>--}}
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Advance Table Widget 2-->
                    </div>

                </div>
                <!--end::Row-->

                <!--end::Dashboard-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->



    </div>
    <!--end::Content-->

@endsection
