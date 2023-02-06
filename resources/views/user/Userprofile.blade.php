@extends('layouts.master')
@section('content-dashboard')
<div class="container-fluid pt-0">
    <h1 class="mt-0">Add Profile</h1>
    <ol class="breadcrumb mb-3"></ol>
    <div class="row">
        <div class="col-md-6 px-2">
            <div class="card shadow p-2 mb-5 bg-white rounded" style="width: 100%; height:100%">
                <div class="card-header">Profile Information</div>
                <div class="row px-4 pb-4" id="header">
                    <form name="ProfileStore" id="user_ProfileStore" method="post" action="javascript:void(0)" class="row g-3 needs-validation" novalidate>
                        @csrf
                        <div class="col mb-3">
                            <div class="profile-pic-div" style="position: relative; height:200px">
                                <img src="/images/default.png" id="user_photo">
                                <input name="file" type="file" id="user_file">
                                <label for="file" id="user_uploadBtn">Choose Photo</label>
                            </div>
                        </div>

                        <div class="col pt-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="user_profile_status" name="profile_status" checked>
                                <label class="form-check-label" for="status">
                                    Active
                                </label>

                            </div>
                            <div class="mb-3">
                                <label mb-2 style="color: #A4A6B3;">First Name</label>
                                <input id="user_first_name" name="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror " placeholder="First Name" value="{{ old('first_name') }}" required>
                            </div>
                            <div class="mb-3">
                                <label mb-2 style="color: #A4A6B3;">Last Name</label>
                                <input id="user_last_name" name="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror " placeholder="Last Name" value="{{ old('last_name') }}" required>

                            </div>
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Email</label>
                            <input id="user_email" name="email" type="email" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Username</label>
                            <input id="user_username" name="username" type="text" class="form-control" placeholder="Username" required>
                        </div>
                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Password</label>
                            <input id="user_password" name="password" type="password" class="form-control" placeholder="Password" required>
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Position</label>
                            <select class="form-select @error('position') is-invalid @enderror" id="user_position" name="position" aria-label="Default select example" defaultValue="select">
                                <option selected disabled value="">Please Select Position</option>
                                <option value="Lead Developer">Lead Developer</option>
                                <option value="Senior Developer">Senior Developer</option>
                                <option value="Junior Developer">Junior Developer</option>
                                <option value="Web Designer">Web Designer</option>
                                <option value="Tester">Tester</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Phone Number</label>
                            <input id="user_phone_number" name="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" placeholder="Phone Number" required>
                            <span id="user_error_phone_number" class="text-danger"></span>
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Address</label>
                            <input name="address" id="address" type="text" class="form-control @error('address') is-invalid @enderror" placeholder="Address">
                            <span id="user_error_address" class="text-danger"></span>
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Province</label>
                            <input name="user_province" id="province" type="text" class="form-control @error('province') is-invalid @enderror" placeholder="Province">
                            <span id="user_error_province" class="text-danger"></span>
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">City</label>
                            <input id="user_city" name="city" type="text" class="form-control @error('city') is-invalid @enderror" placeholder="City">
                            <span id="user_error_city" class="text-danger"></span>
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Zip Code</label>
                            <input id="user_zip_code" name="zip_code" type="text" class="form-control @error('zip_code') is-invalid @enderror" placeholder="Zip Code">
                            <span id="user_error_zip_code" class="text-danger"></span>
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Account Number</label>
                            <input name="user_acct_no" id="acct_no" type="text" class="form-control @error('acct_no') is-invalid @enderror" placeholder="Account Number">
                            <span id="user_error_acct_no" class="text-danger"></span>
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Account Name</label>
                            <input name="user_acct_name" id="acct_name" type="text" class="form-control @error('acct_name') is-invalid @enderror" placeholder="Account Name">
                            <span id="user_error_acct_name" class="text-danger"></span>
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Bank Name</label>
                            <select class="form-select @error('bank_name') is-invalid @enderror" id="user_bank_name" name="bank_name" aria-label="Default select example">
                                <option selected disabled value="">Please Select Bank Name</option>
                                <option value="BDO Unibank Inc.">BDO Unibank Inc. (BDO)</option>
                                <option value="Land Bank of the Philippines">Land Bank of the Philippines (LANDBANK)
                                </option>
                                <option value="Metropolitan Bank & Trust Company">Metropolitan Bank & Trust Company
                                    (Metrobank)</option>
                                <option value="Bank of the Philippine Islands">Bank of the Philippine Islands (BPI)
                                </option>
                                <option value="Philippine National Bank">Philippine National Bank (PNB)</option>
                                <option value="Development Bank of the Philippines">Development Bank of the Philippines
                                    (DBP)</option>
                                <option value="China Banking Corporation">China Banking Corporation (CBC)</option>
                                <option value="Rizal Commercial Banking Corporation">Rizal Commercial Banking
                                    Corporation (RCBC)</option>
                                <option value="Union Bank of the Philippines, Inc.">Union Bank of the Philippines, Inc.
                                </option>
                                <option value="Security Bank Corporation">Security Bank Corporation</option>
                                <option value="EastWest Bank">EastWest Bank</option>
                                <option value="Citibank, N.A.">Citibank, N.A. (Philippine Branch)</option>
                                <option value="United Coconut Planters Bank">United Coconut Planters Bank (UCPB)
                                </option>
                                <option value="Asia United Bank Corporation">Asia United Bank Corporation (AUB)</option>
                                <option value="Bank of Commerce">Bank of Commerce (BankCom)</option>
                                <option value="Hongkong and Shanghai Banking Corporation">Hongkong and Shanghai Banking
                                    Corporation (HSBC)</option>
                                <option value="Robinsons Bank Corporation">Robinsons Bank Corporation</option>
                                <option value="Philtrust Bank">Philtrust Bank</option>
                                <option value="Philippine Bank of Communications">Philippine Bank of Communications
                                    (PBCOM)</option>
                                <option value="Maybank Philippines Inc.">Maybank Philippines Inc.</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Bank Location</label>
                            <input id="user_bank_location" name="bank_location" type="text" class="form-control @error('bank_location') is-invalid @enderror" placeholder="Bank Address">
                            <span id="user_error_bank_location" class="text-danger"></span>
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Gcash Number</label>
                            <input name="user_gcash_no" type="text" class="form-control @error('gcash_no') is-invalid @enderror" id="gcash_no" placeholder="Gcash Number">
                            <span id="user_error_gcash_no" class="text-danger"></span>
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Date Hired</label>
                            <input name="user_date_hired" type="date" class="form-control @error('date_hired') is-invalid @enderror" id="date_hired" placeholder="Date Hired">
                            <span id="user_error_date_hired" class="text-danger"></span>
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Deduction Types</label>
                            <select class="select2-multiple form-control form-select" name="deduction_types[]" multiple="multiple" id="select2Multiple">

                            </select>
                        </div>

                        <div class="col mb-3">
                            <button type="submit" style="width:100%; height:50px;color:white; background-color: #CF8029;" class="btn ">Add
                                Profile</button>
                        </div>

                        <!-- <div class="col mb-3">
                            <button type="submit"
                                style="width:100%; height:50px;color:white; background-color: #A4A6B3;"
                                class="btn">Change Password</button>
                        </div> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div style="position: fixed; top: 60px; right: 20px;">
    <div class="toast toast1 toast-bootstrap" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <div><i class="fa fa-newspaper-o"> </i></div>
            <div><strong class="mr-auto m-l-sm toast-title">Notification</strong></div>
            <div>
                <button type="button" class="ml-2 mb-1 close float-end" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        <div class="toast-body">
            Hello, you can push notifications to your visitors with this toast feature.
        </div>
    </div>
</div>
<!-- <button type="button" class="btn btn-primary" id="showtoast">Show Toast</button> -->

@endsection