@extends('layouts.master')
@section('content-dashboard')
<div class="container-fluid pt-0">
    <h1 class="mt-0">View Profile</h1>
    <ol class="breadcrumb mb-3"></ol>
    <div class="row">
        <div class="col-6 px-2">
            <div class="card shadow p-2 mb-5 bg-white rounded" style="width: 100%; height:100%">
                <div class="card-header">View Information</div>
                <div class="row px-4 pb-4">
                    <form id="ProfileUpdate" method="POST" action="javascript:void(0)" class="row g-3 needs-validation" novalidate>
                        @csrf
                        <span hidden>user id</span>
                        <input type="text" id="user_id" value="{{$findid->id}}" hidden>
                        <input type="text" id="profile_id_show" name="profile_id_show" hidden>

                        <div class="col mb-3">
                            <div class="profile-pic-div" style="position: relative; height:200px">
                                <img src="/images/default.png" id="photo">
                                <input name="file" type="file" id="file" disabled="true">
                                <label for="file" id="uploadBtn">Choose Photo</label>
                            </div>
                        </div>

                        <div class="col pt-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="profile_status" name="profile_status" checked disabled="true">
                                <label class="form-check-label" for="status">
                                    Active
                                </label>
                            </div>

                            <div class="mb-3">
                                <label mb-2 style="color: #A4A6B3;">First Name</label>
                                <input id="first_name" name="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror " placeholder="First Name" value="{{ old('first_name') }}" disabled="true">
                            </div>
                            <div class="mb-3">
                                <label mb-2 style="color: #A4A6B3;">Last Name</label>
                                <input id="last_name" name="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror " placeholder="Last Name" value="{{ old('last_name') }}" disabled="true">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Email</label>
                            <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" disabled="true">
                        </div>
                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Username</label>
                            <input id="username" name="username" type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Username" disabled="true">
                        </div>
                        <!--                         
                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Password</label>
                            <input id="password" name="password" type="text"
                                class="form-control @error('password') is-invalid @enderror" placeholder="Password"
                            >
                        </div> -->

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Position</label>
                            <select class="form-select @error('position') is-invalid @enderror" id="position" name="position" aria-label="Default select example" defaultValue="select" disabled="true">
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
                            <input id="phone_number" name="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Phone Number" disabled="true">
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Address</label>
                            <input id="address" name="address" type="text" class="form-control @error('address') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Address" disabled="true">
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Province</label>
                            <input id="province" name="province" type="text" class="form-control @error('province') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Province" disabled="true">
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">City</label>
                            <input id="city" name="city" type="text" class="form-control @error('city') is-invalid @enderror" id="formGroupExampleInput2" placeholder="City" disabled="true">
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Zip Code</label>
                            <input id="zip_code" name="zip_code" type="text" class="form-control @error('zip_code') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Zip Code" disabled="true">
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Account Number</label>
                            <input id="acct_no" name="acct_no" type="text" class="form-control @error('acct_no') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Account Number" disabled="true">
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Account Name</label>
                            <input id="acct_name" name="acct_name" type="text" class="form-control @error('acct_name') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Account Name" disabled="true">
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Bank Name</label>
                            <select class="form-select @error('bank_name') is-invalid @enderror" id="bank_name" name="bank_name" aria-label="Default select example" disabled="true">
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
                            <input id="bank_location" name="bank_location" type="text" class="form-control @error('bank_location') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Bank Address" disabled="true">
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Gcash Number</label>
                            <input id="gcash_no" name="gcash_no" type="text" class="form-control @error('gcash_no') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Gcash Number" disabled="true">
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Date Hired</label>
                            <input id="date_hired" name="date_hired" type="date" class="form-control @error('date_hired') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Date Hired" disabled="true">
                        </div>

                        <div class="col mb-3">
                            <button type="button" id="edit_profile" style="width:100%; height:50px;color:white; background-color: #A4A6B3;" class="btn">Edit
                                Profile</button>
                        </div>
                        <div class="col mb-3">
                            <button type="submit" style="width:100%; height:50px;color:white; background-color: #CF8029;" class="btn ">Update Profile</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <div class="col-6 px-1">
            <div class="row">
                <div class="col">
                    <div class="card shadow p-2 mb-5 bg-white rounded" style="width: 100%; height:100%">
                        <!-- <div class="card-header">Profile Information</div> -->
                        <ul class="nav nav-pills mb-3 " id="pills-tab" role="tablist">

                            <li class="nav-item" role="presentation" style="width:50%">
                                <button style="width:100%" class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-selected="true">Invoices</button>
                            </li>

                            <li class="nav-item" role="presentation" style="width:50%">
                                <button style="width:100%" class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Deductions</button>
                            </li>
                        </ul>
                        <form id="CreateInvoice" method="POST" action="javascript:void(0)" class="row g-3 needs-validation" novalidate>
                            @csrf
                            <div class="col-md-4">
                                <div class="input-group">

                                </div>
                            </div>
                        </form>

                        <div class="form-group has-search">
                            <div class=" tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                                    <div class="col-md-4 w-100">
                                        <div class="input-group">
                                            <button style="color:white; background-color: #CF8029;" data-bs-toggle="modal" data-bs-target="#exampleModal" type="submit" id="button-addon2" name="button-addon2" class="btn form-check-inline pe-3 "><i class="fa fa-plus pe-1"></i>Add
                                                Invoice</button>
                                            <select class="form-check-inline form-select" id="filter_all_invoices">
                                                <!-- <option selected value="" disabled>Filter</option> -->
                                                <option value="All">All</option>
                                                <option value="Cancelled">Cancelled</option>
                                                <option value="Paid">Paid</option>
                                                <option value="Pending">Pending</option>
                                            </select>
                                            <div class="form-group has-search">
                                                <span class="fa fa-search form-control-feedback"></span>
                                                <input type="text" class="form-control" id="search_invoice" placeholder="Search">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body table-responsive">
                                        <table style=" color: #A4A6B3;font-size: 14px;" class="table table-hover" id="dataTable_invoice">
                                            <thead>
                                                <tr>
                                                    <th style="text-align:right;">Invoice #</th>
                                                    <th style="text-align:center;">Status</th>
                                                    <th style="text-align:center;">Date Created</th>
                                                    <th style="text-align:right;">Total Amount</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                        <div style="display: flex; justify-content: space-between;">
                                            <div class="page_showing" id="tbl_showing_invoice"></div>
                                            <ul class="pagination" id="tbl_pagination_invoice"></ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

                                    <div class="col-md-4 w-100">
                                        <div class="input-group">
                                            <button type="button" id="submit-create-deduction" class="btn form-check-inline pe-3" data-bs-toggle="modal" data-bs-target="#modal-create-deduction" style="color:white; background-color: #CF8029;">
                                                <i class="fa fa-plus pe-1"></i>
                                                Add Deduction
                                            </button>

                                            <select class="form-check-inline form-select" id="filter_all_deductions">
                                                <!-- <option selected value="" disabled>Filter</option> -->
                                                <option value="All">All</option>
                                                <option value="Cancelled">Cancelled</option>
                                                <option value="Paid">Paid</option>
                                                <option value="Pending">Pending</option>
                                            </select>

                                            <div class="form-group has-search">
                                                <span class="fa fa-search form-control-feedback"></span>
                                                <input type="text" class="form-control" id="search_deduction" placeholder="Search">
                                            </div>

                                            <div class="col-12 pt-3">
                                                <table class="table-responsive" id="tableDeleteProfileDeductioType">
                                                    <thead></thead>
                                                    <tbody>
                                                        <tr>

                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body table-responsive pt-0">
                                        <table style="color: #A4A6B3;font-size: 14px;" class="table table-hover" id="dataTable_deduction">
                                            <thead>
                                                <tr>
                                                    <th>Invoice #</th>
                                                    <th>Status</th>
                                                    <th>Deduction Name</th>
                                                    <th>Amount</th>
                                                    <th class="text-center">Date Created</th>
                                                    <th class="text-center" id="action1">Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                        <div style="display: flex; justify-content: space-between;">
                                            <div class="page_showing" id="tbl_showing_deduction"></div>
                                            <ul class="pagination" id="tbl_pagination_deduction"></ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- START CREATE INVOICE MODAL -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="width:100%;">
            <div class=" modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="createnvoice1">Add Invoice</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row whole_row">
                        <form id="invoice_items">
                            @csrf
                            <div class="row px-4 pb-4" id="header">
                                <div class="col-md-6 px-2 w-100">
                                    <div class="card shadow p-2 mb-5 bg-white rounded">

                                        <div class="row px-4 pb-4" id="header">
                                            <div class="col-12 mb-3">
                                                <input id="profile_id" name="profile_id" type="text" hidden>
                                                <div class="form-group w-50">
                                                    <!-- <label class="formGroupExampleInput2">Invoice #</label> -->
                                                    <input id="invoice_no" style="font-weight: bold;border:none;background-color:white" disabled name="invoice_no" type="text" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-12 mb-3">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class=" form-group">
                                                            <label class=" formGroupExampleInput2">Description</label>
                                                            <input id="invoice_description" name="invoice_description" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12" id="show_items">
                                                <!-- FOR TABLE INVOICE DESCRIPTION DISPLAY -->
                                            </div>

                                            <div class="col-8 mb-3"></div>
                                            <div class="col-4 mb-3">
                                                <div class="row">
                                                    <div class="col-4 md-2 w-100">
                                                        <div class="form-group">
                                                            </br>
                                                            <button class="btn btn-secondary" style="width:100%;color:white; background-color: #CF8029;" id="add_item">Add
                                                                Item</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 mb-3">
                                                <div class="row">
                                                    <div class="col" style="display: flex;flex-direction: column-reverse;align-items: center;">
                                                        <div class="form-group">
                                                            <label class="formGroupExampleInput2">Discount
                                                                Type</label>
                                                            <br>
                                                            <input class="form-check-input" type="radio" name="discount_type" id="discount_type" value="Fixed">
                                                            <label class="formGroupExampleInput2">
                                                                Fxd &nbsp; &nbsp;
                                                            </label>
                                                            <input class="discount_type form-check-input" type="radio" name="discount_type" id="discount_type" value="Percentage">
                                                            <label class="formGroupExampleInput2">
                                                                %
                                                            </label>
                                                            <!-- <input type="text" id="discount_type" class="form-control" /> -->

                                                        </div>
                                                    </div>

                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label class="formGroupExampleInput2 label_discount_amount">Discount
                                                                Amount ($)</label>
                                                            <input type="text" step="any" style="text-align:right;" name="discount_amount" id="discount_amount" class="form-control" />
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label class="formGroupExampleInput2 label_discount_total">Discount
                                                                Total ($)</label>
                                                            <input type="text" disabled style="text-align:right; border:0px;background-color:white;" onkeypress="return onlyNumberKey(event)" name="discount_total" id="discount_total" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 mb-3">
                                                <div class="row">
                                                    <div class="col-12 my-3" style="justify-content:end;display:flex">
                                                        <div class="form-group">
                                                            <!-- border-style:none -->
                                                            <label>Subtotal ($): </label>
                                                            <input type="text" style="font-weight: bold;text-align:right;border:none;background-color:white" name="subtotal" id="subtotal" class="form-control no-outline subtotal" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 mb-3">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label class="formGroupExampleInput2">Dollar Amount
                                                                ($)</label>
                                                            <input type="text" id="dollar_amount" style="font-weight: bold;border:none; text-align:right;background-color:white" class="form-control dollar_amount" disabled />

                                                        </div>
                                                    </div>

                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label class="formGroupExampleInput2">Peso Rate
                                                                (Php)</label>
                                                            <input type="text" style="font-weight: bold;border:none; text-align:right;background-color:white" onkeypress="return onlyNumberKey(event)" id="peso_rate" class="form-control" disabled />
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label class="formGroupExampleInput2" for="form3Example2">Converted
                                                                Amount (Php)</label>
                                                            <input type="text" style="font-weight: bold;border:none; text-align:right;background-color:white" onkeypress="return onlyNumberKey(event)" id="converted_amount" class="form-control converted_amount" disabled />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 mb-3">
                                                <div class="row">
                                                    <div class="col">
                                                        <h3> DEDUCTIONS </h3>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12" id="show_deduction_items">
                                            </div>

                                            <div class="col-12 mb-3">
                                                <div class="row">
                                                    <div class="col-8"></div>
                                                    <div class="col-4 text-center mb-3">
                                                        <h4> Grand Total </h4>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 mb-3">
                                                <div class="row">
                                                    <div class="col-8" style="text-align:right;">
                                                        <label style="vertical-align: -webkit-baseline-middle">Total
                                                            (Php):
                                                            <label>
                                                    </div>
                                                    <div class="col-4 mb-3" style="justify-content:end;display:flex">
                                                        <!-- border-style:none -->
                                                        <input type="text" id="grand_total" class="form-control no-outline" style="text-align:right;border:0;background-color:white;" disabled>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 mb-3">
                                                <div class="row">
                                                    <div class="col-12 form-control">
                                                        <label for="floatingTextarea">Notes</label>
                                                        <textarea class="form-control" placeholder="Leave a notes here" id="notes" name="notes"></textarea>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6 mb-3">
                                                <div class="pb-3">
                                                    <button type="button" class="btn btn-secondary w-100" style=" color:#CF8029; background-color:white; " data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <div class="pb-3">
                                                    <button type="submit" id="save" class="btn btn-secondary w-100" style="color:White; background-color:#CF8029;">Save</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="position:fixed;top:60px;right:20px;z-index:99999;justify-content:flex-end;display:flex;">
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


    <!-- START MODAL ADD -->
    <div class="modal fade" id="modal-create-deduction" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-dialog">
                <div class="modal-content ">
                    <div class="modal-body ">
                        <div class="row">
                            <h5> Create Deduction </h5>
                            <form id="deductiontype_store" method="POST" action="javascript:void(0)" class="row g-3 needs-validation" novalidate>
                                @csrf
                                <input type="text" id="createDeduction_profile_id" hidden>
                                <div class="form-group mt-3" id="select_deduction_name">
                                    <label for="formGroupExampleInput">Deduction Name</label>
                                    <select class="createDeduction_deduction_name form-select" name="createDeduction_deduction_name" id="createDeduction_deduction_name">
                                        <option selected disabled value="">Please Select Deductions</option>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="formGroupExampleInput">Amount</label>
                                    <input id="createDeduction_deduction_amount" name="createDeduction_deduction_amount" type="text" class="createDeduction_deduction_amount form-control" placeholder="Amount">

                                    <div class="row mt-3">
                                        <div class="col">
                                            <button type="button" class="btn btn-secondary w-100" style=" color:#CF8029; background-color:white; " data-bs-dismiss="modal">Close</button>
                                        </div>
                                        <div class="col">
                                            <button type="submit" id="createDeduction_button" class="btn btn-secondary w-100" style="color:White; background-color:#CF8029;">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL ADD -->

    <!-- START MODAL DEDUCTION EDIT -->
    <!-- <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-dialog">
                <div class="modal-content ">
                    <div class="modal-body ">
                        <div class="row">
                            <h5> Update Deduction</h5>
                            <form id="deductiontype_update">
                                @csrf
                                <input type="text" id="deduction_id" hidden>

                                <div class="form-group mt-3">
                                    <label for="formGroupExampleInput">Deduction Name</label>
                                    <input id="edit_deduction_name" type="text" class="form-control" placeholder="Deduction Name">
                                </div>

                                <div class="form-group">
                                    <label for="formGroupExampleInput">Amount</label>
                                    <input id="edit_deduction_amount" type="text" class="form-control" placeholder="Amount">

                                    <div class="row mt-3">
                                        <div class="col">
                                            <button type="button" class="btn btn-secondary w-100" style=" color:#CF8029; background-color:white; " data-bs-dismiss="modal">Close</button>
                                        </div>
                                        <div class="col">
                                            <button type="submit" class="btn btn-secondary w-100" style="color:White; background-color:#CF8029; " data-bs-dismiss="modal">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- START MODAL DEDUCTION EDIT -->

    <!-- START MODAL PROFILE DEDUCTION TYPE EDIT -->
    <div class="modal fade" id="ProfileDeductioneditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-dialog">
                <div class="modal-content ">
                    <div class="modal-body ">
                        <div class="row">
                            <h5> Update Profile Deduction</h5>
                            <form id="ProfileDeductiontype_update">
                                @csrf
                                <input type="text" id="profileDeductionType_id" hidden>

                                <div class="form-group mt-3">
                                    <label for="formGroupExampleInput">Profile Deduction Name</label>
                                    <input type="text" id="edit_profileDeductionType_name" class="form-control" disabled>
                                </div>

                                <div class="form-group">
                                    <label for="formGroupExampleInput">Amount</label>
                                    <input id="edit_profileDeductionType_amount" type="text" class="form-control" placeholder="Amount">

                                    <div class="row mt-3">
                                        <div class="col">
                                            <button type="button" class="btn btn-secondary w-100" style=" color:#CF8029; background-color:white; " data-bs-dismiss="modal">Close</button>
                                        </div>
                                        <div class="col">
                                            <button type="submit" class="btn btn-secondary w-100" style="color:White; background-color:#CF8029; " data-bs-dismiss="modal">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- START MODAL DEDUCTION EDIT -->

    <!-- START MODAL UPDATE INVOICE STATUS -->
    <div class="modal fade" id="invoice_status" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-dialog">
                <div class="modal-content ">
                    <div class="modal-body ">
                        <div class="row">
                            <h5>Update Invoice Status</h5>
                            <form id="update_invoice_status">
                                @csrf
                                <input type="text" id="updateStatus_invoiceNo" hidden>
                                <div class="form-group mt-3">
                                    <label for="formGroupExampleInput">Status Name</label>
                                    <select class="form-select" id="select_invoice_status">
                                        <option value="" Selected disabled>Please choose status</option>
                                        <option value="Cancelled">Cancelled</option>
                                        <option value="Overdue">Overdue</option>
                                        <option value="Paid">Paid</option>
                                        <option value="Pending">Pending</option>
                                    </select>
                                </div>


                                <div class="row mt-3">
                                    <div class="col">
                                        <button type="button" class="btn btn-secondary w-100" style=" color:#CF8029; background-color:white; " data-bs-dismiss="modal">Close</button>
                                    </div>
                                    <div class="col">
                                        <button type="submit" id="update" class="btn btn-secondary w-100" style="color:White; background-color:#CF8029; ">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- START MODAL UPDATE INVOICE STATUS -->

    <script src="{{ asset('/assets/js/fileupload.js') }}"></script>

    <script type="text/javascript">
        let total_deduction_amount = 0
        let x = 1;

        const PHP = value => currency(value, {
            symbol: '',
            decimal: '.',
            separator: ','
        });

        // INVOICE SEARCH AND DISPLAY
        $(document).ready(function() {

            show_edit();

            $('#edit_profile').on('click', function(e) {
                $('#file').prop('disabled', false);
                $('#profile_status').prop('disabled', false);
                $('#first_name').prop('disabled', false);
                $("#first_name").prop('disabled', false);
                $("#last_name").prop('disabled', false);
                $("#email").prop('disabled', false);
                $("#position").prop('disabled', false);
                $("#username").prop('disabled', false);
                $("#phone_number").prop('disabled', false);
                $("#address").prop('disabled', false);
                $("#province").prop('disabled', false);
                $("#city").prop('disabled', false);
                $("#zip_code").prop('disabled', false);
                $("#profile_status").prop('disabled', false);
                $("#acct_no").prop('disabled', false);
                $("#bank_name").prop('disabled', false);
                $("#acct_name").prop('disabled', false);
                $("#bank_location").prop('disabled', false);
                $("#gcash_no").prop('disabled', false);
                $("#date_hired").prop('disabled', false);
            })

            // UPDATE INVOICE STATUS


            // SHOW CURRENT INVOICE STATUS
            $(document).on('click', '#dataTable_invoice #get_invoiceStatus', function(e) {
                e.preventDefault();
                let rowData = $(this).closest('tr');
                let invoice_no = rowData.find("td:eq(0)").text();
                $('#updateStatus_invoiceNo').val(invoice_no);
                // let invoice_status = $('#select_invoice_status').val();
                // console.log("INVOICE NO", invoice_no + " " + invoice_status);

                axios.get(apiUrl + '/api/getInvoiceStatus/' + invoice_no, {
                    headers: {
                        Authorization: token,
                    },
                }).then(function(response) {
                    let data = response.data;
                    if (data.success) {
                        $('#select_invoice_status').val(data.data);
                    }
                }).catch(function(error) {
                    console.log("ERROR", error);
                })
            })

            // POST INVOICE STATUS
            $('#update_invoice_status').submit(function(e) {
                e.preventDefault();
                let invoice_id = $('#updateStatus_invoiceNo').val();
                let invoice_status = $('#select_invoice_status').val();

                let data = {
                    id: invoice_id,
                    invoice_status: invoice_status,
                };
                axios.post(apiUrl + '/api/update_status', data, {
                    headers: {
                        Authorization: token
                    },
                }).then(function(response) {
                    let data = response.data;
                    console.log("DATA", data);
                    if (data.success) {

                        $('.toast1 .toast-title').html('Update Status');
                        $('.toast1 .toast-body').html(response.data.message);

                        toast1.toast('show');
                        setTimeout(function() {
                            $('#invoice_status').modal('hide');
                        }, 1500);
                        $("#update").attr("data-bs-dismiss", "modal");

                    }
                }).catch(function(error) {
                    if (error.response.data.errors) {
                        let errors = error.response.data.errors;
                        console.log("errors", errors);
                        let fieldnames = Object.keys(errors);

                        Object.values(errors).map((item, index) => {
                            fieldname = fieldnames[0].split('_');
                            fieldname.map((item2, index2) => {
                                fieldname['key'] = capitalize(item2);
                                return ""
                            });
                            fieldname = fieldname.join(" ");

                            $('.toast1 .toast-title').html(fieldname);
                            $('.toast1 .toast-body').html(Object.values(errors)[
                                0].join(
                                "\n\r"));
                        })
                        toast1.toast('show');
                    }
                })

            })

            function show_edit() {
                let user_id = $('#user_id').val();
                axios.get(apiUrl + '/api/admin/show_edit/' + user_id, {
                        headers: {
                            Authorization: token,
                        },
                    })
                    .then(function(response) {
                        let data = response.data;
                        if (data.success) {
                            // console.log("SUCCESS");
                            // console.log("GENERAL", data.data.email);
                            // console.log("PROFILE SHOW EDIT", data.data.profile);
                            $('#profile_id_show').val(data.data.profile.id);
                            $('#first_name').val(data.data.first_name);
                            $('#last_name').val(data.data.last_name);
                            $('#email').val(data.data.email);
                            $('#username').val(data.data.username);
                            // $('#password').val(data.data.password);
                            $('#position').val(data.data.profile.position);
                            $('#phone_number').val(data.data.profile.phone_number);
                            $('#address').val(data.data.profile.address);
                            $('#province').val(data.data.profile.province);
                            $('#city').val(data.data.profile.city);
                            $('#zip_code').val(data.data.profile.zip_code);
                            $('#acct_no').val(data.data.profile.acct_no);
                            $('#acct_name').val(data.data.profile.acct_name);
                            $('#bank_name').val(data.data.profile.bank_name);
                            $('#bank_location').val(data.data.profile.bank_location);
                            $('#gcash_no').val(data.data.profile.gcash_no);
                            $('#date_hired').val(data.data.profile.date_hired);
                            $("#photo").attr("src", data.data.profile.file_path);
                            if (data.data.profile.file_path) {
                                $('#photo').val(data.data.profile.file_path);
                            } else {
                                $("#photo").attr("src", "/images/default.png");
                            }

                            // console.log('profile_deduction_types', data);

                        }

                    })
                    .catch(function(error) {
                        console.log("ERROR", error);
                    });
            }

            $('#search_invoice').on('change', function() {
                show_data();
            })

            $("#tbl_pagination_invoice").on('click', '.page-item', function() {
                show_data();
            })

            $('#filter_all_invoices').on('change', function() {
                console.log($(this).val());
                show_data();
            });

            show_data();
            // SHOW DATA ON TABLE
            function show_data(filters) {
                let url = window.location.pathname;
                let urlSplit = url.split('/');


                if (urlSplit.length === 5) {
                    // console.log("sddsadsa", urlSplit.length);
                    let page = $("#tbl_pagination_invoice .page-item.active .page-link").html();
                    let filter = {
                        page_size: 10,
                        page: page ? page : 1,
                        user_id: urlSplit[3],
                        search: $('#search_invoice').val(),
                        filter_all_invoices: $('#filter_all_invoices').val()

                    }
                    // console.log("page", page);
                    $('#dataTable_invoice tbody').empty();
                    axios.get(`${apiUrl}/api/admin/show_invoice?${new URLSearchParams(filter)}`, {
                        headers: {
                            Authorization: token,
                        },
                    }).then(function(response) {
                        let data = response.data;
                        // console.log("SHOW DATA", data);
                        if (data.success) {
                            if (data.data.data.length > 0) {
                                data.data.data.map((item) => {
                                    let newdate = new Date(item.created_at);
                                    var mm = newdate.getMonth() + 1;
                                    var dd = newdate.getDate();
                                    var yy = newdate.getFullYear();
                                    let tr = '<tr style="vertical-align: middle;">';
                                    tr += '<td hidden>' + item.id + '</td>'
                                    tr += '<td style="text-align:right;">' +
                                        item.invoice_no +
                                        '</td>';

                                    if (item.invoice_status == "Pending") {
                                        tr +=
                                            '<td style="text-align:right;width:120px;"><button data-bs-toggle="modal" data-bs-target="#invoice_status" style="width:100%; height:20px; font-size:10px; padding: 0px;" type="button" id="get_invoiceStatus" class="get_invoiceStatus btn btn-danger" > Pending </button></td >';
                                    } else if (item.invoice_status == "Overdue") {
                                        tr +=
                                            '<td style="text-align:right;width:120px;"><button data-bs-toggle="modal" data-bs-target="#invoice_status" style="width:100%; height:20px; font-size:10px; padding: 0px;" type="button" id="get_invoiceStatus" class="get_invoiceStatus btn btn-danger">Overdue</button></td>';
                                    } else if (item.invoice_status == "Cancelled") {
                                        tr +=
                                            '<td style="text-align:right;width:120px;"><button data-bs-toggle="modal" data-bs-target="#invoice_status" style="width:100%; height:20px; font-size:10px; padding: 0px;" type="button" id="get_invoiceStatus" class="get_invoiceStatus btn btn-info">Cancelled</button></td>';
                                    } else {
                                        tr +=
                                            '<td style="text-align:right;width:120px;"><button data-bs-toggle="modal" data-bs-target="#invoice_status" style="width:100%; height:20px; font-size:10px; padding: 0px;" type="button" id="get_invoiceStatus" class="get_invoiceStatus btn btn-success">Paid</button></td>';
                                    }

                                    tr += '<td style="text-align:center;">' + mm + '-' +
                                        dd +
                                        '-' +
                                        yy + '</td>';
                                    tr += '<td style="text-align:right;">' + Number(
                                            parseFloat(item
                                                .grand_total_amount).toFixed(2))
                                        .toLocaleString(
                                            'en', {
                                                minimumFractionDigits: 2
                                            }) +
                                        '</td>';
                                    tr +=
                                        '<td class="text-center"> <a href="' +
                                        apiUrl +
                                        '/admin/editInvoice/' +
                                        item.id +
                                        '" class="btn"><i class="fa-sharp fa-solid fa-eye view-hover"></i></a> </td>';
                                    tr += '</tr>';

                                    $("#dataTable_invoice tbody").append(tr);
                                    return ''

                                })
                                $('#tbl_pagination_invoice').empty();
                                data.data.links.map(item => {
                                    let li =
                                        `<li class="page-item cursor-pointer ${item.active ? 'active' : ''}"><a class="page-link" data-url="${item.url}">${item.label}</a></li>`
                                    $('#tbl_pagination_invoice').append(li)
                                    return ""
                                })

                                $("#tbl_pagination_invoice .page-item .page-link").on('click',
                                    function() {

                                        $("#tbl_pagination_invoice .page-item").removeClass(
                                            'active');
                                        $(this).closest('.page-item').addClass('active');
                                        let url = $(this).data('url')
                                        $.urlParam = function(name) {
                                            var results = new RegExp("[?&]" + name +
                                                    "=([^&#]*)")
                                                .exec(
                                                    url
                                                );

                                            return results !== null ? results[1] || 0 :
                                                false;
                                        };
                                    })
                                let tbl_showing_invoice =
                                    `Showing ${data.data.from} to ${data.data.to} of ${data.data.total} entries`;
                                $('#tbl_showing_invoice').html(tbl_showing_invoice);
                            } else {
                                $("#dataTable_invoice tbody").append(
                                    '<tr><td colspan="6" class="text-center">No data</td></tr>'
                                );
                            }
                        }
                    }).catch(function(error) {
                        console.log("ERROR DISPLAY", error);
                    });
                }
            }

            let toast1 = $('.toast1');
            toast1.toast({
                delay: 3000,
                animation: true,

            });

            $('.close').on('click', function(e) {
                e.preventDefault();
                toast1.toast('hide');
            });
            $("#error_msg").hide();
            $("#success_msg").hide();

            $('#ProfileUpdate').submit(function(e) {
                e.preventDefault();
                if (document.getElementById("profile_status").disabled) {
                    $('.toast1 .toast-title').html("View Profile");
                    $('.toast1 .toast-body').html("Please click edit profile to update.");
                    toast1.toast('show');
                } else {
                    let user_id = $("#user_id").val();
                    let profile_id = $("#profile_id").val();
                    let first_name = $("#first_name").val();
                    let last_name = $("#last_name").val();
                    let email = $("#email").val();
                    let position = $("#position").val();
                    // let password = $("#password").val();
                    let username = $("#username").val();
                    let phone_number = $("#phone_number").val();
                    let address = $("#address").val();
                    let province = $("#province").val();
                    let city = $("#city").val();
                    let zip_code = $("#zip_code").val();
                    let profile_status = $("#profile_status").val();
                    let acct_no = $("#acct_no").val();
                    let acct_name = $("#acct_name").val();
                    let bank_name = $("#bank_name").val();
                    let bank_location = $("#bank_location").val();
                    let gcash_no = $("#gcash_no").val();
                    let date_hired = $("#date_hired").val();
                    let deduction_type_id = $('#select2Multiple').val();
                    let formData = new FormData();
                    formData.append('id', user_id);
                    formData.append('profile_id', profile_id);
                    formData.append('first_name', first_name);
                    formData.append('last_name', last_name);
                    formData.append('email', email);
                    formData.append('username', username);
                    // formData.append('password', "");
                    formData.append('position', position ?? "");
                    formData.append('phone_number', phone_number);
                    formData.append('address', address);
                    formData.append('province', province);
                    formData.append('city', city);
                    formData.append('zip_code', zip_code);
                    if (document.getElementById('profile_status').checked == true) {
                        formData.append('profile_status', 'Active');
                    } else {
                        formData.append('profile_status', 'Inactive');
                    }
                    formData.append('acct_no', acct_no);
                    formData.append('acct_name', acct_name);
                    formData.append('bank_name', bank_name ?? "");
                    formData.append('bank_location', bank_location);
                    formData.append('gcash_no', gcash_no);
                    formData.append('date_hired', date_hired);
                    // SENDING ARRAY IN API
                    if (document.getElementById('file').files.length > 0) {
                        formData.append('profile_picture', document.getElementById('file')
                            .files[0],
                            document.getElementById('file').files[0].name);
                    }
                    // console.log("PICTURE", document.getElementById('file').files[0],
                    // document.getElementById('file').files[0].name);
                    axios.post(apiUrl + '/api/saveprofile', formData, {
                            headers: {
                                Authorization: token,
                                "Content-Type": "multipart/form-data",
                            },
                        })
                        .then(function(response) {
                            let data = response.data;
                            console.log("SUCCESS", data);
                            if (data.success == true) {
                                $("#first_name").val("");
                                $("#last_name").val("");
                                $("#email").val("");
                                $("#username").val("");
                                $("#position").val("");
                                $("#phone_number").val("");
                                $("#address").val("");
                                $("#province").val("");
                                $("#city").val("");
                                $("#zip_code").val("");
                                $("#profile_status").val("");
                                $("#acct_no").val("");
                                $("#acct_name").val("");
                                $("#bank_name").val("");
                                $("#bank_location").val("");
                                $("#gcash_no").val("");
                                $("#date_hired").val("");
                                $("#photo").attr("src", "/images/default.png");

                                // select2Multiple
                                $('.toast1 .toast-title').html('Profile');
                                $('.toast1 .toast-body').html(data.message);

                                // show_deduction_data();
                                $('#tableDeleteProfileDeductioType tbody tr').empty();
                                $('#tableDeleteProfileDeductioType tbody tr').html(
                                    show_profileDeductionType_data());
                                toast1.toast('show');
                            }
                        })
                        .catch(function(error) {
                            if (error.response.data.errors) {
                                let errors = error.response.data.errors;
                                let fieldnames = Object.keys(errors);
                                Object.values(errors).map((item, index) => {
                                    fieldname = fieldnames[0].split('_');
                                    fieldname.map((item2, index2) => {
                                        fieldname['key'] = capitalize(
                                            item2);
                                        return ""
                                    });
                                    fieldname = fieldname.join(" ");
                                    $('.toast1 .toast-title').html(fieldname);
                                    $('.toast1 .toast-body').html(Object.values(
                                            errors)[0]
                                        .join(
                                            "\n\r"));
                                })
                                toast1.toast('show');
                            }
                        });
                }

            })

            // REMOVE PROFILE DEDUCTION 
            $(document).on('click', '#tableDeleteProfileDeductioType .deleteProfileDeduction', function(
                e) {
                e.preventDefault();
                let row = $(this).closest("td");
                let profileDeductionType_id = row.find(".editProfileDeduction").val();
                console.log("delete", profileDeductionType_id);
                // })
                axios.post(apiUrl + '/api/deleteProfileDeductionTypes/' +
                    profileDeductionType_id, {
                        headers: {
                            Authorization: token
                        },
                    }).then(function(response) {
                    let data = response.data;
                    $('.toast1 .toast-title').html('Profile Deduction');
                    $('.toast1 .toast-body').html(data.message);

                    $('#dataTable_deduction tbody').empty();
                    $('#dataTable_deduction tbody').html(
                        show_deduction_dataOnDeductions());
                    $('#tableDeleteProfileDeductioType tbody tr').empty();
                    $('#tableDeleteProfileDeductioType tbody tr').html(
                        show_profileDeductionType_data());

                    toast1.toast('show');


                }).catch(function(error) {
                    if (error.response.data.errors) {
                        let errors = error.response.data.errors;
                        let fieldnames = Object.keys(errors);
                        Object.values(errors).map((item, index) => {
                            fieldname = fieldnames[0].split('_');
                            fieldname.map((item2, index2) => {
                                fieldname['key'] = capitalize(item2);
                                return ""
                            });
                            fieldname = fieldname.join(" ");
                            $('.toast1 .toast-title').html(fieldname);
                            $('.toast1 .toast-body').html(Object.values(errors)[
                                    0]
                                .join(
                                    "\n\r"));
                        })
                        toast1.toast('show');
                    }
                })
            })

            // SHOW EDIT PROFILE DEDUCTION TYPE
            $(document).on('click', '#tableDeleteProfileDeductioType .editProfileDeduction', function(
                e) {
                e.preventDefault();
                $('#profileDeductionType_id').val($(this).val());
                let profileDeductionType_id = $('#profileDeductionType_id').val();
                console.log("EDIT FOR UPATE", profileDeductionType_id);

                axios.post(apiUrl + '/api/showProfileDeductionTypes/' +
                    profileDeductionType_id, {
                        headers: {
                            Authorization: token
                        },
                    }).then(function(response) {
                    let data = response.data;

                    $('#edit_profileDeductionType_name').val(data.data.deduction_type
                        .deduction_name);
                    $('#edit_profileDeductionType_amount').val(data.data.amount);

                }).catch(function(error) {
                    console.log("ERROR", error);
                })
            })


            $('.select2-multiple').select2({
                placeholder: "Select",
                // allowClear: true
            });

            //  For creating invoice codes
            const api = "https://api.exchangerate-api.com/v4/latest/USD";

            display_item_rows();

            $("#discount_amount").addClass('d-none');
            $("#discount_total").addClass('d-none');
            $(
                ".label_discount_amount").addClass('d-none');
            $(".label_discount_total").addClass('d-none');

            $('input[type=radio][id=discount_type]').change(function() {

                if (subtotal == 0) {
                    $("#discount_amount").addClass('d-none');
                    $("#discount_total").addClass('d-none');
                    $(".label_discount_amount").addClass('d-none');
                    $(".label_discount_total").addClass('d-none');
                } else {
                    if (this.value == 'Fixed') {
                        //write your logic here
                        // console.log("FIXED");
                        $("#discount_amount").removeClass('d-none');
                        $("#discount_total").removeClass('d-none');
                        $(".label_discount_amount").removeClass('d-none');
                        $(".label_discount_total").removeClass('d-none');

                        $('#discount_amount').val('0.00');
                        $('#discount_total').val('0.00');

                    } else if (this.value == 'Percentage') {
                        //write your logic here
                        // console.log("PERCENTAGE");
                        $("#discount_amount").removeClass('d-none');
                        $("#discount_total").removeClass('d-none');
                        $(".label_discount_amount").removeClass('d-none');
                        $(".label_discount_total").removeClass('d-none');

                        $('#discount_amount').val('0.00');
                        $('#discount_total').val('0.00');
                    }
                }
                subtotal();
                Additems_total();
            })

            $('#discount_amount').on('keyup', function() {
                subtotal();
            })

            function subtotal() {
                let discount_type = $("input[id='discount_type']:checked").val();
                let discount_amount = $('#discount_amount').val();
                let discount_total = $('#discount_total').val();
                let subtotal = $('#subtotal').val();
                var sum = 0;

                $('#show_items .amount').each(function() {
                    sum += Number($(this).val().replaceAll(',', ''));
                });

                if (discount_type == 'Fixed') {
                    $('#discount_total').val(PHP(parseFloat(discount_amount ? discount_amount : 0) * 1).format());
                    let sub_total = (sum - $('#discount_total').val().replaceAll(',', ''));
                    $('#subtotal').val(PHP(sub_total).format());

                    let dollar_amount = $('#subtotal').val();
                    $('#dollar_amount').val(PHP(dollar_amount).format());
                    DeductionItems_total()
                } else if (discount_type == 'Percentage') {

                    let percentage = parseFloat(((discount_amount ? discount_amount : 0) / 100) * sum);
                    $('#discount_total').val(PHP(percentage).format());
                    let sub_total = (parseFloat(sum) - parseFloat(percentage));
                    $('#subtotal').val(PHP(sub_total).format());
                    $('#dollar_amount').val(PHP(sub_total).format());
                    DeductionItems_total()
                }
                getResults_Converted();

            }

            // FUNCTION FOR DISPLAY RESULTS AND CONVERTED AMOUNT
            function getResults_Converted() {
                fetch(`${api}`)
                    .then(currency => {
                        return currency.json();
                    }).then(displayResults);
            }

            // FUNCTION FOR DISPLAY RESULTS AND CONVERTED AMOUNT
            function displayResults(currency) {
                let dollar_amount = $("#dollar_amount").val().replaceAll(',', '');
                let peso_rate = 0;
                let converted_amount = 0;
                let fromRate = currency.rates['USD'];
                let toRate = currency.rates['PHP'];
                peso_rate = (toRate / fromRate);
                converted_amount = ((toRate / fromRate) * dollar_amount);
                $('#peso_rate').val(PHP(parseFloat(peso_rate)).format());
                $('#converted_amount').val(PHP(parseFloat(converted_amount)).format());

                // $('#grand_total').val((converted_amount - total_deduction_amount).toFixed(
                //     2));
            }

            $('#show_deduction_items').focusout('.multi2', function() {
                let deduction_sum = 0;
                $('#show_deduction_items .deduction_amount').each(function() {
                    let parent = $(this).closest('.row');
                    let deduction_amount = parent.find('.deduction_amount').val();
                    parent.find('.deduction_amount').val(PHP(deduction_amount)
                        .format());
                })
            })

            // FUNCTION FOR KEYUP CLASS DEDUCTIONS FOR DEDUCTIONS
            $('#show_deduction_items').on("keyup", ".multi2", function() {
                let grand_total = 0;
                let parent = $(this).closest('.row');
                let deduction_amount = parent.find('.deduction_amount').val() ? parent
                    .find(
                        '.deduction_amount')
                    .val() : 0;
                // grand_total = parseFloat($('#converted_amount').val().replaceAll(',', '')) - parseFloat(
                // deduction_amount.replaceAll(',', ''));
                // $('#grand_total').val(PHP(grand_total).format());
                DeductionItems_total();

            });

            $('#discount_amount').focusout(function() {
                if ($('#discount_amount').val() == "") {
                    $('#discount_amount').val('0.00');
                } else {
                    let discount_type = $("input[id='discount_type']:checked").val();
                    if (discount_type == 'Percentage') {
                        let discount_amount = $('#discount_amount').val();
                        $('#discount_amount').val(parseInt(discount_amount));
                    } else {
                        let discount_amount = $('#discount_amount').val();
                        $('#discount_amount').val(PHP(discount_amount).format());
                    }
                }
                DeductionItems_total();
            })

            $('#show_items').focusout(".multi", function() {
                let invoiceItems_sum = 0;
                $('#show_items .row1').each(function() {
                    let parent = $(this).closest('.row1');
                    let quantity = parent.find('.quantity').val();
                    let rate = parent.find('.rate').val();

                    parent.find('.quantity').val(PHP(quantity).format());
                    parent.find('.rate').val(PHP(rate).format());
                })
                DeductionItems_total();
            })

            // FUNCTION FOR KEYUP CLASS MULTI INPUTS FOR ADD ITEMS
            $('#show_items').on("keyup", ".multi", function() {
                let sub_total = 0;
                let parent = $(this).closest('.row');
                let quantity = parent.find('.quantity').val().replaceAll(',', '') ? parent.find(
                        '.quantity')
                    .val().replaceAll(',', '') : 0;
                let rate = parent.find('.rate').val().replaceAll(',', '') ? parent.find('.rate')
                    .val()
                    .replaceAll(',', '') : 0;
                sub_total = parseFloat(quantity * rate);

                parent.find('.amount').val(PHP(sub_total).format());
                getResults_Converted();
                Additems_total();
                subtotal();
            });

            // FUNCTION FOR DISPLAYING SUBTOTAL AMOUNT AND DOLLAR AMOUNT
            function Additems_total() {
                var sum = 0;
                let converted_amount = 0;
                $('#show_items .amount').each(function() {
                    sum += Number($(this).val().replaceAll(',', ''));
                });
                // $('#subtotal').val(parseFloat(sum).toFixed(2));
                // $('#dollar_amount').val(parseFloat(sum).toFixed(2));

                $('#subtotal').val(PHP(parseFloat(sum)).format());
                $('#dollar_amount').val(PHP(parseFloat(sum)).format());

            }

            // FUNCTION FOR CALCUTAION DEDUCTIONS
            function DeductionItems_total() {
                var deduction_sum = 0;
                let converted_amount = 0;
                let dollar_amount = 0;
                let converted_amount_input = 0;
                let peso_rate = 0;
                let grand_total = 0;

                $('#show_deduction_items .deduction_amount').each(function() {
                    deduction_sum += Number($(this).val().replaceAll(',', ''));
                })

                $('#show_items .amount').each(function() {
                    converted_amount += Number($(this).val().replaceAll(',', ''));
                });

                peso_rate = $('#peso_rate').val().replaceAll(',', '') ? $('#peso_rate').val()
                    .replaceAll(
                        ',', '') :
                    0;
                dollar_amount = $('#dollar_amount').val().replaceAll(',', '') ? $('#dollar_amount')
                    .val()
                    .replaceAll(',', '') : 0;
                converted_amount_input = parseFloat(dollar_amount * peso_rate);
                grand_total = parseFloat(converted_amount_input - deduction_sum);
                $('#grand_total').val(PHP(grand_total).format());
                // console.log("grand_total", grand_total);
            }

            // FUNCTION CLICK FOR REMOVING INVOICE ITEMS ROWS
            $(document).on('click', '.remove_items', function(e) {
                e.preventDefault();
                let parent = $(this).closest('.row');
                let sub_total = parent.find('.subtotal').val();
                let row_item = $(this).parent().parent().parent();
                $(row_item).remove();


                if ($('#show_items > .row').length === 1) {
                    $('#show_items > .row').find('.col-remove-item').removeClass('d-none')
                        .addClass(
                            'd-none');
                }
                getResults_Converted();
                Additems_total();
                subtotal();
                DeductionItems_total();
                x--;
            });

            // FUNCTION CLICK FOR DISPLAY INVOICE ITEM ROWS
            $("#add_item").click(function(e) {
                e.preventDefault();
                display_item_rows()
            });

            // INITIALIZE DISPLAY ITEM ROWS
            function display_item_rows() {
                let max_fields = 10;
                let wrapper = $('#show_items');
                add_rows = '';
                add_rows += '<div class="row row1">';

                add_rows += '<div class="col-md-4 mb-3">';
                add_rows += '<div class="form-group">';
                add_rows += '<label class="formGroupExampleInput2">Item Desctiption</label>';
                add_rows +=
                    '<input type="text" name="item_description" id="item_description" class="form-control item_description" />';
                add_rows += '</div>';
                add_rows += '</div>';

                add_rows += '<div class="col-md-2 mb-3">';
                add_rows += '<div class="form-group">';
                add_rows += '<label class="formGroupExampleInput2">Quantity</label>';
                add_rows +=
                    '<input type="text" step="any" maxlength="4" name="quantity" id="quantity" style="text-align:right;" class="form-control multi quantity" />';
                add_rows += '</div>';
                add_rows += ' </div>';

                add_rows += '<div class="col-md-3 mb-3">';
                add_rows += '<div class="form-group">';
                add_rows += '<label class="formGroupExampleInput2" for="form3Example2">Rate</label>';
                add_rows +=
                    '<input type="text" step="any" name="rate" id="rate" style="text-align:right;" class="form-control multi rate" />';
                add_rows += '</div>';
                add_rows += '</div>';

                add_rows += '<div class="col-md-2 mb-3">';
                add_rows += '<div class="form-group">';
                add_rows += '<label class="formGroupExampleInput2" for="form3Example2">Amount</label>';
                // style="text-align:right;border:none;background-color:white"
                add_rows +=
                    '<input type="text" style="text-align:right;border:none;background-color:white" disabled name="amount" id="amount" class="form-control amount" />';
                add_rows += '</div>';
                add_rows += '</div>';

                add_rows += '<div class="col-md-1 col-remove-item d-none">';
                add_rows += '<div class="form-group">';
                add_rows += '</br>';
                add_rows +=
                    '<button class="btn remove_items" style="display: flex;justify-content: center;"><i class="fa fa-trash pe-1" style="color:red"></i></button>';
                add_rows += '</div>';
                add_rows += '</div>';

                add_rows += '</div>'

                $(wrapper).append(add_rows);

                if ($('#show_items > .row').length > 1) {
                    $('#show_items > .row').each(function() {
                        $(this).find('.col-remove-item').removeClass('d-none');
                    })
                } else {
                    $('#show_items > .row').find('.col-remove-item').removeClass('d-none').addClass(
                        'd-none');
                }
            }

            // ONLY NUMBERS FOR NUMBER INPUTS
            function onlyNumberKey(evt) {
                // Only ASCII character in that range allowed
                var ASCIICode = (evt.which) ? evt.which : evt.keyCode
                if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                    return false;
                return true;
            }

            // CHECK IF THE USER HAVE THE PROFILE
            $("#exampleModal").on('hide.bs.modal', function() {
                window.location.reload();
            });

            $("#modal-create-deduction").on('hide.bs.modal', function() {
                window.location.reload();
            });

            $("#invoice_status").on('hide.bs.modal', function() {
                window.location.reload();
            });

            $("#button-addon2").click(function(e) {
                let toast1 = $('.toast1');
                let id = $('#user_id').val();
                axios
                    .get(apiUrl + '/api/invoice/check_profile/' + id, {
                        headers: {
                            Authorization: token,
                        },
                    }).then(function(response) {
                        let data = response.data;

                        if (!data.success) {

                            $('.whole_row').addClass('d-none');
                            $('.toast1 .toast-title').html('Invoices');
                            $('.toast1 .toast-body').html(data.message);
                            toast1.toast('show');

                        } else {
                            let deduction_count = data.data.profile_deduction_types.length;
                            console.log("profile_deduction_types", data);
                            $("#profile_id").val(data.data.id);
                            if (deduction_count > 0) {
                                data.data.profile_deduction_types.map((item) => {
                                    let wrapper = $('#show_deduction_items');
                                    add_rows = '';
                                    add_rows += '<div class="row mb-3">';
                                    add_rows += '<div class="col-8">';
                                    add_rows += '<div class="form-group w-100">';
                                    add_rows +=
                                        '<label class="formGroupExampleInput2">Deduction Type</label>';

                                    add_rows +=
                                        '<select class="form-control profile_deduction_type" id="profile_deduction_type" name="profile_deduction_type">';
                                    add_rows += '<option value=' + item.id +
                                        '>' + item
                                        .deduction_type
                                        .deduction_name + '</option> ';
                                    add_rows += '</select>';

                                    add_rows += '</div>';
                                    add_rows += '</div>';
                                    add_rows += '<div class="col-4">';
                                    add_rows += '<div class="form-group ">';
                                    add_rows +=
                                        '<label class="formGroupExampleInput2">Deduction Amount (Php)</label>';
                                    add_rows +=
                                        '<input type="text" value="' + PHP(item
                                            .amount)
                                        .format() +
                                        '" style="text-align:right;" id="deduction_amount" name="deduction_amount" class="form-control multi2 deduction_amount" />';
                                    add_rows += '</div>';
                                    add_rows += '</div>';
                                    add_rows += '</div>';

                                    $(wrapper).append(add_rows);
                                    return '';
                                })
                                $('.whole_row').removeClass('d-none');
                                $('#profile_id').val(data.data.id);

                            }
                        }

                    }).catch(function(error) {
                        console.log("error", error);
                    });
            });

            $('#invoice_items').on('submit', function(e) {
                e.preventDefault();
                let toast1 = $('.toast1');


                // CONDITION IF THERE IS BLANK ROW
                $('#show_items .row1').each(function() {
                    let parent = $(this).closest('.row1');
                    let row_item = $(this).parent();
                    let item_rate = $(this).find('.rate').val();
                    let item_qty = $(this).find('.quantity').val();

                    if (item_rate == "" && item_qty == "") {

                        // console.log("row_item", parent);

                        if ($('#show_items > .row').length === 1) {
                            $('#show_items > .row').find('.col-remove-item')
                                .removeClass(
                                    'd-none')
                                .addClass(
                                    'd-none');
                        } else {
                            $(parent).remove();
                        }
                    }
                    x--;
                });

                let profile_id = $('#profile_id').val();
                // let invoice_no = $('#invoice_no').val();
                // INVOICE TABLE
                let invoice_description = $('#invoice_description').val();
                let invoice_subtotal = $('#subtotal').val().replaceAll(',', '');
                let peso_rate = $('#peso_rate').val().replaceAll(',', '')
                let invoice_converted_amount = $('#converted_amount').val().replaceAll(',', '');
                let invoice_discount_type = $('#discount_type:checked').val();
                let invoice_discount_amount = $('#discount_amount').val().replaceAll(',', '');
                let invoice_discount_total = $('#discount_total').val().replaceAll(',', '');
                let invoice_total_amount = $('#grand_total').val().replaceAll(',', '');
                let invoice_notes = $('#notes').val();

                // INVOICE ITEMS TABLE
                let invoiceItem = [];
                $('#show_items .row').each(function() {
                    let item_description = $(this).find('.item_description').val() ? $(
                            this)
                        .find(
                            '.item_description').val() : "";
                    let item_rate = $(this).find('.rate').val().replaceAll(',', '') ? $(
                            this)
                        .find(
                            '.rate').val().replaceAll(',', '') : 0;
                    let item_qty = $(this).find('.quantity').val() ? $(this)
                        .find('.quantity').val() : 0;
                    let item_total_amount = $(this).find('.amount').val().replaceAll(
                            ',', '') ?
                        $(
                            this).find('.amount')
                        .val().replaceAll(',', '') : 0;

                    invoiceItem.push({
                        item_description,
                        item_rate,
                        item_qty,
                        item_total_amount,
                    })
                });

                // DEDUCTIONS TABLE
                let Deductions = [];
                $('#show_deduction_items .row').each(function() {
                    let profile_deduction_type_id = $(this).find(
                            '.profile_deduction_type')
                        .val() ?
                        $(this)
                        .find(
                            '.profile_deduction_type').val() : 0;
                    let deduction_amount = $(this).find('.deduction_amount').val()
                        .replaceAll(
                            ',',
                            '') ? $(this).find(
                            '.deduction_amount').val().replaceAll(',', '') : 0;

                    Deductions.push({
                        profile_deduction_type_id,
                        deduction_amount,
                    })

                });

                let data = {
                    profile_id: profile_id,
                    // invoice_no: invoice_no,
                    description: invoice_description,
                    peso_rate: peso_rate,
                    sub_total: invoice_subtotal,
                    converted_amount: invoice_converted_amount,
                    discount_type: invoice_discount_type,
                    discount_amount: invoice_discount_amount,
                    discount_total: invoice_discount_total,
                    grand_total_amount: invoice_total_amount,
                    notes: invoice_notes,
                    invoiceItem,
                    Deductions,
                }

                axios.post(apiUrl + "/api/createinvoice", data, {
                    headers: {
                        Authorization: token
                    },
                }).then(function(response) {
                    let data = response.data;
                    if (data.success) {
                        console.log("SUCCES", data.success);
                        $('.toast1 .toast-title').html('Create Invoices');
                        $('.toast1 .toast-body').html(response.data.message);

                        toast1.toast('show');
                        setTimeout(function() {
                            $('#exampleModal').modal('hide');
                        }, 1500);
                        $("#save").attr("data-bs-dismiss", "modal");
                    }
                }).catch(function(error) {
                    if (error.response.data.errors) {
                        let errors = error.response.data.errors;
                        console.log("errors", errors);
                        let fieldnames = Object.keys(errors);

                        Object.values(errors).map((item, index) => {
                            fieldname = fieldnames[0].split('_');
                            fieldname.map((item2, index2) => {
                                fieldname['key'] = capitalize(item2);
                                return ""
                            });
                            fieldname = fieldname.join(" ");

                            $('.toast1 .toast-title').html(fieldname);
                            $('.toast1 .toast-body').html(Object.values(errors)[
                                0].join(
                                "\n\r"));
                        })
                        toast1.toast('show');
                    }
                });

            });

            function capitalize(s) {
                if (typeof s !== 'string') return "";
                return s.charAt(0).toUpperCase() + s.slice(1);
            }

            // CREATE DEDUCTION TYPE
            $('#deductiontype_store').submit(function(e) {
                e.preventDefault();

                let profile_id = $("#createDeduction_profile_id").val();
                let deduction_type_id = $("#createDeduction_deduction_name").val();
                let amount = $("#createDeduction_deduction_amount").val();

                let data = {
                    profile_id: profile_id,
                    deduction_type_id: deduction_type_id,
                    amount: amount,
                };
                axios
                    .post(apiUrl + '/api/saveProfileDeductionTypes', data, {
                        headers: {
                            Authorization: token
                        },
                    }).then(function(response) {
                        let data = response.data;
                        $('.toast1 .toast-title').html('Profile Deduction');
                        $('.toast1 .toast-body').html(data.message);

                        $("#createDeduction_deduction_name").val('');
                        $("#createDeduction_deduction_amount").val('');
                        $('#tableDeleteProfileDeductioType tbody tr').empty();
                        $('#tableDeleteProfileDeductioType tbody tr').html(
                            show_profileDeductionType_data());

                        setTimeout(function() {

                            $('#modal-create-deduction').modal('hide');
                        }, 1500);
                        $("#createDeduction_button").attr("data-bs-dismiss", "modal");

                        toast1.toast('show');
                    }).catch(function(error) {
                        if (error.response.data.errors) {
                            let errors = error.response.data.errors;
                            let fieldnames = Object.keys(errors);
                            Object.values(errors).map((item, index) => {
                                fieldname = fieldnames[0].split('_');
                                fieldname.map((item2, index2) => {
                                    fieldname['key'] = capitalize(item2);
                                    return ""
                                });
                                fieldname = fieldname.join(" ");
                                $('.toast1 .toast-title').html(fieldname);
                                $('.toast1 .toast-body').html(Object.values(errors)[
                                        0]
                                    .join(
                                        "\n\r"));
                            })
                            toast1.toast('show');
                        }
                    });
            })


            $('#search_deduction').on('change', function() {
                // show_deduction_data();
            });

            $('#submit-create-deduction').on('click', function(e) {
                e.preventDefault();
                let url = window.location.pathname;
                let urlSplit = url.split('/');
                if (urlSplit.length === 5) {
                    let profile_id = urlSplit[4];
                    $('#createDeduction_profile_id').val(profile_id);
                    axios.get(apiUrl + '/api/settings/show_deduction_data/' + profile_id, {
                        headers: {
                            Authorization: token,
                        },
                    }).then(function(response) {
                        let data = response.data;
                        console.log("DATA", data);
                        if (data.success) {
                            if (data.data.length > 0) {
                                data.data.filter(f => f.profile_deduction_types
                                        .length === 0)
                                    .map((item) => {
                                        let option = '';
                                        option += "<option value=" + item.id + ">" +
                                            item
                                            .deduction_name + "</option>";
                                        $('#createDeduction_deduction_name').append(
                                            option);
                                    })
                            }
                        }
                    }).catch(function(error) {
                        console.log("ERROR", error.response.data);
                    })
                }
            })

            $('#createDeduction_deduction_name').on('change', function() {
                let deduction_id = $(this).val();
                console.log("SELECT", deduction_id);

                if (deduction_id) {
                    axios.get(apiUrl + '/api/settings/get_deduction/' + deduction_id, {
                        headers: {
                            Authorization: token,
                        },
                    }).then(function(response) {
                        let data = response.data;
                        console.log("SUSSCESS", data);
                        if (data.success) {
                            {
                                $('#createDeduction_deduction_amount').val(data.data
                                    .deduction_amount);
                            }
                        }
                    }).catch(function(error) {
                        console.log("ERROR", error);
                    })

                }
            })

            $('#filter_all_deductions').on('change', function() {
                show_deduction_dataOnDeductions();
            });

            // RESERVE FOR DISPLAY STATUS ON DEDUCTION
            show_deduction_dataOnDeductions();

            function show_deduction_dataOnDeductions(filters) {
                let url = window.location.pathname;
                let urlSplit = url.split('/');
                // console.log(urlSplit.length);
                if (urlSplit.length === 5) {
                    let page = $("#tbl_pagination_deduction .page-item.active .page-link").html();

                    let filter = {
                        page_size: 10,
                        page: page ? page : 1,
                        profile_id: urlSplit[4],
                        search: $('#search_deduction').val(),
                        filter_all_deductions: $('#filter_all_deductions').val()
                    }
                    // console.log("filter", filter);

                    $('#dataTable_deduction tbody').empty();
                    axios.get(
                            `${apiUrl}/api/admin/show_deductions_dataONdeductions?${new URLSearchParams(filter)}`, {
                                headers: {
                                    Authorization: token,
                                },
                            })
                        .then(function(response) {
                            data = response.data;
                            if (data.success) {
                                if (data.data.data.length > 0) {
                                    data.data.data.map((item) => {
                                        let newdate = new Date(item.created_at);
                                        var mm = newdate.getMonth() + 1;
                                        var dd = newdate.getDate();
                                        var yy = newdate.getFullYear();

                                        let tr = '<tr style="vertical-align: middle;">';

                                        tr += '<td hidden>' + item.invoice.id + '</td>';
                                        tr += '<td>' + item.invoice.invoice_no + '</td>';
                                        if (item.invoice.invoice_status == "Pending") {
                                            tr +=
                                                '<td style="text-align:right;"><button style="width:100%; height:20px; font-size:10px; padding: 0px;" type="button" class="btn btn-danger btn-xs" > Pending </button></td >';
                                        } else if (item.invoice.invoice_status ==
                                            "Cancelled") {

                                            tr +=
                                                '<td style="text-align:right;"><button style="width:100%; height:20px; font-size:10px; padding: 0px;" type="button" class="btn btn-info">Cancelled</button></td>';
                                        } else {
                                            tr +=
                                                '<td style="text-align:right;"><button style="width:100%; height:20px; font-size:10px; padding: 0px;" type="button" class="btn btn-success">Paid</button></td>';
                                        }

                                        // item.deductions.map((item2) => {
                                        tr += '<td style="text-align:center;">' + item
                                            .profile_deduction_types.deduction_type
                                            .deduction_name +
                                            '</td>';
                                        tr += '<td style="text-align:center;">' + PHP(item
                                                .amount)
                                            .format() + '</td>';
                                        // })
                                        tr += '<td style="text-align:center;">' + mm + "-" +
                                            dd + "-" +
                                            yy + '</td>';
                                        tr +=
                                            '<td class="text-center"> <a href="#" class="btn"><i class="fa-sharp fa-solid fa-eye view-hover"></i></a> </td>';

                                        tr += '</tr>';
                                        $("#dataTable_deduction tbody").append(tr);
                                        return ''
                                    })
                                    $('#tbl_pagination_deduction').empty();
                                    data.data.links.map(item => {
                                        let li =
                                            `<li class="page-item cursor-pointer ${item.active ? 'active' : ''}"><a class="page-link" data-url="${item.url}">${item.label}</a></li>`
                                        $('#tbl_pagination_deduction').append(li)
                                        return ""
                                    })
                                    $("#tbl_pagination_deduction .page-item .page-link").on('click',
                                        function() {
                                            $("#tbl_pagination_deduction .page-item")
                                                .removeClass(
                                                    'active');
                                            $(this).closest('.page-item').addClass('active');
                                            let url = $(this).data('url')
                                            $.urlParam = function(name) {
                                                var results = new RegExp("[?&]" + name +
                                                        "=([^&#]*)")
                                                    .exec(
                                                        url
                                                    );
                                                return results !== null ? results[1] || 0 :
                                                    false;
                                            };

                                        })
                                    let tbl_showing_deduction =
                                        `Showing ${data.data.from} to ${data.data.to} of ${data.data.total} entries`;
                                    $('#tbl_showing_deduction').html(tbl_showing_deduction);
                                } else {
                                    $("#dataTable_deduction tbody").append(
                                        '<tr><td colspan="6" class="text-center pb-2">No data</td></tr>'
                                    );
                                }
                            }
                        })
                        .catch(function(error) {
                            console.log("catch error", error);
                        });
                }
            }

            show_profileDeductionType_data();
            // SHOW DEDUCTIONS DATA IN TABLE
            function show_profileDeductionType_data() {
                let url = window.location.pathname;
                let urlSplit = url.split('/');

                if (urlSplit.length === 5) {
                    let profile_id = urlSplit[4];

                    // console.log("profile_id", profile_id);
                    $('#dataTable_deduction tbody').empty();
                    axios.get(apiUrl + '/api/settings/show_profileDeductionType_data/' + profile_id, {
                            headers: {
                                Authorization: token,
                            },
                        })
                        .then(function(response) {
                            let data = response.data;
                            // console.log("show_profileDeductionType_data", data);
                            if (data.success) {
                                if (data.data.profile_deduction_types.length > 0) {
                                    data.data.profile_deduction_types.map((item) => {
                                        let td = '<td>';
                                        td +=
                                            "<button type='button' data-bs-toggle='modal' data-bs-target='#ProfileDeductioneditModal' id='editProfileDeduction' class='editProfileDeduction btn btn-primary my-1 mx-1' value=" +
                                            item.id + ">" + item.deduction_type
                                            .deduction_name +
                                            "</button><button type='button' id='deleteProfileDeduction' class='deleteProfileDeduction profile-close' aria-hidden='true'><span style='color:black;' value=" +
                                            item.id +
                                            ">&times;</span></button>";
                                        td += '</td>';
                                        $("#tableDeleteProfileDeductioType tbody tr")
                                            .append(
                                                td);
                                        return '';
                                    })
                                } else {
                                    $("#tableDeleteProfileDeductioType tbody tr").append(
                                        '<td style="width:200rem;" class="text-center">No data</td>'
                                    );
                                }
                            }
                        })
                        .catch(function(error) {
                            console.log("catch error", error);
                        });
                }
            }

            $(document).on('click', '#editButton', function(e) {
                e.preventDefault();
                let id = $(this).val();
                $('#deduction_id').val(id);
                axios
                    .get(apiUrl + '/api/settings/show_edit/' + id, {
                        headers: {
                            Authorization: token,
                        },
                    })
                    .then(function(response) {
                        let data = response.data;
                        console.log("SUCCESS", data.data);
                        if (data.success) {

                            $('#edit_deduction_name').val(data.data.deduction_name);
                            $('#edit_deduction_amount').val(data.data.deduction_amount);
                        }
                    }).catch(function(error) {
                        console.log("ERROR", error);
                    });
            })


            // MODAL OF PROFILE DEDUCTION TYPE BUTTON
            $('#ProfileDeductiontype_update').submit(function(e) {
                e.preventDefault();
                console.log("UPDATE");
                let profileDeductionType_id = $('#profileDeductionType_id').val();
                let profileDeductionType_amount = $('#edit_profileDeductionType_amount').val();

                let data = {
                    id: profileDeductionType_id,
                    amount: parseFloat(profileDeductionType_amount).toFixed(2),
                };
                axios.post(apiUrl + '/api/editProfileDeductionTypes', data, {
                    headers: {
                        Authorization: token
                    },
                }).then(function(response) {
                    let data = response.data;
                    if (data.success) {

                        $('#profileDeductionType_id').val('');
                        $('#edit_profileDeductionType_amount').val('');

                        $('.toast1 .toast-title').html('Deduction Types');
                        $('.toast1 .toast-body').html(response.data.message);
                        toast1.toast('show');
                    }
                }).catch(function(error) {
                    if (error.response.data.errors) {
                        let errors = error.response.data.errors;
                        console.log("error", errors);
                        let fieldnames = Object.keys(errors);
                        Object.values(errors).map((item, index) => {
                            fieldname = fieldnames[0].split('_');
                            fieldname.map((item2, index2) => {
                                fieldname['key'] = capitalize(item2);
                                return ""
                            });
                            fieldname = fieldname.join(" ");
                            $('.toast1 .toast-title').html(fieldname);
                            $('.toast1 .toast-body').html(Object.values(errors)[
                                    0]
                                .join(
                                    "\n\r"));
                        })
                        toast1.toast('show');
                    }
                })

            })


            // MODAL OF DEDUCTION TYPE UPDATE BUTTON
            // $('#deductiontype_update').submit(function(e) {
            //     e.preventDefault();

            //     let deduction_id = $('#deduction_id').val();
            //     let deduction_name = $("#edit_deduction_name").val();
            //     let deduction_amount = $("#edit_deduction_amount").val();

            //     let data = {
            //         id: deduction_id,
            //         deduction_name: deduction_name,
            //         deduction_amount: deduction_amount,
            //     };

            //     axios
            //         .post(apiUrl + "/api/savedeductiontype", data, {
            //             headers: {
            //                 Authorization: token,
            //             },
            //         })
            //         .then(function(response) {
            //             // console.log("then", response.data.success);
            //             let data = response.data;
            //             if (data.success) {

            //                 $('#edit_deduction_name').val('');
            //                 $('#edit_deduction_amount').val('');

            //                 $('.toast1 .toast-title').html('Deduction Types');
            //                 $('.toast1 .toast-body').html(response.data.message);
            //                 toast1.toast('show');

            //                 setTimeout(function() {
            //                     $('#modal-create-deduction').modal('hide');
            //                 }, 1500);
            //                 $("#save-deduction").attr("data-bs-dismiss", "modal");
            //                 // show_deduction_data();

            //             }
            //         })
            //         .catch(function(error) {
            //             if (error.response.data.errors) {
            //                 let errors = error.response.data.errors;
            //                 console.log("error", errors);
            //                 let fieldnames = Object.keys(errors);
            //                 Object.values(errors).map((item, index) => {
            //                     fieldname = fieldnames[0].split('_');
            //                     fieldname.map((item2, index2) => {
            //                         fieldname['key'] = capitalize(item2);
            //                         return ""
            //                     });
            //                     fieldname = fieldname.join(" ");
            //                     $('.toast1 .toast-title').html(fieldname);
            //                     $('.toast1 .toast-body').html(Object.values(errors)[0]
            //                         .join(
            //                             "\n\r"));
            //                 })
            //                 toast1.toast('show');
            //             }
            //         });
            // })
        });
    </script>
    @endsection