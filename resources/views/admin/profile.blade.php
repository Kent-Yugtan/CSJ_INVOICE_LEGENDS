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
    <h1 class="mt-0">Add Profile</h1>
    <ol class="breadcrumb mb-3"></ol>
    <div class="row">
        <div class="col-md-6 px-2">
            <div class="card shadow p-2 mb-5 bg-white rounded" style="width: 100%; height:100%">
                <div class="card-header">Profile Information</div>
                <div class="row px-4 pb-4">

                    <div id="error_msg" class="alert alert-danger text-center"></div>
                    <form method="POST" id="ProfileStore" class="row g-3 needs-validation" novalidate
                        enctype="multipart/form-data">

                        <div class="col mb-3">
                            <div class="profile-pic-div" style="position: relative; height:200px">
                                <img src="" id="photo">
                                <input name="profile_picture" type="file" id="file">
                                <label for="file" id="uploadBtn">Choose Photo</label>
                            </div>
                        </div>

                        <div class="col pt-5">
                            <div class="row pt-2">
                                <label class="mb-5">(Active or Inactive)</label>
                            </div>
                            <div class="row pt-2">
                                <label class="mb-5">
                                    <h5>
                                        <span id="full_name_output"></span>

                                    </h5>
                                </label>
                            </div>
                        </div>
                        @csrf

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Full Name</label>
                            <input id="full_name" onKeyPress="edValueKeyPress()" onKeyUp="edValueKeyPress()"
                                name="full_name" type="text"
                                class="form-control @error('full_name') is-invalid @enderror" placeholder="Full Name">
                            @error('full_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

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
                            <input id="phone_number" name="phone_number" type="text"
                                class="form-control @error('phone_number') is-invalid @enderror"
                                placeholder="Phone Number">
                            @error('phone_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Address</label>
                            <input name="address" id="address" type="text"
                                class="form-control @error('address') is-invalid @enderror" placeholder="Address">
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Province</label>
                            <input name="province" id="province" type="text"
                                class="form-control @error('province') is-invalid @enderror" placeholder="Province">
                            @error('province')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">City</label>
                            <input id="city" name="city" type="text"
                                class="form-control @error('city') is-invalid @enderror" placeholder="City">
                            @error('city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Zip Code</label>
                            <input id="zip_code" name="zip_code" type="text"
                                class="form-control @error('zip_code') is-invalid @enderror" placeholder="Zip Code">
                            @error('zip_code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Profile Status</label>
                            <select class="form-select @error('profile_status') is-invalid @enderror"
                                name="profile_status" id="profile_status" aria-label="Default select example">
                                <option selected disabled value="">Please Select Profile Status</option>
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
                            <input name="acct_no" id="acct_no" type="text"
                                class="form-control @error('acct_no') is-invalid @enderror"
                                placeholder="Account Number">
                            @error('acct_no')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Account Name</label>
                            <input name="acct_name" id="acct_name" type="text"
                                class="form-control @error('acct_name') is-invalid @enderror"
                                placeholder="Account Name">
                            @error('acct_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
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
                            <input id="bank_location" name="bank_location" type="text"
                                class="form-control @error('bank_location') is-invalid @enderror"
                                placeholder="Bank Address">
                            @error('bank_location')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Gcash Number</label>
                            <input name="gcash_no" type="text"
                                class="form-control @error('gcash_no') is-invalid @enderror" id="gcash_no"
                                placeholder="Gcash Number">
                            @error('gcash_no')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Date Hired</label>
                            <input name="date_hired" type="date"
                                class="form-control @error('date_hired') is-invalid @enderror" id="date_hired"
                                placeholder="Date Hired">
                            @error('date_hired')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col mb-3">
                            <button type="submit"
                                style="width:100%; height:50px;color:white; background-color: #CF8029;" class="btn ">Add
                                Profile</button>
                        </div>

                        <div class="col mb-3">
                            <button type="submit"
                                style="width:100%; height:50px;color:white; background-color: #A4A6B3;"
                                class="btn">Change Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $("#error_msg").hide();

    $('#ProfileStore').submit(function(e) {
        e.preventDefault();
        $("#error_msg").hide();

        let full_name = $("#full_name").val();
        let position = $("#position").val();
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

        let formData = new FormData();
        formData.append('full_name', full_name);
        formData.append('position', position);
        formData.append('phone_number', phone_number);
        formData.append('address', address);
        formData.append('province', province);
        formData.append('city', city);
        formData.append('zip_code', zip_code);
        formData.append('profile_status', profile_status);
        formData.append('acct_no', acct_no);
        formData.append('acct_name', acct_name);
        formData.append('bank_name', bank_name);
        formData.append('bank_location', bank_location);
        formData.append('gcash_no', gcash_no);
        formData.append('date_hired', date_hired);
        formData.append('file_name', document.getElementById('file').files[0]);

        axios.post(apiUrl + '/api/saveprofile', formData)
            .then(function(response) {
                console.log('then', response);

                // if (!data.succcess) {
                //     $("#error_msg").html(data.message).show();
                // } else {
                //     // localStorage.token = data.token;
                //     // // localStorage.userdata = JSON.parse(data.user);
                //     // window.location.replace(apiUrl + '/admin/dashboard');
                // }
            })
            .catch(function(error) {
                console.log('catch', error);
            });
    })
});
</script>
@endsection