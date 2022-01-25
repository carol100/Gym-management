@extends('app-admin')
@section('content')

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-2">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Profile</h5>
                    <!--end::Page Title-->
                    <!--begin::Actions-->
                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
                    <span class="text-muted font-weight-bold mr-4"><a href="mailto:support@boxleo.co.ke">Need Help? Contact Support</a></span>
                    <!--end::Actions-->
                </div>
                <!--end::Info-->

            </div>
        </div>
        <!--end::Subheader-->
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Card-->
                <div class="card card-custom">
                    <!--begin::Card header-->
                    <div class="card-header card-header-tabs-line nav-tabs-line-3x">
                        <!--begin::Toolbar-->
                        <div class="card-toolbar">
                            <ul class="nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-3x">
                                <!--begin::Item-->
                                <li class="nav-item mr-3">
                                    <a class="nav-link active" data-toggle="tab" href="#kt_user_edit_tab_1">
														<span class="nav-icon">
															<span class="svg-icon">
																<!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<polygon points="0 0 24 0 24 24 0 24" />
																		<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																		<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
																	</g>
																</svg>
                                                                <!--end::Svg Icon-->
															</span>
														</span>
                                        <span class="nav-text font-size-lg">Account</span>
                                    </a>
                                </li>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <li class="nav-item mr-3">
                                    <a class="nav-link" data-toggle="tab" href="#kt_user_edit_tab_3">
														<span class="nav-icon">
															<span class="svg-icon">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Shield-user.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24" />
																		<path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3" />
																		<path d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z" fill="#000000" opacity="0.3" />
																		<path d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z" fill="#000000" opacity="0.3" />
																	</g>
																</svg>
                                                                <!--end::Svg Icon-->
															</span>
														</span>
                                        <span class="nav-text font-size-lg">Change Password</span>
                                    </a>
                                </li>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <li class="nav-item mr-3">
                                    <a class="nav-link" data-toggle="tab" href="#kt_user_edit_tab_2">
														<span class="nav-icon">
															<span class="svg-icon"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Clipboard-list.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3"/>
        <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000"/>
        <rect fill="#000000" opacity="0.3" x="10" y="9" width="7" height="2" rx="1"/>
        <rect fill="#000000" opacity="0.3" x="7" y="9" width="2" height="2" rx="1"/>
        <rect fill="#000000" opacity="0.3" x="7" y="13" width="2" height="2" rx="1"/>
        <rect fill="#000000" opacity="0.3" x="10" y="13" width="7" height="2" rx="1"/>
        <rect fill="#000000" opacity="0.3" x="7" y="17" width="2" height="2" rx="1"/>
        <rect fill="#000000" opacity="0.3" x="10" y="17" width="7" height="2" rx="1"/>
    </g>
</svg><!--end::Svg Icon--></span>
														</span>
                                        <span class="nav-text font-size-lg">Logs</span>
                                    </a>
                                </li>
                                <!--end::Item-->

                            </ul>
                        </div>
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body px-0">

                            <div class="tab-content">
                                <!--begin::Tab-->
                                <div class="tab-pane show active px-7" id="kt_user_edit_tab_1" role="tabpanel">
                                    <!--begin::Row-->
                                    <form class="form" id="kt_form" @submit.prevent="formSubmit" method="post">

                                        <div class="row">
                                            <div class="col-xl-2"></div>
                                            <div class="col-xl-7 my-2">

                                                <!--begin::Row-->
                                                <div class="row">
                                                    <label class="col-3"></label>
                                                    <div class="col-9">
                                                        <h6 class="text-dark font-weight-bold mb-10">Profile Details:</h6>
                                                    </div>
                                                </div>
                                                <!--end::Row-->

                                                <!--begin::Group-->
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">First Name</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <input class="form-control form-control-solid form-control-lg" name="first_name" type="text"
                                                               value="{{ Auth::user()->first_name }}" disabled/>
                                                    </div>
                                                </div>
                                                <!--end::Group-->

                                                <!--begin::Group-->
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Last Name</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <input class="form-control form-control-solid form-control-lg" name="last_name" type="text"
                                                               value="{{ Auth::user()->last_name }}" disabled/>
                                                    </div>
                                                </div>
                                                <!--end::Group-->

                                                <!--begin::Group-->
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">National ID</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <input class="form-control form-control-solid form-control-lg" name="national_id"
                                                               type="number" min="0" onwheel="this.blur()" value="{{ Auth::user()->national_id }}" disabled/>
                                                    </div>
                                                </div>
                                                <!--end::Group-->
                                                <!--begin::Group-->
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Date of Birth</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <input class="form-control form-control-solid form-control-lg" name="date_of_birth"
                                                               type="text" value="{{ Auth::user()->date_of_birth }}" disabled/>
                                                    </div>
                                                </div>
                                                <!--end::Group-->

                                                <!--begin::Group-->
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Phone Number</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <input class="form-control form-control-solid form-control-lg" name="phone_number"
                                                               type="text"  value="{{ Auth::user()->phone_number }}" disabled/>
                                                    </div>
                                                </div>
                                                <!--end::Group-->

                                                <!--begin::Group-->
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Email</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <input class="form-control form-control-solid form-control-lg" name="email" type="email"
                                                               value="{{ Auth::user()->email }}" disabled/>
                                                    </div>
                                                </div>
                                                <!--end::Group-->

                                            </div>
                                        </div>

                                    </form>
                                    <!--end::Row-->
                                </div>
                                <!--end::Tab-->
                                <div class="tab-pane px-7" id="kt_user_edit_tab_3" role="tabpanel">

                                    <admin-password-component admin_id="{{ Auth::user()->id }}"></admin-password-component>

                                </div>
                                <!--end::Tab-->
                                <!--begin::Tab-->
                                 <div class="tab-pane px-7" id="kt_user_edit_tab_2" role="tabpanel">
                                    <!--begin::Row-->
                                    <div class="row justify-content-center">
                                        <div class="col-9">
                                            <table class="datatable datatable-bordered datatable-head-custom table-striped" id="kt_datatable">
                                                <thead>
                                                <tr>
                                                    <th title="Field #1">No</th>
                                                    <th title="Field #2">Activity</th>
                                                    <th title="Field #3">Description</th>
                                                    <th title="Field #4">Date</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($logs as $log)
                                                    <tr>
                                                        <td>{{ $loop->iteration  }}</td>
                                                        <td><a href="#">{{ strtoupper($log->log_name) }}</a></td>
                                                        <td>{{ $log->description }}</td>
                                                        <td>{{ $log->created_at }}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                    <!--end::Row-->

                                </div>
                                <!--end::Tab-->
                            </div>

                    </div>
                    <!--begin::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>

@endsection
