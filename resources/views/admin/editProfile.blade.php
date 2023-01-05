@extends('layouts.master')

<script>
    function edValueKeyPress() {
        var edValue = document.getElementById("full_name");
        var s = edValue.value;

        var lblValue = document.getElementById("full_name_output");
        lblValue.innerText = " " + s;

    }
</script>
@section('content-dashboard')

<div class="container-fluid pt-0">
    <h1 class="mt-0">View Profile</h1>
    <ol class="breadcrumb mb-3"></ol>

    <div class="row">
        <div class="col-md-6 px-2">
            <div class="card shadow p-2 mb-5 bg-white rounded" style="width: 100%; height:100%">
                <div class="card-header">Edit Information</div>
                <div class="row px-4 pb-4">
                    <div class="px-2 pb-2 pt-2">
                        @if(Session::get('success'))
                        <div class="alert alert-success text-center">
                            {{ Session::get('success') }}
                        </div>
                        @endif

                        @if(Session::get('fail'))
                        <div class="alert alert-danger text-center">
                            {{ Session::get('fail') }}
                        </div>
                        @endif
                    </div>

                    <form action="{{ route('profile.update') }}" method="POST" class="row g-3sneeds-validation" novalidate enctype="multipart/form-data">
                        @csrf

                        @if($profile->id)
                        <input name="id" type="hidden" value="{{$profile->id}}">
                        @endif

                        <div class="row">
                            <div class="col mb-3">

                                <div class="profile-pic-div" style="position: relative; height:200px">
                                    <img style="width:100%;" class="rounded-pill" src="{{ asset($profile->file_path) }}" title="" id="photo">
                                    <input name="profile_picture" type="file" id="file">
                                    <label for="file" id="uploadBtn">Choose Photo</label>
                                </div>

                            </div>
                            <div class="col pt-5">
                                <div class="row">
                                    <div class="row pt-2">
                                        <label class="mb-5">{{$profile->profile_status}}</label>
                                    </div>
                                    <div class="row pt-2">
                                        <label class="mb-5">
                                            <span id="full_name_output">{{$profile->full_name}}</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Full Name</label>
                            <input id="full_name" onKeyPress="edValueKeyPress()" onKeyUp="edValueKeyPress()" name="full_name" value="{{$profile->full_name}}" type="text" class="form-control @error('full_name') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Full Name">
                            @error('full_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Position</label>
                            <select class="form-select @error('position') is-invalid @enderror" name="position" aria-label="Default select example" defaultValue="select">
                                @if($profile->position)
                                <option value="{{$profile->position}}" selected hidden>{{$profile->position}}</option>
                                @endif
                                <option value="Lead Developer">Lead Developer</option>
                                <option value="Senior Developer">Senior Developer</option>
                                <option value="Junior Developer">Junior Developer</option>
                                <option value="Web Designer">Web Designer</option>
                                <option value="Tester">Tester</option>
                            </select>
                            <!-- <input name="position" type="text" class="form-control" id="formGroupExampleInput"
                                placeholder="Position"> -->
                            @error('position')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Phone Number</label>
                            <input name="phone_number" value="{{$profile->phone_number}}" type="text" class="form-control @error('phone_number') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Phone Number">
                            @error('phone_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Address</label>
                            <input name="address" value="{{$profile->address}}" type="text" class="form-control @error('address') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Address">
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Province</label>
                            <input name="province" value="{{$profile->province}}" type="text" class="form-control @error('province') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Province">
                            @error('province')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">City</label>
                            <input name="city" value="{{$profile->city}}" type="text" class="form-control @error('city') is-invalid @enderror" id="formGroupExampleInput2" placeholder="City">
                            @error('city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Zip Code</label>
                            <input name="zip_code" value="{{$profile->zip_code}}" type="text" class="form-control @error('zip_code') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Zip Code">
                            @error('zip_code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Profile Status</label>
                            <select class="form-select @error('profile_status') is-invalid @enderror" name="profile_status" aria-label="Default select example">
                                @if($profile->profile_status)
                                <option value="{{$profile->profile_status}}" selected hidden>
                                    {{$profile->profile_status}}
                                </option>
                                @endif
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                            <!-- <input name="profile_status" type="text" class="form-control" id="formGroupExampleInput2"
                                placeholder="Profile Status"> -->
                            @error('profile_status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Account Number</label>
                            <input name="acct_no" value="{{$profile->acct_no}}" type="text" class="form-control @error('acct_no') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Account Number">
                            @error('acct_no')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Account Name</label>
                            <input name="acct_name" value="{{$profile->acct_name}}" type="text" class="form-control @error('acct_name') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Account Name">
                            @error('acct_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Bank Name</label>
                            <select class="form-select @error('bank_name') is-invalid @enderror" name="bank_name" aria-label="Default select example">
                                @if($profile->bank_name)
                                <option value="{{$profile->bank_name}}" selected hidden>{{$profile->bank_name}}</option>
                                @endif
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
                            <!-- <input name="bank_name" type="text" class="form-control" id="formGroupExampleInput2"
                                placeholder="Bank Name"> -->
                            @error('bank_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Bank Location</label>
                            <input name="bank_location" value="{{$profile->bank_location}}" type="text" class="form-control @error('bank_location') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Bank Address">
                            @error('bank_location')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Gcash Number</label>
                            <input name="gcash_no" value="{{$profile->gcash_no}}" type="text" class="form-control @error('gcash_no') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Gcash Number">
                            @error('gcash_no')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Date Hired</label>
                            <input name="date_hired" value="{{$profile->date_hired}}" type="date" class="form-control @error('date_hired') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Date Hired">
                            @error('date_hired')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>



                        <div class="row">
                            <div class="col mb-3">
                                <button type="submit" style="width:100%; height:50px;color:white; background-color: #CF8029;" class="btn ">Edit
                                    Profile</button>
                            </div>
                            <div class="col mb-3">
                                <button type="submit" style="width:100%; height:50px;color:white; background-color: #A4A6B3;" class="btn">Change Password</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>



        <div class="col-md-6 px-1">
            <div class="row" style="height:100%">
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

                        <div class="col-md-4 w-100">
                            <div class="input-group">
                                <button type="button" style="color:white; background-color: #CF8029;" class="btn form-check-inline pe-3 "><i class="fa fa-plus pe-1"></i>Create
                                    Invoice</button>

                                <input type="text" aria-label="First name" class="form-control form-check-inline">
                                <div class="form-group has-search">
                                    <span class="fa fa-search form-control-feedback"></span>
                                    <input type="text" class="form-control" placeholder="Search">
                                </div>

                            </div>
                        </div>

                        <div class=" tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                <div class="card-body table-responsive">
                                    <table style=" color: #A4A6B3;font-size: 14px;" class="table table-hover" id="datatablesSimple">
                                        <thead>
                                            <tr>
                                                <th>Invoice #</th>
                                                <th>Status</th>
                                                <th>Due Date</th>
                                                <th>Total Amount</th>
                                                <th class="text-center">Action</th>

                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td><button style="width:100%; height:20px; font-size:10px; padding: 0px;" type="button" class="btn btn-danger btn-xs">Pending</button>
                                                </td>
                                                <td>12/31/2022</td>
                                                <td>Edinburgh</td>
                                                <td class="text-center" style="font-size:14px">
                                                    <button style="width:90px" type="button" class="fa-sharp fa-solid fa-eye view-hover"></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td><button style="width:100%; height:20px; font-size:10px; padding: 0px;" type="button" class="btn btn-info">Cancelled</button></td>
                                                <td>12/31/2022</td>
                                                <td>Edinburgh</td>
                                                <td class="text-center" style="font-size:14px">
                                                    <button type="button" class="fa-sharp fa-solid fa-eye view-hover"></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td><button style="width:100%; height:20px; font-size:10px; padding: 0px;" type="button" class="btn btn-success">Paid</button>
                                                </td>
                                                <td>12/31/2022</td>
                                                <td>Edinburgh</td>
                                                <td class="text-center" style="font-size:14px">
                                                    <button type="button" class="fa-sharp fa-solid fa-eye view-hover"></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                ...
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection