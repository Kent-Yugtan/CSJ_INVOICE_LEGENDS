@extends('layouts.user')
@section('content-dashboard')
<div class="container-fluid px-4" id="loader_load">
  <h1 class=" mt-0">My Profile</h1>
  <ol class="breadcrumb mb-3"></ol>
  <div class="row">
    <div class="col-md-12 col-lg-12 col-xl-5 px-2">
      <div class="card shadow p-2 mb-5 bg-white rounded">
        <div class="card-header">Active Information</div>
        <form id="ProfileUpdate" method="POST" action="javascript:void(0)" class="row g-3 needs-validation" novalidate>
          <div class="row px-4 pt-3">
            @csrf
            <span hidden>user id</span>
            <input type="text" id="profile_id_show" hidden>

            <div class="col-md-5 col-lg-5 pt-5">
              <div class="profile-pic-div_userMyProfile" style="position: relative; height:200px">
                <img src="/images/default.png" id="photo">
                <input name="file" type="file" id="file" disabled="true">
                <label for="file" id="uploadBtn">Choose Photo</label>
              </div>
            </div>

            <div class="col-md-7 col-lg-7 pt-5">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="profile_status" name="profile_status" checked disabled="true">
                <label class="form-check-label" for="status">
                  Active
                </label>
              </div>

              <div class="form-floating mb-3">
                <input id="first_name" name="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror " placeholder="First Name" value="{{ old('first_name') }}" disabled="true">
                <label for="first_name" style="color: #A4A6B3;">First Name</label>
              </div>
              <div class="form-floating mb-3">

                <input id="last_name" name="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror " placeholder="Last Name" value="{{ old('last_name') }}" disabled="true">
                <label for="last_name" style="color: #A4A6B3;">Last Name</label>
              </div>
            </div>
          </div>

          <div class="row px-4 row_email_adminActiveProfile">
            <div class="col-md-12 pt-3">
              <div class="form-floating mb-3">
                <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" disabled="true">
                <label for="email" style="color: #A4A6B3;">Email</label>
              </div>
              <div class="form-floating mb-3">
                <input id="username" name="username" type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Username" disabled="true">
                <label for="username" style="color: #A4A6B3;">Username</label>
              </div>

              <div class="form-floating mb-3">
                <select class="form-select @error('position') is-invalid @enderror" id="position" name="position" aria-label="Default select example" defaultValue="select" disabled="true">
                  <option selected disabled value="">Please Select Position</option>
                  <option value="Lead Developer">Lead Developer</option>
                  <option value="Senior Developer">Senior Developer</option>
                  <option value="Junior Developer">Junior Developer</option>
                  <option value="Web Designer">Web Designer</option>
                  <option value="Tester">Tester</option>
                </select>
                <label for="position" style="color: #A4A6B3;">Position</label>
              </div>

              <div class="form-floating mb-3">
                <input id="phone_number" name="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" placeholder="Phone Number" disabled="true">
                <label for="phone_number" style="color: #A4A6B3;">Phone Number</label>

              </div>

              <div class="form-floating mb-3">
                <input id="address" name="address" type="text" class="form-control @error('address') is-invalid @enderror" placeholder="Address" disabled="true">
                <label for="address" style="color: #A4A6B3;">Address</label>
              </div>

              <div class="form-floating mb-3">
                <input id="province" name="province" type="text" class="form-control @error('province') is-invalid @enderror" placeholder="Province" disabled="true">
                <label for="province" style="color: #A4A6B3;">Province</label>
              </div>

              <div class="form-floating mb-3">
                <input id="city" name="city" type="text" class="form-control @error('city') is-invalid @enderror" placeholder="City" disabled="true">
                <label for="city" style="color: #A4A6B3;">City</label>
              </div>

              <div class="form-floating mb-3">
                <input id="zip_code" name="zip_code" type="text" class="form-control @error('zip_code') is-invalid @enderror" placeholder="Zip Code" disabled="true">
                <label for="zip_code" style="color: #A4A6B3;">Zip Code</label>
              </div>

              <div class="form-floating mb-3">
                <input id="acct_no" name="acct_no" type="text" class="form-control @error('acct_no') is-invalid @enderror" placeholder="Account Number" disabled="true">
                <label for="acct_no" style="color: #A4A6B3;">Account Number</label>
              </div>

              <div class="form-floating mb-3">
                <input id="acct_name" name="acct_name" type="text" class="form-control @error('acct_name') is-invalid @enderror" placeholder="Account Name" disabled="true">
                <label for="acct_name" style="color: #A4A6B3;">Account Name</label>
              </div>

              <div class="form-floating mb-3">
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
                  <option value="Development Bank of the Philippines">Development Bank of the
                    Philippines
                    (DBP)</option>
                  <option value="China Banking Corporation">China Banking Corporation (CBC)</option>
                  <option value="Rizal Commercial Banking Corporation">Rizal Commercial Banking
                    Corporation (RCBC)</option>
                  <option value="Union Bank of the Philippines, Inc.">Union Bank of the Philippines,
                    Inc.
                  </option>
                  <option value="Security Bank Corporation">Security Bank Corporation</option>
                  <option value="EastWest Bank">EastWest Bank</option>
                  <option value="Citibank, N.A.">Citibank, N.A. (Philippine Branch)</option>
                  <option value="United Coconut Planters Bank">United Coconut Planters Bank (UCPB)
                  </option>
                  <option value="Asia United Bank Corporation">Asia United Bank Corporation (AUB)
                  </option>
                  <option value="Bank of Commerce">Bank of Commerce (BankCom)</option>
                  <option value="Hongkong and Shanghai Banking Corporation">Hongkong and Shanghai
                    Banking
                    Corporation (HSBC)</option>
                  <option value="Robinsons Bank Corporation">Robinsons Bank Corporation</option>
                  <option value="Philtrust Bank">Philtrust Bank</option>
                  <option value="Philippine Bank of Communications">Philippine Bank of Communications
                    (PBCOM)</option>
                  <option value="Maybank Philippines Inc.">Maybank Philippines Inc.</option>
                </select>
                <label for="bank_name" style="color: #A4A6B3;">Bank Name</label>
              </div>

              <div class="form-floating mb-3">
                <input id="bank_location" name="bank_location" type="text" class="form-control @error('bank_location') is-invalid @enderror" placeholder="Bank Address" disabled="true">
                <label for="bank_location" style="color: #A4A6B3;">Bank Location</label>
              </div>

              <div class="form-floating mb-3">
                <input id="gcash_no" name="gcash_no" type="text" class="form-control @error('gcash_no') is-invalid @enderror" placeholder="Gcash Number" disabled="true">
                <label for="gcash_no" style="color: #A4A6B3;">Gcash Number</label>
              </div>

              <div class="form-floating mb-3">
                <input id="date_hired" name="date_hired" type="text" onblur="(this.type='text')" class="form-control @error('date_hired') is-invalid @enderror" placeholder="Date Hired" disabled="true">
                <label for="date_hired" style="color: #A4A6B3;">Date Hired</label>
              </div>
            </div>
          </div>

          <div class="row px-4 pb-4">
            <div class="col-6 mb-3">
              <button type="button" id="edit_profile" style="width:100%; height:50px;color:white; background-color: #A4A6B3;" class="btn">Edit
                Profile</button>
              <button type="button" id="cancel_edit_profile" style="width:100%; height:50px;color:white; background-color: #A4A6B3;" class="btn">Cancel</button>
            </div>
            <div class="col-6 mb-3">
              <button type="submit" style="width:100%; height:50px;color:white; background-color: #CF8029;" class="btn ">Update Profile</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="col-md-12 col-lg-12 col-xl-7 px-2">
      <div class="card shadow p-2 mb-5 bg-white rounded">
        <!-- <div class="card-header">Profile Information</div> -->
        <ul class="nav nav-pills mb-3 " id="pills-tab" role="tablist">
          <li class="nav-item" role="presentation" style="width:50%">
            <a href="#pills-invoice" data-bs-toggle="pill" data-bs-target="#pills-invoice" class="nav-link active text-center" data-toggle="tab">Invoices</a>
          </li>

          <li class="nav-item" role="presentation" style="width:50%">
            <a style="width:100%" href="#pills-deduction" data-bs-toggle="pill" data-bs-target="#pills-deduction" class="nav-link text-center" data-toggle="tab">Profile
              Deductions</a>
          </li>
        </ul>

        <div class="form-group has-search">
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-invoice" role="tabpanel" aria-labelledby="pills-invoice-tab">
              <div class="row mx-2">
                <div class="col-4">
                  <button style="color:white; background-color: #CF8029;" data-bs-toggle="modal" data-bs-target="#exampleModal" type="submit" id="button-addon2" name="button-addon2" class="btn form-check-inline pe-3 w-100 "><i class="fa fa-plus pe-1"></i>Add
                    Invoice</button>
                </div>
                <div class="col-4">
                  <select class="form-check-inline form-select" id="filter_all_invoices">
                    <!-- <option selected value="" disabled>Filter</option> -->
                    <option value="All">All</option>
                    <option value="Cancelled">Cancelled</option>
                    <option value="Paid">Paid</option>
                    <option value="Pending">Pending</option>
                    <option value="Overdue">Overdue</option>
                  </select>
                </div>

                <div class="col-4">
                  <div class="form-group has-search">
                    <span class="fa fa-search form-control-feedback"></span>
                    <input type="text" class="form-control" id="search_invoice" placeholder="Search">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-12">
                  <div class="card-body table-responsive">
                    <table style="color: #A4A6B3;font-size: 14px;" class="table table-hover" id="dataTable_invoice">
                      <thead>
                        <tr>
                          <th>Invoice #</th>
                          <th class="text-center">Payment Status</th>
                          <th class="text-end">Total Amount</th>
                          <th class="text-end">Date Created</th>
                          <th class="text-end">Due Date</th>
                          <th class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <div class="row mx-2">
                <div class="col-xl-6">
                  <div class="page_showing" id="tbl_showing_invoice"></div>
                </div>
                <div class="col-xl-6">
                  <ul style="float:right" class="pagination pagination-sm flex-sm-wrap" id="tbl_pagination_invoice">
                  </ul>
                </div>
              </div>
            </div>

            <div class="tab-pane fade" id="pills-deduction" role="tabpanel" aria-labelledby="pills-deduction-tab">
              <div class="row mx-2">
                <div class="col-6 ">
                  <button type="button " id="submit-create-deduction" class="btn form-check-inline pe-3" data-bs-toggle="modal" data-bs-target="#modal-create-deduction" style="color:white; background-color: #CF8029;width:100%">
                    <i class="fa fa-plus pe-1"></i>
                    Add Deduction
                  </button>
                </div>
                <div class="col-6">
                  <div class="form-group has-search">
                    <span class="fa fa-search form-control-feedback"></span>
                    <input type="text" class="form-control" id="search_deduction" placeholder="Search">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12 pt-3 px-4">
                  <div id="deductionButton" style="word-wrap: break-word;">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-12">
                  <div class="card-body table-responsive px-4">
                    <table style="color: #A4A6B3;font-size: 14px;" class="table table-hover" id="dataTable_deduction">
                      <thead>
                        <tr>
                          <th>Invoice #</th>
                          <th class="text-center">Payment Status</th>
                          <th>Deduction Name</th>
                          <th class="text-end">Amount</th>
                          <th class="text-end">Date Created</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="row mx-2">
                <div class="col-xl-6">
                  <div class="page_showing" id="tbl_showing_deduction"></div>
                </div>
                <div class="col-xl-6">
                  <ul style="float:right" class="pagination pagination-sm flex-sm-wrap" id="tbl_pagination_deduction">
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- START CREATE INVOICE MODAL -->
  <div class="modal fade" id="exampleModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class=" modal-content" style="width: 115%;">
        <div class=" modal-header">
          <h1 class="modal-title fs-5">Add Invoice</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <form id="invoice_items">
              @csrf
              <div class="row px-4 pt-2" id="header">
                <div class="col-md-6 px-2 w-100">
                  <div class="card shadow p-2 mb-5 bg-white rounded">

                    <div class="row px-4 pb-4 pt-4" id="header">
                      <input id="profile_id" type="text" hidden>
                      <!-- <label class="formGroupExampleInput2">Invoice #</label> -->

                      <div class="col-4 mb-3">
                        <div class="row">
                          <div class="col">
                            <div class="form-floating form-group">
                              <input type="text" placeholder="Due Date" id="due_date" onblur="(this.type='text')" name="due_date" class="form-control">
                              <!-- <input id="due_date" name="due_date" type="date" class="form-control"> -->
                              <label for="due_date">Due Date</label>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-12 mb-3">
                        <div class="row">
                          <div class="col">
                            <div class="form-floating form-group">
                              <input id="invoice_description" placeholder="Description" name="invoice_description" type="text" class="form-control">
                              <label for="invoice_description">Description</label>
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
                              <button class="btn btn-secondary" style="width:100%;color:white; background-color: #CF8029;" id="add_item">Add
                                Item</button>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-12 mb-3">
                        <div class="row">
                          <div class="col" style="display: flex;align-items: start;">
                            <div class="form-group">
                              <label class="formGroupExampleInput2">Discount Type</label>
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
                            <div class="form-floating form-group">
                              <input type="text" step="any" style="text-align:right;" name="discount_amount" id="discount_amount" class="form-control" />
                              <label for="discount_amount" class="label_discount_amount">Discount
                                Amount ($)</label>
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-floating form-group">
                              <input type="text" disabled style="text-align:right; border:0px;background-color:white;" onkeypress="return onlyNumberKey(event)" name="discount_total" id="discount_total" class="form-control" />
                              <label for="discount_total" class="label_discount_total">Discount
                                Total ($)</label>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-12 mb-3">
                        <div class="row">
                          <div class="col-12 my-3" style="justify-content:end;display:flex">
                            <div class="form-floating form-group">
                              <!-- border-style:none -->
                              <input type="text" style="font-weight: bold;text-align:right;border:none;background-color:white" name="subtotal" id="subtotal" class="form-control no-outline subtotal" disabled>
                              <label for="subtotal">Subtotal ($): </label>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-12 mb-3">
                        <div class="row">
                          <div class="col">
                            <div class="form-floating form-group">
                              <input type="text" id="dollar_amount" style="font-weight: bold;border:none; text-align:right;background-color:white" class="form-control dollar_amount" disabled />
                              <label for="dollar_amount">Dollar Amount
                                ($)</label>
                            </div>
                          </div>

                          <div class="col">
                            <div class="form-floating form-group">
                              <input type="text" style="font-weight: bold;border:none; text-align:right;background-color:white" onkeypress="return onlyNumberKey(event)" id="peso_rate" class="form-control" disabled />
                              <label for="peso_rate">Peso Rate
                                (Php)</label>
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-floating form-group">
                              <input type="text" style="font-weight: bold;border:none; text-align:right;background-color:white" onkeypress="return onlyNumberKey(event)" id="converted_amount" class="form-control converted_amount" disabled />
                              <label for="converted_amount">Converted
                                Amount (Php)</label>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-12 mb-3">
                        <div class="row">
                          <div class="col">
                            <h4> Deductions </h4>
                          </div>
                        </div>
                      </div>

                      <div class="col-12" id="show_deduction_items">
                      </div>

                      <div class="col-12 mb-3">
                        <div class="row">
                          <div class="col-7" style="text-align:right;">
                            <label style="vertical-align: -webkit-baseline-middle" class="fw-bold">Grand Total
                              (Php):
                              <label>
                          </div>
                          <div class="col-4 mb-3" style="justify-content:end;display:flex">
                            <!-- border-style:none -->
                            <input type="text" id="grand_total" class="form-control no-outline fw-bold" style="text-align:right;border:0;background-color:white;" disabled>
                          </div>
                        </div>
                      </div>

                      <div class="col-12 mb-3">
                        <label for="floatingTextarea">Notes</label>
                        <textarea class="form-control" placeholder="Leave a notes here" id="notes" name="notes"></textarea>
                      </div>

                      <div class="col-6 mb-3">
                        <div class="pb-3">
                          <button type="button" class="btn btn-secondary w-100" style="color:#CF8029; background-color:white; " data-bs-dismiss="modal">Close</button>
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
<div class="modal fade" id="modal-create-deduction" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-dialog">
      <div class="modal-content ">
        <div class="modal-body ">
          <div class="row">
            <h5> Add Deduction </h5>
            <form id="deductiontype_store" method="POST" action="javascript:void(0)" class="g-3 needs-validation" novalidate>
              @csrf
              <input type="text" id="createDeduction_profile_id" hidden>

              <div class="row mb-3">
                <div class="col-12">
                  <div class="form-floating form-group mt-3" id="select_deduction_name"></div>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-12">
                  <div class="form-floating">
                    <input id="createDeduction_deduction_amount" name="createDeduction_deduction_amount" type="text" class="createDeduction_deduction_amount form-control" placeholder="Amount">
                    <label for="createDeduction_deduction_amount">Amount</label>
                  </div>
                </div>
              </div>

              <div class="row mb-3">
                <div class="col">
                  <button type="button" class="btn btn-secondary w-100" style=" color:#CF8029; background-color:white; " data-bs-dismiss="modal">Close</button>
                </div>
                <div class="col">
                  <button type="submit" id="createDeduction_button" class="btn btn-secondary w-100" style="color:White; background-color:#CF8029;">Add</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- START MODAL PROFILE DEDUCTION TYPE EDIT -->
<div class="modal fade" id="ProfileDeductioneditModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-dialog">
      <div class="modal-content ">
        <div class="modal-body ">
          <div class="row">
            <h5> Update Profile Deduction</h5>
            <form id="ProfileDeductiontype_update">
              @csrf
              <input type="text" id="profileDeductionType_id" hidden>

              <div class="form-floating form-group mt-3">
                <input type="text" id="edit_profileDeductionType_name" class="form-control">
                <label for="edit_profileDeductionType_name">Profile Deduction Name</label>
              </div>

              <div class="form-group pt-3">
                <div class="form-floating">
                  <input id="edit_profileDeductionType_amount" type="text" class="form-control" placeholder="Amount">
                  <label for="edit_profileDeductionType_amount">Amount</label>
                </div>

                <div class="row pt-3">
                  <div class="col">
                    <button type="button" class="btn btn-secondary w-100" style=" color:#CF8029; background-color:white; " data-bs-dismiss="modal">Close</button>
                  </div>
                  <div class="col">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#deleteModal" id="deleteProfileDeduction" class="btn btn-danger w-100" style="color:White; background-color:#dc3545;">Delete</button>
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
<div class="modal fade" id="invoice_status" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-dialog">
      <div class="modal-content ">
        <div class="modal-body ">
          <div class="row">
            <h5>Update Invoice Status</h5>
            <form id="update_invoice_status">
              @csrf
              <input type="text" id="updateStatus_invoiceNo" hidden>
              <div class="form-floating form-group mt-3">
                <select class="form-select" id="select_invoice_status">
                  <option value="" Selected disabled>Please choose status</option>
                  <option value="Cancelled">Cancelled</option>
                  <option value="Overdue">Overdue</option>
                  <option value="Paid">Paid</option>
                  <option value="Pending">Pending</option>
                </select>
                <label for="select_invoice_status">Status</label>
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

