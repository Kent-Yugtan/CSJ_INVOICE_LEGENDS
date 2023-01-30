@extends('layouts.master')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
</script>
@section('content-dashboard')

<div class="container-fluid pt-0">
    <h1 class="mt-0">View Profile</h1>
    <ol class="breadcrumb mb-3"></ol>
    <div class="row">
        <div class="col-6 px-2">
            <div class="card shadow p-2 mb-5 bg-white rounded" style="width: 100%; height:100%">
                <div class="card-header">View Information</div>
                <div class="row px-4 pb-4">
                    <form id="ProfileUpdate" method="POST" action="javascript:void(0)" class="row g-3 needs-validation"
                        novalidate>
                        @csrf
                        <span hidden>user id</span>
                        <input type="text" id="user_id" value="{{$findid->id}}" hidden>
                        <input type="text" id="profile_id_show" name="profile_id_show" hidden>
                        <div class="col mb-3">
                            <div class="profile-pic-div" style="position: relative; height:200px">
                                <img src="/images/default.png" id="photo">
                                <input name="file" type="file" id="file">
                                <label for="file" id="uploadBtn">Choose Photo</label>
                            </div>
                        </div>

                        <div class="col pt-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="profile_status"
                                    name="profile_status" checked>
                                <label class="form-check-label" for="status">
                                    Active
                                </label>
                            </div>

                            <div class="mb-3">
                                <label mb-2 style="color: #A4A6B3;">First Name</label>
                                <input id="first_name" name="first_name" type="text"
                                    class="form-control @error('first_name') is-invalid @enderror "
                                    placeholder="First Name" value="{{ old('first_name') }}" required>
                            </div>
                            <div class="mb-3">
                                <label mb-2 style="color: #A4A6B3;">Last Name</label>
                                <input id="last_name" name="last_name" type="text"
                                    class="form-control @error('last_name') is-invalid @enderror "
                                    placeholder="Last Name" value="{{ old('last_name') }}" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Email</label>
                            <input id="email" name="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" placeholder="Email" required>
                        </div>
                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Username</label>
                            <input id="username" name="username" type="text"
                                class="form-control @error('username') is-invalid @enderror" placeholder="Username"
                                required>
                        </div>
                        <!--                         
                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Password</label>
                            <input id="password" name="password" type="text"
                                class="form-control @error('password') is-invalid @enderror" placeholder="Password"
                                required>
                        </div> -->

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Position</label>
                            <select class="form-select @error('position') is-invalid @enderror" id="position"
                                name="position" aria-label="Default select example" defaultValue="select">
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
                            <input id="phone_number" name="phone_number" type="text"
                                class="form-control @error('phone_number') is-invalid @enderror"
                                id="formGroupExampleInput2" placeholder="Phone Number">
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Address</label>
                            <input id="address" name="address" type="text"
                                class="form-control @error('address') is-invalid @enderror" id="formGroupExampleInput2"
                                placeholder="Address">
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Province</label>
                            <input id="province" name="province" type="text"
                                class="form-control @error('province') is-invalid @enderror" id="formGroupExampleInput2"
                                placeholder="Province">
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">City</label>
                            <input id="city" name="city" type="text"
                                class="form-control @error('city') is-invalid @enderror" id="formGroupExampleInput2"
                                placeholder="City">
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Zip Code</label>
                            <input id="zip_code" name="zip_code" type="text"
                                class="form-control @error('zip_code') is-invalid @enderror" id="formGroupExampleInput2"
                                placeholder="Zip Code">
                        </div>


                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Account Number</label>
                            <input id="acct_no" name="acct_no" type="text"
                                class="form-control @error('acct_no') is-invalid @enderror" id="formGroupExampleInput2"
                                placeholder="Account Number">
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Account Name</label>
                            <input id="acct_name" name="acct_name" type="text"
                                class="form-control @error('acct_name') is-invalid @enderror"
                                id="formGroupExampleInput2" placeholder="Account Name">
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Bank Name</label>
                            <select class="form-select @error('bank_name') is-invalid @enderror" id="bank_name"
                                name="bank_name" aria-label="Default select example">
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
                            <input id="bank_location" name="bank_location" type="text"
                                class="form-control @error('bank_location') is-invalid @enderror"
                                id="formGroupExampleInput2" placeholder="Bank Address">
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Gcash Number</label>
                            <input id="gcash_no" name="gcash_no" type="text"
                                class="form-control @error('gcash_no') is-invalid @enderror" id="formGroupExampleInput2"
                                placeholder="Gcash Number">
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Date Hired</label>
                            <input id="date_hired" name="date_hired" type="date"
                                class="form-control @error('date_hired') is-invalid @enderror"
                                id="formGroupExampleInput2" placeholder="Date Hired">
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Deduction Types</label>
                            <select class="select2-multiple form-control form-select" name="deduction_types[]"
                                multiple="multiple" id="select2Multiple">
                            </select>
                        </div>

                        <div class="row">
                            <div class="col mb-3">
                                <button type="submit"
                                    style="width:100%; height:50px;color:white; background-color: #CF8029;"
                                    class="btn ">Edit
                                    Profile</button>
                            </div>
                            <div class="col mb-3">
                                <button type="submit"
                                    style="width:100%; height:50px;color:white; background-color: #A4A6B3;"
                                    class="btn">Change Password</button>
                            </div>
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
                                <button style="width:100%" class="nav-link active" id="pills-home-tab"
                                    data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab"
                                    aria-selected="true">Invoices</button>
                            </li>

                            <li class="nav-item" role="presentation" style="width:50%">
                                <button style="width:100%" class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-profile" type="button" role="tab"
                                    aria-controls="pills-profile" aria-selected="false">Deductions</button>
                            </li>
                        </ul>
                        <form id="CreateInvoice" method="POST" action="javascript:void(0)"
                            class="row g-3 needs-validation" novalidate>
                            @csrf
                            <div class="col-md-4">
                                <div class="input-group">

                                </div>
                            </div>
                        </form>

                        <div class="form-group has-search">
                            <div class=" tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                    aria-labelledby="pills-home-tab">
                                    <div class="card-body table-responsive">
                                        <table style=" color: #A4A6B3;font-size: 14px;" class="table table-hover"
                                            id="dataTable_invoice">
                                            <div class="col-md-4 w-100">
                                                <div class="input-group">
                                                    <button style="color:white; background-color: #CF8029;"
                                                        data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                        type="submit" id="button-addon2" name="button-addon2"
                                                        class="btn form-check-inline pe-3 "><i
                                                            class="fa fa-plus pe-1"></i>Create Invoice</button>
                                                    <input type="text" aria-label="First name"
                                                        class="form-control form-check-inline">
                                                    <div class="form-group has-search">
                                                        <span class="fa fa-search form-control-feedback"></span>
                                                        <input type="text" class="form-control" id="search_invoice"
                                                            placeholder="Search">
                                                    </div>
                                                </div>
                                            </div>
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
                                                <tr>
                                                    <td>Tiger Nixon</td>
                                                    <td><button
                                                            style="width:100%; height:20px; font-size:10px; padding: 0px;"
                                                            type="button" class="btn btn-danger btn-xs">Pending</button>
                                                    </td>
                                                    <td>12/31/2022</td>
                                                    <td>Edinburgh</td>
                                                    <td class="text-center" style="font-size:14px">
                                                        <button style="width:90px" type="button"
                                                            class="fa-sharp fa-solid fa-eye view-hover"></button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Tiger Nixon</td>
                                                    <td><button
                                                            style="width:100%; height:20px; font-size:10px; padding: 0px;"
                                                            type="button" class="btn btn-info">Cancelled</button></td>
                                                    <td>12/31/2022</td>
                                                    <td>Edinburgh</td>
                                                    <td class="text-center" style="font-size:14px">
                                                        <button type="button"
                                                            class="fa-sharp fa-solid fa-eye view-hover"></button>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>


                                <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                    aria-labelledby="pills-profile-tab">
                                    <div class="card-body table-responsive">
                                        <table style=" color: #A4A6B3;font-size: 14px;" class="table table-hover"
                                            id="dataTable_deduction">
                                            <div class="col-md-4 w-100">
                                                <div class="input-group">
                                                    <button type="button"
                                                        style="color:white; background-color: #CF8029;"
                                                        class="btn form-check-inline pe-3 "><i
                                                            class="fa fa-plus pe-1"></i>Create
                                                        Deduction</button>
                                                    <input type="text" aria-label="First name"
                                                        class="form-control form-check-inline">
                                                    <div class="form-group has-search">
                                                        <span class="fa fa-search form-control-feedback"></span>
                                                        <input type="text" class="form-control" id="search_deduction"
                                                            placeholder="Search">
                                                    </div>
                                                </div>
                                            </div>
                                            <thead>
                                                <tr>
                                                    <th>Deduction</th>
                                                    <th>Status</th>
                                                    <th>Date Created</th>
                                                    <th>Amount</th>
                                                    <th class="text-center" id="action1">Action</th>

                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr>
                                                    <td>Tiger Nixon</td>
                                                    <td><button
                                                            style="width:100%; height:20px; font-size:10px; padding: 0px;"
                                                            type="button" class="btn btn-danger btn-xs">Pending</button>
                                                    </td>
                                                    <td>12/31/2022</td>
                                                    <td>Edinburgh</td>
                                                    <td class="text-center" style="font-size:14px">
                                                        <button style="width:90px" type="button"
                                                            class="fa-sharp fa-solid fa-eye view-hover"></button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Tiger Nixon</td>
                                                    <td><button
                                                            style="width:100%; height:20px; font-size:10px; padding: 0px;"
                                                            type="button" class="btn btn-info">Cancelled</button></td>
                                                    <td>12/31/2022</td>
                                                    <td>Edinburgh</td>
                                                    <td class="text-center" style="font-size:14px">
                                                        <button type="button"
                                                            class="fa-sharp fa-solid fa-eye view-hover"></button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Tiger Nixon</td>
                                                    <td><button
                                                            style="width:100%; height:20px; font-size:10px; padding: 0px;"
                                                            type="button" class="btn btn-success">Paid</button>
                                                    </td>
                                                    <td>12/31/2022</td>
                                                    <td>Edinburgh</td>
                                                    <td class="text-center" style="font-size:14px">
                                                        <button type="button"
                                                            class="fa-sharp fa-solid fa-eye view-hover"></button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
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
        <div class="modal-dialog modal-lg" style="width:100%;height:100%">
            <div class=" modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="createnvoice1">Create Invoice</h1>
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
                                                <span hidden>profile id</span>
                                                <input id="profile_id" name="profile_id" type="text" hidden>
                                                <div class="form-group w-50">
                                                    <!-- <label class="formGroupExampleInput2">Invoice #</label> -->
                                                    <input id="invoice_no"
                                                        style="font-weight: bold;border:none;background-color:white"
                                                        disabled name="invoice_no" type="text" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-12 mb-3">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class=" form-group">
                                                            <label class=" formGroupExampleInput2">Description</label>
                                                            <input id="invoice_description" name="invoice_description"
                                                                type="text" class="form-control">
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
                                                            <button class="btn btn-secondary"
                                                                style="width:100%;color:white; background-color: #CF8029;"
                                                                id="add_item">Add
                                                                Item</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 mb-3">
                                                <div class="row">
                                                    <div class="col"
                                                        style="display: flex;flex-direction: column-reverse;align-items: center;">
                                                        <div class="form-group">
                                                            <label class="formGroupExampleInput2">Discount
                                                                Type</label>
                                                            <br>
                                                            <input class="form-check-input" type="radio"
                                                                name="discount_type" id="discount_type" value="fixed">
                                                            <label class="formGroupExampleInput2">
                                                                Fxd &nbsp; &nbsp;
                                                            </label>
                                                            <input class="discount_type form-check-input" type="radio"
                                                                name="discount_type" id="discount_type"
                                                                value="percentage">
                                                            <label class="formGroupExampleInput2">
                                                                %
                                                            </label>
                                                            <!-- <input type="text" id="discount_type" class="form-control" /> -->

                                                        </div>
                                                    </div>

                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label
                                                                class="formGroupExampleInput2 label_discount_amount">Discount
                                                                Amount ($)</label>
                                                            <input type="number" step="any" style="text-align:right;"
                                                                name="discount_amount" id="discount_amount"
                                                                class="form-control" />
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label
                                                                class="formGroupExampleInput2 label_discount_total">Discount
                                                                Total ($)</label>
                                                            <input type="text" disabled
                                                                style="text-align:right; border:0px;background-color:white;"
                                                                onkeypress="return onlyNumberKey(event)"
                                                                name="discount_total" id="discount_total"
                                                                class="form-control" />
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
                                                            <input type="text"
                                                                style="font-weight: bold;text-align:right;border:none;background-color:white"
                                                                name="subtotal" id="subtotal"
                                                                class="form-control no-outline subtotal" disabled>
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
                                                            <input type="text" id="dollar_amount"
                                                                style="font-weight: bold;border:none; text-align:right;background-color:white"
                                                                class="form-control dollar_amount" disabled />

                                                        </div>
                                                    </div>

                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label class="formGroupExampleInput2">Peso Rate
                                                                (Php)</label>
                                                            <input type="text"
                                                                style="font-weight: bold;border:none; text-align:right;background-color:white"
                                                                onkeypress="return onlyNumberKey(event)" id="peso_rate"
                                                                class="form-control" disabled />
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label class="formGroupExampleInput2"
                                                                for="form3Example2">Converted
                                                                Amount</label>
                                                            <input type="text"
                                                                style="font-weight: bold;border:none; text-align:right;background-color:white"
                                                                onkeypress="return onlyNumberKey(event)"
                                                                id="converted_amount"
                                                                class="form-control converted_amount" disabled />
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

                                            <!-- <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="form-group w-100">
                                        <label class="formGroupExampleInput2">Deduction Type</label>
                                        <input type="text" id="deduction_type" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group ">
                                        <label class="formGroupExampleInput2">Deduction Amount</label>
                                        <input type="Number" onkeypress="return onlyNumberKey(event)" id="deduction_amount" class="form-control" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-8 mb-3">
                                    <div class="form-group w-100">
                                        <label class="formGroupExampleInput2">Deduction Type</label>
                                        <input type="text" id="deduction_type" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-4 mb-3">
                                    <div class="form-group ">
                                        <label class="formGroupExampleInput2">Deduction Amount</label>
                                        <input type="Number" onkeypress="return onlyNumberKey(event)" id="deduction_amount" class="form-control" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-8 mb-3">
                                    <div class="form-group w-100">
                                        <label class="formGroupExampleInput2">Deduction Type</label>
                                        <input type="text" id="deduction_type" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-4 mb-3">
                                    <div class="form-group">
                                        <label class="formGroupExampleInput2">Deduction Amount</label>
                                        <input type="Number" onkeypress="return onlyNumberKey(event)" id="deduction_amount" class="form-control" />

                                    </div>
                                </div>
                            </div>
                        </div> -->
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
                                                        <label style="vertical-align: -webkit-baseline-middle">Total:
                                                            <label>
                                                    </div>
                                                    <div class="col-4 mb-3" style="justify-content:end;display:flex">
                                                        <!-- border-style:none -->
                                                        <input type="text" id="grand_total"
                                                            class="form-control no-outline"
                                                            style="text-align:right;border:0;background-color:white;"
                                                            disabled>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 mb-3">
                                                <div class="row">
                                                    <div class="col-12 form-control">
                                                        <label for="floatingTextarea">Notes</label>
                                                        <textarea class="form-control" placeholder="Leave a notes here"
                                                            id="notes" name="notes"></textarea>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-6 mb-3">
                                                <div class="pb-3">
                                                    <button type="button" class="btn btn-secondary w-100"
                                                        style=" color:#CF8029; background-color:white; "
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <div class="pb-3">
                                                    <button type="submit" id="save" class="btn btn-secondary w-100"
                                                        style="color:White; background-color:#CF8029;">Save</button>
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

    <div style="position: relative;bottom:1950px;z-index:99999;justify-content:flex-end;display:flex;">
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

    <script type="text/javascript">
    let total_deduction_amount = 0
    let x = 1;


    // INVOICE SEARCH AND DISPLAY
    $(document).ready(function() {

        show_edit();
        show_data();
        let searchTimeOut = 0;

        $(document).on('change', '#search_invoice', function() {

            // clearTimeout(searchTimeOut)
            // let timeoutTemp = setTimeout(function() {
            //     console.log('search_invoice ddd', $(this).val());

            // }, 1000);
            // searchTimeOut = timeoutTemp;
            show_data({
                search: $(this).val()
            });

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
                        console.log("PROFILE SHOW EDIT", data.data.profile);
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
                        // $("#photo").attr("src", data.data.profile.file_path);
                        if (data.data.profile.file_path) {
                            $('#photo').val(data.data.profile.file_path);
                        } else {
                            $("#photo").attr("src", "/images/default.png");
                        }

                        // console.log('profile_deduction_types', data.data.profile.profile_deduction_types);
                        let profile_deduction_types_reduce = data.data.profile.profile_deduction_types
                            .reduce((
                                a, b) => {
                                a.push(b.deduction_type_id)
                                return a
                            }, [])
                        // console.log('profile_deduction_types_reduce', profile_deduction_types_reduce);
                        setTimeout(() => {
                            $('#select2Multiple').val(profile_deduction_types_reduce).change();
                        }, 1000)
                    }


                })
                .catch(function(error) {
                    console.log("ERROR", error);
                });
        }


        function show_data(filters) {
            let url = window.location.pathname;
            let urlSplit = url.split('/');
            console.log(urlSplit.length);
            if (urlSplit.length === 4) {


                let filter = {
                    page_size: 10,
                    page: 1,
                    user_id: urlSplit[3],
                    ...filters,
                }
                $('#dataTable_invoice tbody').empty();
                axios.get(`${apiUrl}/api/admin/show_invoice?${new URLSearchParams(filter)}`, {
                    headers: {
                        Authorization: token,
                    },
                }).then(function(response) {
                    let data = response.data;
                    console.log("data", data);
                    if (data.success) {
                        if (data.data.data.length > 0) {
                            data.data.data.map((item) => {
                                let newdate = new Date(item.created_at);
                                var mm = newdate.getMonth() + 1;
                                var dd = newdate.getDate();
                                var yy = newdate.getFullYear();
                                let tr = '<tr>';
                                tr += '<td style="text-align:right;">' + item.invoice_no +
                                    '</td>';

                                if (item.invoice_status == "Pending") {
                                    tr +=
                                        '<td style="text-align:right;width:120px;"><button style="width:100%; height:20px; font-size:10px; padding: 0px;" type="button" class="btn btn-danger btn-xs" > Pending </button></td >';
                                } else if (item.invoice_status == "Cancelled") {

                                    tr +=
                                        '<td style="text-align:right;width:120px;"><button style="width:100%; height:20px; font-size:10px; padding: 0px;" type="button" class="btn btn-info">Cancelled</button></td>';
                                } else {
                                    tr +=
                                        '<td style="text-align:right;width:120px;"><button style="width:100%; height:20px; font-size:10px; padding: 0px;" type="button" class="btn btn-success">Paid</button></td>';
                                }

                                tr += '<td style="text-align:center;">' + mm + '-' + dd +
                                    '-' +
                                    yy + '</td>';
                                tr += '<td style="text-align:right;">' + item
                                    .grand_total_amount +
                                    '</td>';
                                tr +=
                                    '<td class="text-center" style="font-size:14px"> <a href="' +
                                    apiUrl +
                                    '/admin/editProfile/' +
                                    item.id +
                                    '" class="btn"><i class="fa-sharp fa-solid fa-eye view-hover"></i></a> </td>';
                                tr += '</tr>';

                                $("#dataTable_invoice tbody").append(tr);
                                return ''
                                console.log("SUCCESS DISPLAY", data);

                            })

                        }

                    }
                    // let search = $('#search_invoice').val();
                    // show_data({
                    //     search,
                    //     page: filter.page
                    // });
                }).catch(function(error) {
                    console.log("ERROR DISPLAY", error);
                });
            }
        }


        let toast1 = $('.toast1');
        toast1.toast({
            delay: 5000,
            animation: true,

        });

        $('.close').on('click', function(e) {
            e.preventDefault();
            toast1.toast('hide');
        })
        $("#error_msg").hide();
        $("#success_msg").hide();


        $('#ProfileUpdate').submit(function(e) {
            e.preventDefault();
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
            formData.append('deduction_type_id', JSON.stringify(deduction_type_id));
            if (document.getElementById('file').files.length > 0) {
                formData.append('profile_picture', document.getElementById('file').files[0],
                    "picture.png");
            }
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
                        show_deduction();
                        // select2Multiple
                        $('.toast1 .toast-title').html('Profile');
                        $('.toast1 .toast-body').html(data.message);
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
                                fieldname['key'] = capitalize(item2);
                                return ""
                            });
                            fieldname = fieldname.join(" ");
                            $('.toast1 .toast-title').html(fieldname);
                            $('.toast1 .toast-body').html(Object.values(errors)[0]
                                .join(
                                    "\n\r"));
                        })
                        toast1.toast('show');
                    }
                });
        })

        show_deduction();

        function show_deduction() {
            axios
                .get(apiUrl + '/api/show_deduction_type', {
                    headers: {
                        Authorization: token,
                    }
                }).then(function(response) {
                    response = response.data
                    if (response.success) {
                        if (response.data.length > 0) {
                            $('#select2Multiple').empty();
                            response.data.map((item) => {
                                let option = '<option>';
                                option += "<option value=" + item.id + ">" + item.id + " - " +
                                    item
                                    .deduction_name +
                                    " - " + item.deduction_amount +
                                    "</option>"
                                $("#select2Multiple").append(option);
                                return '';
                            })
                        }
                    }
                }).catch(function(error) {
                    console.log('ERROR', error);
                });
        }

        $('.select2-multiple').select2({
            placeholder: "Select",
            // allowClear: true
        });

        //  For creating invoice codes
        const api = "https://api.exchangerate-api.com/v4/latest/USD";

        display_item_rows();

        $("#discount_amount").addClass('d-none');
        $("#discount_total").addClass('d-none');
        $(".label_discount_amount").addClass('d-none');
        $(".label_discount_total").addClass('d-none');

        $('input[type=radio][id=discount_type]').change(function() {

            if (subtotal == 0) {
                $("#discount_amount").addClass('d-none');
                $("#discount_total").addClass('d-none');
                $(".label_discount_amount").addClass('d-none');
                $(".label_discount_total").addClass('d-none');
            } else {
                if (this.value == 'fixed') {
                    //write your logic here
                    // console.log("FIXED");
                    $("#discount_amount").removeClass('d-none');
                    $("#discount_total").removeClass('d-none');
                    $(".label_discount_amount").removeClass('d-none');
                    $(".label_discount_total").removeClass('d-none');

                    $('#discount_amount').val('0.00');
                    $('#discount_total').val('0.00');

                } else if (this.value == 'percentage') {
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

        $('#discount_amount').focusout(function() {
            if ($('#discount_amount').val() == "") {
                $('#discount_amount').val('0.00');
            }
        })

        function subtotal() {
            let discount_type = $("input[id='discount_type']:checked").val();
            let discount_amount = $('#discount_amount').val();
            let discount_total = $('#discount_total').val();
            let subtotal = $('#subtotal').val();
            var sum = 0;

            $('#show_items .amount').each(function() {
                sum += Number($(this).val());
            });

            if (discount_type == 'fixed') {
                $('#discount_total').val((parseFloat(discount_amount ? discount_amount : 0) * 1).toFixed(
                    2));
                $('#subtotal').val((sum - $('#discount_total').val()).toFixed(2));
                $('#dollar_amount').val($('#subtotal').val());
                DeductionItems_total()
            } else if (discount_type == 'percentage') {
                $('#discount_total').val(((parseFloat(discount_amount ? discount_amount : 0) / 100) *
                    parseFloat(
                        sum)).toFixed(2));
                $('#subtotal').val((parseFloat(sum) - $('#discount_total').val()).toFixed(2));
                $('#dollar_amount').val($('#subtotal').val());
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
            let dollar_amount = $("#dollar_amount").val();
            let peso_rate = 0;
            let converted_amount = 0;
            let fromRate = currency.rates['USD'];
            let toRate = currency.rates['PHP'];
            peso_rate = (toRate / fromRate).toFixed(2);
            converted_amount = ((toRate / fromRate) * dollar_amount).toFixed(2);
            $('#peso_rate').val(parseFloat(peso_rate).toFixed(2));
            $('#converted_amount').val(parseFloat(converted_amount).toFixed(2));
            // $('#grand_total').val((converted_amount - total_deduction_amount).toFixed(
            //     2));
        }

        // FUNCTION FOR KEYUP CLASS DEDUCTIONS FOR DEDUCTIONS
        $('#show_deduction_items').on("keyup", ".multi2", function() {
            let grand_total = 0;
            let parent = $(this).closest('.row');
            let deduction_amount = parent.find('.deduction_amount').val() ? parent.find(
                    '.deduction_amount')
                .val() : 0;
            // grand_total = parseFloat($('#converted_amount').val()) - parseFloat(deduction_amount);
            // $('#grand_total').val(grand_total.toFixed(2));
            DeductionItems_total();

        });

        // FUNCTION FOR KEYUP CLASS MULTI INPUTS FOR ADD ITEMS
        $('#show_items').on("keyup", ".multi", function() {
            let sub_total = 0;
            let parent = $(this).closest('.row');
            let quantity = parent.find('.quantity').val() ? parent.find('.quantity').val() : 0;
            let rate = parent.find('.rate').val() ? parent.find('.rate').val() : 0;
            sub_total = parseFloat(quantity) * parseFloat(rate);
            parent.find('.amount').val(parseFloat(sub_total).toFixed(2));
            getResults_Converted();
            Additems_total();
            subtotal();
            DeductionItems_total();
        });

        // FUNCTION FOR DISPLAYING SUBTOTAL AMOUNT AND DOLLAR AMOUNT
        function Additems_total() {
            var sum = 0;
            let converted_amount = 0;
            $('#show_items .amount').each(function() {
                sum += Number($(this).val());
            });
            $('#subtotal').val(parseFloat(sum).toFixed(2));
            $('#dollar_amount').val(parseFloat(sum).toFixed(2));

        }

        // FUNCTION FOR CALCUTAION DEDUCTIONS
        function DeductionItems_total() {
            var sum = 0;
            let converted_amount = 0;
            let dollar_amount = 0;
            let converted_amount_input = 0;
            let peso_rate = 0;
            $('#show_deduction_items .deduction_amount').each(function() {
                sum += Number($(this).val());
            })

            $('#show_items .amount').each(function() {
                converted_amount += Number($(this).val());
            });

            dollar_amount = $('#dollar_amount').val();
            peso_rate = $('#peso_rate').val();
            converted_amount_input = (parseFloat(dollar_amount) * parseFloat(peso_rate));
            $('#grand_total').val((parseFloat(converted_amount_input) - parseFloat(sum)).toFixed(2));
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
                '<input type="number" step="any" name="quantity" id="quantity" style="text-align:right;" class="form-control multi quantity" />';
            add_rows += '</div>';
            add_rows += ' </div>';

            add_rows += '<div class="col-md-2 mb-3">';
            add_rows += '<div class="form-group">';
            add_rows += '<label class="formGroupExampleInput2" for="form3Example2">Rate</label>';
            add_rows +=
                '<input type="number" step="any" name="rate" id="rate" style="text-align:right;" class="form-control multi rate" />';
            add_rows += '</div>';
            add_rows += '</div>';

            add_rows += '<div class="col-md-3 mb-3">';
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
                    // console.log("response", data);

                    if (!data.success) {

                        $('.whole_row').addClass('d-none');
                        $('.toast1 .toast-title').html('Invoices');
                        $('.toast1 .toast-body').html(data.message);
                        toast1.toast('show');

                    } else {
                        let deduction_count = data.data.profile_deduction_types.length;
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
                                    '<select class="form-control deduction_type" id="deduction_type" name="deduction_type">';
                                add_rows += '<option value=' + item.deduction_type.id +
                                    '>' + item
                                    .deduction_type
                                    .deduction_name + '</option> ';
                                add_rows += '</select>';

                                // add_rows += '<input type="text" id="deduction_type" value="' + item
                                //     .deduction_type.deduction_name + '" class="form-control" disabled />';

                                add_rows += '</div>';
                                add_rows += '</div>';
                                add_rows += '<div class="col-4">';
                                add_rows += '<div class="form-group ">';
                                add_rows +=
                                    '<label class="formGroupExampleInput2">Deduction Amount</label>';
                                add_rows +=
                                    '<input type="Number" value="' + item
                                    .deduction_type.deduction_amount +
                                    '" onkeypress="return onlyNumberKey(event)" style="text-align:right;" id="deduction_amount" name="deduction_amount" class="form-control multi2 deduction_amount" />';
                                add_rows += '</div>';
                                add_rows += '</div>';
                                add_rows += '</div>';

                                $(wrapper).append(add_rows);
                                return '';
                            })
                            $('.whole_row').removeClass('d-none');
                            $('#profile_id').val(data.data.id);
                            // console.log("dataproifle", data);


                        }
                    }

                }).catch(function(error) {
                    console.log("error", error);
                });
        });



        $('#invoice_items').on('submit', function(e) {
            let toast1 = $('.toast1');
            e.preventDefault();


            // CONDITION IF THERE IS BLANK ROW
            $('#show_items .row1').each(function() {
                let parent = $(this).closest('.row1');
                let row_item = $(this).parent();
                let item_rate = $(this).find('.rate').val();
                let item_qty = $(this).find('.quantity').val();

                if (item_rate == "" && item_qty == "") {

                    // console.log("row_item", parent);

                    if ($('#show_items > .row').length === 1) {
                        $('#show_items > .row').find('.col-remove-item').removeClass(
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
            let invoice_no = $('#invoice_no').val();
            // INVOICE TABLE
            let invoice_description = $('#invoice_description').val();
            let invoice_subtotal = $('#subtotal').val();
            let invoice_converted_amount = $('#converted_amount').val();
            let invoice_discount_type = $('#discount_type:checked').val();
            let invoice_discount_amount = $('#discount_amount').val();
            let invoice_discount_total = $('#discount_total').val();
            let invoice_total_amount = $('#grand_total').val();
            let invoice_notes = $('#notes').val();

            // INVOICE ITEMS TABLE
            let invoiceItem = [];
            $('#show_items .row').each(function() {
                let item_description = $(this).find('.item_description').val();
                let item_rate = $(this).find('.rate').val();
                let item_qty = $(this).find('.quantity').val();
                let item_total_amount = $(this).find('.amount').val();

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
                let deduction_type_id = $(this).find('.deduction_type').val();
                let deduction_amount = $(this).find('.deduction_amount').val();

                Deductions.push({
                    deduction_type_id,
                    deduction_amount,
                })

            });

            let data = {
                profile_id: profile_id,
                invoice_no: invoice_no,
                description: invoice_description,
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


            axios.
            post(apiUrl + "/api/createinvoice", data, {
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
                    }, 3000);

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
                        $('.toast1 .toast-body').html(Object.values(errors)[0].join(
                            "\n\r"));
                    })
                    toast1.toast('show');
                }
            });


            function capitalize(s) {
                if (typeof s !== 'string') return "";
                return s.charAt(0).toUpperCase() + s.slice(1);
            }

        });


    });
    </script>
    @endsection