<!-- Modal FOR DELETE -->
<div class="modal fade" style="z-index: 999999" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <div class="row">
          <div class="col">
            <span>
              <img class="img-team" src="{{ URL('images/Delete.png')}}" style="width: 50%; padding:10px" />
            </span>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <span>
              <h3> Are you sure?</h3>
            </span>
          </div>
        </div>
        <div class="row pt-3 px-3">
          <div class="col">
            <span id="profilededuction_id" hidden></span>
            <span class="text-muted"> Do you really want to delete these record? This process cannot be
              undone.</span>
          </div>
        </div>

        <div class="row pt-3 pb-3 px-3">
          <div class="col-6">
            <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Cancel</button>
          </div>
          <div class="col-6">
            <button type="button" id="profilededuction_delete" class="btn btn-danger w-100">Delete</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- LOADER SPINNER -->
<div class="spanner">
  <div class="loader"></div>
</div>

<script src="{{ asset('/assets/js/userMyProfile.js') }}"></script>

<script type="text/javascript">
  let total_deduction_amount = 0
  let x = 1;
  const PHP = value => currency(value, {
    symbol: '',
    decimal: '.',
    separator: ','

  });
  $(document).ready(function() {
    $('#cancel_edit_profile').addClass('d-none');
    // REFRESH WHEN THIS PAGE IS LOAD
    show_data();
    show_edit()

    $(window).on('load', function() {
      $("div.spanner").addClass("show");
      $('html, body').animate({
        scrollTop: $('#loader_load').offset().top
      }, 'slow');
      setTimeout(function() {
        $("div.spanner").removeClass("show");
        date_hired();
        due_date();
        check_userActivependingInvoices();
        show_profileDeductionType_Button();
        show_Profilededuction_Table_Active();
      }, 1500)
    })

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

    function due_date() {
      // START OF THIS CODE FORMAT DATE FROM dd/mm/yyyy to yyyy/mm/dd
      // Get the input field
      var due_date = $("#due_date");
      // Set the datepicker options
      due_date.datepicker({
        dateFormat: "yy/mm/dd",
        onSelect: function(dateText, inst) {
          // Update the input value with the selected date
          due_date.val(dateText);
        }
      });
      // Set the input value to the current system date in the specified format
      var currentDate = $.datepicker.formatDate("yy/mm/dd", new Date());
      due_date.val(currentDate);
      // END OF THIS CODE FORMAT DATE FROM dd/mm/yyyy to yyyy/mm/dd

    }

    function date_hired() {
      // START OF THIS CODE FORMAT DATE FROM dd/mm/yyyy to yyyy/mm/dd
      // Get the input field
      var date_hired = $("#date_hired");
      // Set the datepicker options
      date_hired.datepicker({
        dateFormat: "yy/mm/dd",
        onSelect: function(dateText, inst) {
          // Update the input value with the selected date
          date_hired.val(dateText);
        }
      });
      // Set the input value to the current system date in the specified format
      var currentDate = $.datepicker.formatDate("yy/mm/dd", new Date());
      date_hired.val(currentDate);
      // END OF THIS CODE FORMAT DATE FROM dd/mm/yyyy to yyyy/mm/dd
    }

    $('#cancel_edit_profile').on('click', function(e) {
      e.preventDefault();
      $('#cancel_edit_profile').addClass('d-none');
      $('#edit_profile').removeClass('d-none');
      $(window).scrollTop(0); // scroll to the top
      setTimeout(function() {
        location.reload(true); // refresh the page
      }, 1000);
    })

    $('#edit_profile').on('click', function(e) {
      e.preventDefault();
      $('#edit_profile').addClass('d-none');
      $('#cancel_edit_profile').removeClass('d-none');
      $('div.spanner').addClass("show");
      $('html, body').animate({
        scrollTop: $('#loader_load').offset().top
      }, 'slow');

      setTimeout(function() {
        $('div.spanner').removeClass("show");
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
      }, 1500);
    })

    // SHOW DATA ON TABLE
    function show_data(filters) {
      // console.log("sddsadsa", urlSplit.length);
      let page = $("#tbl_pagination_invoice .page-item.active .page-link").html();
      let filter = {
        page_size: 10,
        page: page ? page : 1,
        search: $('#search_invoice').val(),
        filter_all_invoices: $('#filter_all_invoices').val(),
        ...filters
      }
      // console.log("page", page);
      $('#dataTable_invoice tbody').empty();
      axios.get(`${apiUrl}/api/user/show_userInvoice?${new URLSearchParams(filter)}`, {
        headers: {
          Authorization: token,
        },
      }).then(function(response) {
        let data = response.data;
        console.log("SHOW DATA", data);
        if (data.success) {
          if (data.data.data.length > 0) {
            data.data.data.map((item) => {
              let newdate = new Date(item.created_at);
              var mm = newdate.getMonth() + 1;
              var dd = newdate.getDate();
              var yy = newdate.getFullYear();
              var due_date = item.due_date;
              var date_now = (new Date()).toISOString().split('T')[0];

              let due_date2 = new Date(item.due_date);
              var mm2 = due_date2.getMonth() + 1;
              var dd2 = due_date2.getDate();
              var yy2 = due_date2.getFullYear();

              let tr = '<tr style="vertical-align: middle;">';
              tr += '<td hidden>' + item.id + '</td>'
              tr += '<td>' +
                item.invoice_no +
                '</td>';
              // console.log("due_date " + due_date + " date_now " + date_now);

              if (item.invoice_status === "Cancelled") {
                tr +=
                  '<td><button data-bs-toggle="modal" data-bs-target="#invoice_status" style="width:100%; height:20px; font-size:10px; padding: 0px;" type="button" id="get_invoiceStatus" class="get_invoiceStatus btn btn-info">' +
                  item.invoice_status + '</button></td>';

              } else if (item.invoice_status === "Paid") {
                tr +=
                  '<td><button data-bs-toggle="modal" data-bs-target="#invoice_status" style="width:100%; height:20px; font-size:10px; padding: 0px;" type="button" id="get_invoiceStatus" class="get_invoiceStatus btn btn-success">' +
                  item.invoice_status + '</button></td>';

              } else if (item.invoice_status === "Pending") {
                tr +=
                  '<td><button data-bs-toggle="modal" data-bs-target="#invoice_status" style="width:100%; height:20px; font-size:10px; padding: 0px;" type="button" id="get_invoiceStatus" class="get_invoiceStatus btn btn-warning" > ' +
                  item.invoice_status + '</button></td >';
              } else {
                tr +=
                  '<td><button data-bs-toggle="modal" data-bs-target="#invoice_status" style="width:100%; height:20px; font-size:10px; padding: 0px;" type="button" id="get_invoiceStatus" class="get_invoiceStatus btn btn-danger">' +
                  item.invoice_status + '</button></td>';
              }

              tr += '<td class=" text-end">' + Number(
                  parseFloat(item
                    .grand_total_amount).toFixed(2))
                .toLocaleString(
                  'en', {
                    minimumFractionDigits: 2
                  }) +
                '</td>';
              tr += '<td class="text-end">' + moment.utc(item.created_at).tz(
                  'Asia/Manila')
                .format('MM/DD/YYYY') +
                '</td>';
              tr += '<td class="text-end">' + moment(item.due_date).format('L') +
                '</td>';
              tr +=
                '<td class="text-center"> <a href="' +
                apiUrl +
                '/user/editInvoice/' +
                item.id +
                '" class="btn btn-outline-primary"><i class="fa-sharp fa-solid fa-eye"></i></a> </td>';
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

            $("#tbl_pagination_invoice .page-item .page-link").on('click', function() {

              $("#tbl_pagination_invoice .page-item").removeClass(
                'active');
              let url = $(this).data('url');
              $.urlParam = function(name) {
                var results = new RegExp("[?&]" + name +
                    "=([^&#]*)")
                  .exec(
                    url
                  );
                return results !== null ? results[1] || 0 : 0;
              };


              let search = $('#search_invoice').val();
              show_data({
                search: search,
                page: $.urlParam('page')
              });

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

    // POST INVOICE STATUS
    $('#update_invoice_status').submit(function(e) {
      e.preventDefault();

      $('div.spanner').addClass('show');
      $().animate({
        scrollTop: $('#loader_load').offset().top
      }, 'smooth');

      var start = performance.now(); // Get the current timestamp
      // Do your processing here


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
          $('#invoice_status').modal('hide');
          $("div.spanner").addClass("show");

          setTimeout(function() {
            $("div.spanner").removeClass("show");
            $('.toast1 .toast-title').html('Update Status');
            $('.toast1 .toast-body').html(response.data.message);
            // show_data();
            $('#dataTable_deduction tbody').empty();
            $('#dataTable_deduction tbody').html(
              show_Profilededuction_Table_Active());
            toast1.toast('show');
          }, 1500);

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
          setTimeout(function() {
            $('div.spanner').removeClass('show');
            toast1.toast('show');
          }, 1500);
        }
      })

    })

    // SHOW CURRENT INVOICE STATUS
    $(document).on('click', '#dataTable_invoice #get_invoiceStatus', function(e) {
      e.preventDefault();
      let rowData = $(this).closest('tr');
      let invoice_no = rowData.find("td:eq(0)").text();
      $('#updateStatus_invoiceNo').val(invoice_no);
      // let invoice_status = $('#select_invoice_status').val();
      // console.log("INVOICE NO", invoice_no + " " + invoice_status);

      axios.get(apiUrl + '/api/getUserInvoiceStatus/' + invoice_no, {
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

    function show_edit() {
      // let user_id = $('#user_id').val();
      axios.get(apiUrl + '/api/user/show_userEdit/', {}, {
          headers: {
            Authorization: token,
          },
        })
        .then(function(response) {
          let data = response.data;
          if (data.success) {
            console.log("SUCCESS", data);
            if (data.data.profile.profile_status === "Active") {
              $('#profile_status').prop('checked', true);
            } else {
              $('#profile_status').prop('checked', false);
            }
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
      $('html,body').animate({
        scrollTop: $('#loader_load').offset().top
      }, 'slow');
      $("div.spanner").addClass("show");
      setTimeout(function() {
        $("div.spanner").removeClass("show");
        $('#tbl_pagination_invoice').empty();
        show_data();
      }, 1500);
    })

    $('#search_deduction').on('change', function() {
      $('html,body').animate({
        scrollTop: $('#loader_load').offset().top
      }, 'slow');
      $("div.spanner").addClass("show");
      setTimeout(function() {
        $("div.spanner").removeClass("show");
        $('#tbl_pagination_deduction').empty();
        show_Profilededuction_Table_Active();
      }, 1500);
    })

    $('#filter_all_invoices').on('change', function() {
      $('html,body').animate({
        scrollTop: $('#loader_load').offset().top
      }, 'slow');
      $("div.spanner").addClass("show");
      setTimeout(function() {
        $("div.spanner").removeClass("show");
        $('#tbl_pagination_invoice').empty();
        show_data();
      }, 1500);
    });

    // CHECK PENDING INVOICES
    function check_userActivependingInvoices(filters) {
      axios.get(`${apiUrl}/api/user/check_userActivependingInvoices?${new URLSearchParams(filters)}`, {
        headers: {
          Authorization: token,
        },
      }).then(function(response) {
        let data = response.data;
        if (data.success) {
          if (data.data.length > 0) {
            data.data.map((item) => {
              var today = new Date();
              var due_dateStatus = item.due_date;
              formatDue_date = moment(due_dateStatus).format('L');
              formatDate_now = moment(today).format('L');

              if (item.invoice_status === "Pending") {
                if (formatDue_date < formatDate_now) {
                  let invoice_id = item.id;
                  let data = {
                    id: invoice_id,
                    invoice_status: "Overdue",
                  }
                  axios.post(apiUrl + '/api/update_status', data, {
                    headers: {
                      Authorization: token
                    },
                  }).then(function(response) {
                    let data = response.data
                    if (data.success) {
                      console.log("SUCCESS Overdue", data);
                      window.location.reload();
                    }
                  }).catch(function(error) {
                    console.log("ERROR", error);
                  })
                }
              }

              if (item.invoice_status === "Cancelled") {
                if (item.due_date < date_now) {
                  console.log("due_dateStatus", item.due_date);
                  console.log("date_now", date_now);
                  let invoice_id = item.id;
                  let data = {
                    id: invoice_id,
                    invoice_status: "Cancelled",
                  }
                  axios.post(apiUrl + '/api/update_status', data, {
                    headers: {
                      Authorization: token
                    },
                  }).then(function(response) {
                    let data = response.data
                    if (data.success) {
                      console.log("SUCCESS Cancelled", data);
                    }
                  }).catch(function(error) {
                    console.log("ERROR", error);
                  })
                }
              }

            })

          }
        }
      }).catch(function(error) {
        console.log("ERROR", error);
      })
    }

    $('#ProfileUpdate').submit(function(e) {
      e.preventDefault();
      if (document.getElementById("profile_status").disabled) {
        $('.toast1 .toast-title').html("View Profile");
        $('.toast1 .toast-body').html("Please click edit profile to update.");
        toast1.toast('show');
      } else {
        let user_id = $("#user_id").val() ? $("#user_id").val() : '';
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

        axios.post(apiUrl + '/api/user/updateProfile', formData, {
            headers: {
              Authorization: token,
              "Content-Type": "multipart/form-data",
            },
          })
          .then(function(response) {
            let data = response.data;
            console.log("SUBMIT", data);
            if (data.success) {

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

              $('html,body').animate({
                scrollTop: $('#loader_load').offset().top
              }, 'slow');
              $("div.spanner").addClass("show");
              setTimeout(function() {
                $("div.spanner").removeClass("show");
                // location.href = apiUrl + "/admin/current"
                window.location.reload();
              }, 1500)

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

    $('#deleteProfileDeduction').on('click', function(
      e) {
      let profileDeductionType_id = $('#profileDeductionType_id').val();
      $("#profilededuction_id").html(profileDeductionType_id);
      console.log("delete", profileDeductionType_id);
    })

    // SHOW EDIT PROFILE DEDUCTION TYPE
    $(document).on('click', '#deductionButton .editProfileDeduction', function(
      e) {
      e.preventDefault();
      $('#profileDeductionType_id').val($(this).val());
      let profileDeductionType_id = $('#profileDeductionType_id').val();

      axios.post(apiUrl + '/api/showProfileDeductionTypes/' +
        profileDeductionType_id, {
          headers: {
            Authorization: token
          },
        }).then(function(response) {
        let data = response.data;
        console.log("EDIT FOR UPATE", profileDeductionType_id);

        $('#edit_profileDeductionType_name').val(data.data.deduction_type_name);
        $('#edit_profileDeductionType_amount').val(PHP(data.data.amount).format());

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
    $(".label_discount_amount").addClass('d-none');
    $(".label_discount_total").addClass('d-none');

    $('input[type=radio][id=discount_type]').change(function() {
      console.log("DISCOUNT TYPE", $(this).val());
      if (subtotal == 0) {
        $("#discount_amount").addClass('d-none');
        $("#discount_total").addClass('d-none');
        $(".label_discount_amount").addClass('d-none');
        $(".label_discount_total").addClass('d-none');
      } else {
        if ($(this).val() === 'Fixed') {
          //write your logic here
          // console.log("FIXED");
          $("#discount_amount").removeClass('d-none');
          $("#discount_total").removeClass('d-none');
          $(".label_discount_amount").removeClass('d-none');
          $(".label_discount_total").removeClass('d-none');

          $('#discount_amount').val('0.00');
          $('#discount_total').val('0.00');

        } else if ($(this).val() === 'Percentage') {
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
      let newDiscount_amount = discount_amount.replace(/[^\d.]/g, ''); // Remove non-numeric characters
      let discount_total = $('#discount_total').val();
      let subtotal = $('#subtotal').val();
      var sum = 0;

      $('#show_items .amount').each(function() {
        sum += Number($(this).val().replace(/[^\d.]/g, ''));
      });

      if (discount_type == 'Fixed') {
        $('#discount_total').val(PHP(parseFloat(newDiscount_amount * 1) ? parseFloat(newDiscount_amount *
            1) : 0)
          .format());

        let sub_total = (sum - $('#discount_total').val().replace(/[^\d.]/g, ''));
        $('#subtotal').val(PHP(sub_total).format());
        let dollar_amount = $('#subtotal').val();
        $('#dollar_amount').val(PHP(dollar_amount).format());
        DeductionItems_total()

      } else if (discount_type == 'Percentage') {

        let percentage = parseFloat(((newDiscount_amount ? newDiscount_amount : 0) / 100) * sum);
        $('#discount_total').val(PHP(percentage).format());
        let sub_total = (parseFloat(sum) - parseFloat(percentage));
        $('#subtotal').val(PHP(sub_total).format());
        $('#dollar_amount').val(PHP(sub_total).format());
        DeductionItems_total()
      }
      getResults_Converted();
    }

    $('#profilededuction_delete').on('click', function(e) {
      e.preventDefault();
      let id = $('#profilededuction_id').html();
      axios.post(apiUrl + '/api/deleteProfileDeductionTypes/' +
        id, {
          headers: {
            Authorization: token
          },
        }).then(function(response) {
        let data = response.data;
        if (data.success) {
          console.log("SUCCCESS", data);

          $('#deleteModal').modal('hide');
          $('div.spanner').addClass("show");

          setTimeout(function() {
            $('div.spanner').removeClass("show");
            $('.toast1 .toast-title').html('Deleted Successfully');
            $('.toast1 .toast-body').html(data.message);

            // PROFILE DEDUCTION BUTTON
            $('#deductionButton').empty();
            $('#deductionButton').html(
              show_profileDeductionType_Button());
            // PROFILE DEDUCTION TABLE
            $('#dataTable_deduction tbody').empty();
            $('#dataTable_deduction tbody').html(
              show_Profilededuction_Table_Active());
            // PROFILE INVOICES TABLE
            $('#dataTable_invoice tbody').empty();
            $('#dataTable_invoice tbody').html(
              show_data());
            toast1.toast('show');
          }, 1500);
        }
      }).catch(function(error) {
        console.log("ERROR", error);
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
    });

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
      DeductionItems_total();
    });

    $('#discount_amount').focusout(function() {
      if ($('#discount_amount').val() == "") {
        $('#discount_amount').val('0.00');
      } else {
        let discount_type = $("input[id='discount_type']:checked").val();
        if (discount_type == 'Percentage') {
          let discount_amount = $('#discount_amount').val();
          let newDiscount_amount = discount_amount.replace(/[^\d.]/g,
            ''); // Remove non-numeric characters
          $('#discount_amount').val(newDiscount_amount);
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
      let quantity = parent.find('.quantity').val().replaceAll(',', '');
      let rate = parent.find('.rate').val().replaceAll(',', '');
      let newQuantity = quantity.replace(/[^\d.]/g, '');
      let newRate = rate.replace(/[^\d.]/g, '');

      sub_total = parseFloat(newQuantity * newRate);
      parent.find('.amount').val(PHP(sub_total).format());
      // getResults_Converted();
      Additems_total();
      subtotal();

    });

    // FUNCTION FOR DISPLAYING SUBTOTAL AMOUNT AND DOLLAR AMOUNT
    function Additems_total() {
      var sum = 0;
      let converted_amount = 0;
      $('#show_items .amount').each(function() {
        sum += Number($(this).val().replace(/[^\d.]/g, ''));
      });


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
        deduction_sum += Number($(this).val().replace(/[^\d.]/g, ''));
      })

      $('#show_items .amount').each(function() {
        converted_amount += Number($(this).val().replace(/[^\d.]/g, ''));
      });

      peso_rate = $('#peso_rate').val().replaceAll(',', '') ? $('#peso_rate').val()
        .replaceAll(
          ',', '') :
        0;
      dollar_amount = $('#dollar_amount').val().replaceAll(',', '') ? $('#dollar_amount')
        .val()
        .replaceAll(',', '') : 0;
      converted_amount_input = parseFloat(dollar_amount * peso_rate);
      grand_total =
        parseFloat(converted_amount_input - deduction_sum);
      $('#grand_total').val(PHP(grand_total).format());
      // console.log("grand_total", grand_total);
    }

    // FUNCTION CLICK FOR REMOVING INVOICE ITEMS ROWS
    $(document).on('click', '.remove_items', function(e) {
      e.preventDefault();
      let parent = $(this).closest('.row');
      let sub_total = parent.find('.subtotal').val();
      let row_item = $(this).parent().parent().parent();
      console.log("row_item", row_item);
      if (row_item) {
        $.confirm({
          icon: 'fa fa-warning',
          draggable: false,
          animation: 'news',
          closeAnimation: 'news',
          title: 'Are you sure?',
          content: 'Do you really want to delete these record? This process cannot be undone.',
          autoClose: 'Cancel|5000',
          buttons: {
            removeDeductions: {
              btnClass: 'btn btn-danger',
              text: 'Confirm',
              action: function() {
                $(row_item).remove();
                if ($('#show_items > .row').length === 1) {
                  $('#show_items > .row').find('.col-remove-item')
                    .removeClass('d-none')
                    .addClass(
                      'd-none');
                }
                getResults_Converted();
                Additems_total();
                subtotal();
                DeductionItems_total();
                x--;
              }
            },
            Cancel: function() {}
          },
          onClose: function() {
            // before the modal is hidden.
          },
        });
      }
    });

    // FUNCTION CLICK FOR REMOVING INVOICE DEDUCTIONS ROWS
    $(document).on('click', '.remove_deductions', function(e) {
      e.preventDefault();
      let parent = $(this).closest('.row');
      let row_item = $(this).parent().parent().parent();
      if (row_item) {
        $.confirm({
          icon: 'fa fa-warning',
          draggable: false,
          animation: 'news',
          closeAnimation: 'news',
          title: 'Are you sure?',
          content: 'Do you really want to delete these record? This process cannot be undone.',
          autoClose: 'Cancel|5000',
          buttons: {
            removeDeductions: {
              btnClass: 'btn btn-danger',
              text: 'Confirm',
              action: function() {
                $(row_item).remove();
                getResults_Converted();
                Additems_total();
                subtotal();
                DeductionItems_total();
                x--;
              }
            },
            Cancel: function() {}
          },
        });
      }

    });

    // FUNCTION CLICK FOR DISPLAY INVOICE ITEM ROWS
    $("#add_item").click(function(e) {
      e.preventDefault();
      display_item_rows()
    });

    // INITIALIZE DISPLAY ITEM ROWS
    function display_item_rows() {
      let max_fields = 5;
      if (x < max_fields) {
        let wrapper = $('#show_items');
        add_rows = '';
        add_rows += '<div class="row row1">';
        add_rows += '<div class="col-md-4 mb-3">';
        add_rows += '<div class="form-floating form-group">';
        add_rows +=
          '<input type="text" name="item_description" placeholder="Item Description" id="item_description" class="form-control item_description" />';
        add_rows += '<label for="item_description">Item Desctiption</label>';
        add_rows += '</div>';
        add_rows += '</div>';

        add_rows += '<div class="col-md-2 mb-3">';
        add_rows += '<div class="form-floating form-group">';
        add_rows +=
          '<input type="text" step="any" maxlength="4" placeholder="Quantity" name="quantity" id="quantity" style="text-align:right;" class="form-control multi quantity" />';
        add_rows += '<label for="quantity">Quantity</label>';
        add_rows += '</div>';
        add_rows += ' </div>';

        add_rows += '<div class="col-md-3 mb-3">';
        add_rows += '<div class="form-floating form-group">';
        add_rows +=
          '<input type="text" step="any" name="rate" placeholder="Rate" id="rate" style="text-align:right;" class="form-control multi rate" />';
        add_rows += '<label for="rate">Rate</label>';
        add_rows += '</div>';
        add_rows += '</div>';

        add_rows += '<div class="col-md-2 mb-3">';
        add_rows += '<div class="form-floating form-group">';
        // style="text-align:right;border:none;background-color:white"
        add_rows +=
          '<input type="text" style="text-align:right;border:none;background-color:white" disabled name="amount" id="amount" class="form-control amount" />';
        add_rows += '<label for="amount">Amount</label>';
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
        x++;
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
      $('html,body').animate({
        scrollTop: $('#loader_load').offset().top
      }, 'slow');
      $("div.spanner").addClass("show");
      setTimeout(function() {
        $("div.spanner").removeClass("show");
        $('#invoice_items').trigger('reset'); // reset the form
        show_data();
      }, 1500)

      $('#show_deduction_items').empty();
      $('textarea').val('');
    });

    $("#modal-create-deduction").on('hide.bs.modal', function() {
      $('html,body').animate({
        scrollTop: $('#loader_load').offset().top
      }, 'slow');
      $("div.spanner").addClass("show");

      setTimeout(function() {
        $("div.spanner").removeClass("show");
        $('#deductionButton').empty();
        $('#deductionButton').html(
          show_profileDeductionType_Button());
      }, 1500)
    });

    $("#ProfileDeductioneditModal").on('hide.bs.modal', function() {
      $('html,body').animate({
        scrollTop: $('#loader_load').offset().top
      }, 'slow');
      $("div.spanner").addClass("show");
      setTimeout(function() {
        $("div.spanner").removeClass("show");
      }, 1500)
    });

    $("#invoice_status").on('hide.bs.modal', function() {
      // window.location.reload();
      $('html,body').animate({
        scrollTop: $('#loader_load').offset().top
      }, 'slow');
      $("div.spanner").addClass("show");
      setTimeout(function() {
        $("div.spanner").removeClass("show");
        show_data();
      }, 1500)
    });

    $("#button-addon2").click(function(e) {
      due_date();
      let toast1 = $('.toast1');
      // let id = $('#user_id').val();
      axios
        .get(apiUrl + '/api/invoice/check_userProfile/', {}, {
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
                add_rows += '<div class="col-7">';
                add_rows += '<div class="form-floating form-group w-100">';
                add_rows +=
                  '<input type="text" class="profile_deduction_type_id" value=' +
                  item.id +
                  ' hidden>';
                add_rows +=
                  '<select class="form-control deduction_type_name" id="deduction_type_name" name="deduction_type_name">';
                add_rows += '<option value=' + item.deduction_type_name +
                  '>' + item.deduction_type_name + '</option> ';
                add_rows += '</select>';
                add_rows +=
                  '<label for="deduction_type_name">Deduction Type</label>';
                add_rows += '</div>';
                add_rows += '</div>';

                add_rows += '<div class="col-4">';
                add_rows += '<div class="form-floating form-group ">';
                add_rows +=
                  '<input type="text" value="' + PHP(item
                    .amount)
                  .format() +
                  '" style="text-align:right;" id="deduction_amount" name="deduction_amount" class="form-control multi2 deduction_amount" />';
                add_rows +=
                  '<label for="deduction_amount">Deduction Amount (Php)</label>';
                add_rows += '</div>';
                add_rows += '</div>';

                add_rows += '<div class="col-1 col-remove-deductions">';
                add_rows += '<div class="form-group">';
                add_rows +=
                  '<button type="button" class="btn remove_deductions" style="display: flex;justify-content: center;margin-top:25px"><i class="fa fa-trash pe-1" style="color:red"></i></button>';
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
    $('#invoice_items').submit(function(e) {
      e.preventDefault();
      $('div.spanner').addClass('show');
      $('html,body').animate({
        scrollTop: $('#loader_load').offset().top
      }, 'smooth');
      var start = performance.now(); // Get the current timestamp

      // Do your processing here
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
      let due_date = $('#due_date').val();
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
        let profile_deduction_type_id = $(this).find('.profile_deduction_type_id').val();
        let deduction_type_name = $(this).find('.deduction_type_name').val();
        let deduction_amount = $(this).find('.deduction_amount').val().replaceAll(',', '');

        Deductions.push({
          profile_deduction_type_id,
          deduction_type_name,
          deduction_amount,
        })
      });

      let data = {
        profile_id: profile_id,
        // invoice_no: invoice_no,
        due_date: due_date,
        description: invoice_description,
        peso_rate: peso_rate ? peso_rate : 0,
        sub_total: invoice_subtotal,
        converted_amount: invoice_converted_amount ? invoice_converted_amount : 0,
        discount_type: invoice_discount_type,
        discount_amount: invoice_discount_amount ? invoice_discount_amount : 0,
        discount_total: invoice_discount_total ? invoice_discount_total : 0,
        grand_total_amount: invoice_total_amount ? invoice_total_amount : 0,
        notes: invoice_notes,
        invoiceItem,
        Deductions,
      }
      console.log("DATA", data);

      axios.post(apiUrl + "/api/createinvoice", data, {
        headers: {
          Authorization: token
        },
      }).then(function(response) {
        let data = response.data;
        if (data.success) {
          console.log("SUCCES", data.success);
          $('#exampleModal').modal('hide');
          $("div.spanner").addClass("show");
          setTimeout(function() {
            $("div.spanner").removeClass("show");
            $('.toast1 .toast-title').html('Create Invoices');
            $('.toast1 .toast-body').html(response.data.message);
            $('#invoice_items').trigger('reset'); // reset the form
            $('#show_deduction_items').empty();
            $('textarea').val('');
            $('#dataTable_deduction tbody').empty();
            $('#dataTable_deduction tbody').html(
              show_Profilededuction_Table_Active());
            $(".label_discount_amount").addClass('d-none');
            $(".label_discount_total").addClass('d-none');
            toast1.toast('show');
          }, 1500)

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
            setTimeout(function() {
              $('div.spanner').removeClass('show');
              toast1.toast('show');
            }, 1500);
          })
        }
      });

    });

    // CREATE DEDUCTION TYPE
    $('#deductiontype_store').submit(function(e) {
      e.preventDefault();

      let profile_id = $("#createDeduction_profile_id").val();
      let deduction_type_id = $("#createDeduction_deduction_name").val();
      let amount = $("#createDeduction_deduction_amount").val().replaceAll(',', '');

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
          $('#modal-create-deduction').modal('hide');

          $('html.body').animate({
            scrollTop: $('#loader_load').offset().top
          }, 'slow');
          $("div.spanner").addClass("show");
          setTimeout(function() {
            $("div.spanner").removeClass("show");
            toast1.toast('show');
          }, 1500)
          $('.toast1 .toast-title').html('Profile Deduction');
          $('.toast1 .toast-body').html(data.message);
        }).catch(function(error) {
          console.log("ERROR", error);
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


    function show_profile_deductions_onSelect() {
      let profile_id = $('#profile_id_show').val();
      if (profile_id) {
        $('#createDeduction_profile_id').val(profile_id);
        axios.get(apiUrl + '/api/settings/show_deduction_data/' + profile_id, {
          headers: {
            Authorization: token,
          },
        }).then(function(response) {
          let data = response.data;
          console.log("show_deduction_data", data);
          if (data.success) {
            $('#select_deduction_name').empty();
            let option = '';
            option +=
              '<select class="createDeduction_deduction_name form-select" id="createDeduction_deduction_name">';
            option +=
              '<option selected disabled value = "" >Please Select Deductions</option>';


            if (data.data.length > 0) {
              data.data.filter(f => f.profile_deduction_types.length === 0)
                .map((item) => {
                  option += "<option value=" + item.id + ">" +
                    item
                    .deduction_name + "</option>";
                })
            }
            option += '</select>';
            option += '<label for="createDeduction_deduction_name">Deduction Name:</label>';
            $('#select_deduction_name').append(
              option);
          }
        }).catch(function(error) {
          console.log("ERROR", error.response.data);
        })
      }
    }

    $('#submit-create-deduction').on('click', function(e) {
      e.preventDefault();
      show_profile_deductions_onSelect();
      $('#createDeduction_deduction_amount').val('');
    })

    $(document).on('change', '#createDeduction_deduction_name', function() {
      let deduction_id = $(this).val();
      console.log("SELECT", deduction_id);
      if (deduction_id) {
        axios.get(apiUrl + '/api/settings/get_deduction/' + deduction_id, {
          headers: {
            Authorization: token,
          },
        }).then(function(response) {
          let data = response.data;
          console.log("SUCCESS", data);
          if (data.success) {
            {
              $('#createDeduction_deduction_amount').val(PHP(data.data
                .deduction_amount).format());
            }
          }
        }).catch(function(error) {
          console.log("ERROR", error);
        })

      }
    })

    // RESERVE FOR DISPLAY STATUS ON DEDUCTION
    // ORIGINAL
    function show_Profilededuction_Table_Active(filters) {
      // console.log(urlSplit.length);
      let page = $("#tbl_pagination_deduction .page-item.active .page-link").html();
      let profile_id = $('#profile_id_show').val();

      if (profile_id) {
        let filter = {
          page_size: 10,
          page: page ? page : 1,
          profile_id: $('#profile_id_show').val(),
          search: $('#search_deduction').val(),
          ...filters
        }

        $('#dataTable_deduction tbody').empty();
        axios.get(
            `${apiUrl}/api/admin/show_Profilededuction_Table_Active?${new URLSearchParams(filter)}`, {
              headers: {
                Authorization: token,
              },
            })
          .then(function(response) {
            data = response.data;
            if (data.success) {
              console.log("PROFILE DEDUCTION SUCCESS", data);
              if (data.data.data.length > 0) {
                data.data.data.map((item) => {
                  let newdate = new Date(item.created_at);
                  var mm = newdate.getMonth() + 1;
                  var dd = newdate.getDate();
                  var yy = newdate.getFullYear();

                  let tr = '<tr style="vertical-align: middle;">';

                  tr += '<td>' + item.invoice.invoice_no + '</td>';
                  if (item.invoice.invoice_status == "Cancelled") {
                    tr +=
                      '<td><button style="width:100%; height:20px; font-size:10px; padding: 0px;" type="button" class="btn btn-info btn-xs" > Cancelled </button></td >';
                  } else if (item.invoice.invoice_status ==
                    "Paid") {

                    tr +=
                      '<td><button style="width:100%; height:20px; font-size:10px; padding: 0px;" type="button" class="btn btn-success">Paid</button></td>';
                  } else if (item.invoice.invoice_status ==
                    "Pending") {

                    tr +=
                      '<td><button style="width:100%; height:20px; font-size:10px; padding: 0px;" type="button" class="btn btn-warning">Pending</button></td>';
                  } else {
                    tr +=
                      '<td><button style="width:100%; height:20px; font-size:10px; padding: 0px;" type="button" class="btn btn-danger">Overdue</button></td>';
                  }

                  tr += '<td>' + item.deduction_type_name +
                    '</td>';
                  tr += '<td class="text-end">' + PHP(item
                      .amount)
                    .format() + '</td>';
                  tr += '<td class="text-end">' + moment.utc(item.created_at).tz(
                    'Asia/Manila').format(
                    'MM/DD/YYYY') + '</td>';

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
                      return results !== null ? results[1] || 0 : 0;
                    };
                    let search = $('#search_deduction').val();
                    show_Profilededuction_Table_Active({
                      search: search,
                      page: $.urlParam('page')
                    })

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

    $(document).on('click', '#dataTable_deduction .deleteButton', function(
      e) {
      e.preventDefault();
      let row = $(this).closest("td");
      let deleteProfileDeductionType_id = row.find(".deleteButton").val();
      $("#deleteProfileDeductionType_id").html(deleteProfileDeductionType_id);
      console.log("deleteProfileDeductionType_id", deleteProfileDeductionType_id);
    })

    $('#deleteProfileDeductionTypeButton').on('click', function(e) {
      e.preventDefault();

      let deductionType_id = $('#deductionType_id').html();
      axios.post(apiUrl + '/api/deleteDeductionType/' + deductionType_id, {
        headers: {
          Authorization: token,
        },
      }).then(function(response) {
        let data = response.data
        if (data.success) {
          $('#deleteModal').modal('hide');
          $('html,body').animate({
            scrollTop: $('#loader_load').offset().top
          }, 'smooth');
          $('div.spanner').addClass('show');
          setTimeout(function() {
            $('div.spanner').removeClass('show');
            $('.toast1 .toast-title').html('Invoice Configuration');
            $('.toast1 .toast-body').html(response.data.message);
            toast1.toast('show');
            show_data();
          }, 1500);
        }
      }).catch(function(error) {
        console.log("ERROR", error);
      });
    });


    $("#createDeduction_deduction_amount").focusout(function() {
      let amount = $(this).val();
      $('#createDeduction_deduction_amount').val(PHP(amount).format());
    });

    $("#edit_profileDeductionType_amount").focusout(function() {
      let amount = $(this).val();
      $('#edit_profileDeductionType_amount').val(PHP(amount).format());
    });

    // SHOW DEDUCTIONS DATA IN TABLE
    function show_profileDeductionType_Button() {
      let profile_id = $('#profile_id_show').val();
      console.log("profile_id", profile_id);
      $("#deductionButton").empty();
      axios.get(apiUrl + '/api/settings/show_profileDeductionType_Button/' + profile_id, {
          headers: {
            Authorization: token,
          },
        })
        .then(function(response) {
          let data = response.data;
          console.log("show_profileDeductionType_Button", data);
          if (data.success) {
            if (data.data.profile_deduction_types.length > 0) {
              data.data.profile_deduction_types.map((item) => {
                let label = '<label>';

                label +=
                  "<button type='button' data-bs-toggle='modal' style='width:150px;' data-bs-target='#ProfileDeductioneditModal' id='editProfileDeduction' class='editProfileDeduction btn btn-primary my-2 mx-2' value=" +
                  item.id + ">" + item.deduction_type_name +
                  "</button>";
                // <button type='button' data-bs-toggle='modal' data-bs-target='#deleteModal' class='deleteProfileDeduction profile-close' aria-hidden='true'><span style='color:black;' value=" +
                // item.id +
                // ">&times;</span></button>";
                label += '</label>';
                $("#deductionButton").append(label);
                return '';
              })
            }
          }
        })
        .catch(function(error) {
          console.log("catch error", error);
        });
    }

    // MODAL OF PROFILE DEDUCTION TYPE BUTTON
    $('#ProfileDeductiontype_update').submit(function(e) {
      e.preventDefault();
      console.log("UPDATE");
      let profileDeductionType_id = $('#profileDeductionType_id').val();
      let profileDeductionType_name = $('#edit_profileDeductionType_name').val();
      let profileDeductionType_amount = $('#edit_profileDeductionType_amount').val().replaceAll(',',
        '');

      let data = {
        id: profileDeductionType_id,
        amount: profileDeductionType_amount,
        deduction_type_name: profileDeductionType_name
      };
      axios.post(apiUrl + '/api/editProfileDeductionTypes', data, {
        headers: {
          Authorization: token
        },
      }).then(function(response) {
        let data = response.data;
        if (data.success) {

          // $('#profileDeductionType_id').val('');
          // $('#edit_profileDeductionType_amount').val('');

          $("div.spanner").addClass("show");
          setTimeout(function() {
            $("div.spanner").removeClass("show");
            $('.toast1 .toast-title').html('Deduction Types');
            $('.toast1 .toast-body').html(response.data.message);
            show_profileDeductionType_Button();
            show_Profilededuction_Table_Active();
            toast1.toast('show');
          }, 1500)

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

    Tabs();
    // TABS SELECTOR WONT CHANGE IF REFRESH
    function Tabs() {
      $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
      });
      var activeTab = localStorage.getItem('activeTab');
      if (activeTab) {
        $('#pills-tab a[href="' + activeTab + '"]').tab('show');
      }
    }
    $(window).on('beforeunload', function() {
      // Save a timestamp in localStorage to detect page refresh
      localStorage.removeItem('activeTab');
    });

    function capitalize(s) {
      if (typeof s !== 'string') return "";
      return s.charAt(0).toUpperCase() + s.slice(1);
    }


  });
</script>

@endsection