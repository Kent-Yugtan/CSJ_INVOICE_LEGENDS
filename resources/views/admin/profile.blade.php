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


                    <form id="ProfileStore" class="row g-3 needs-validation" novalidate>
                        <div class="col mb-3">
                            <div class="profile-pic-div" style="position: relative; height:200px">
                                <img src="" id="photo">
                                <input name="file" type="file" id="file">
                                <label for="file" id="uploadBtn">Choose Photo</label>
                            </div>
                        </div>

                        <div class="col pt-5">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="profile_status" name="profile_status" checked>
                                <label class="form-check-label" for="status">
                                    Active
                                </label>
                                <!-- @error('profile_status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $messages }}</strong>
                                </span>
                                @enderror -->
                            </div>
                            <div class="mb-3">
                                <label mb-2 style="color: #A4A6B3;">Full Name</label>
                                <input id="full_name" name="full_name" type="text" class="form-control @error('full_name') is-invalid @enderror " placeholder="Full Name">
                                <span id="error_full_name" class="text-danger"></span>
                            </div>
                        </div>
                        @csrf

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Position</label>
                            <select class="form-select @error('position') is-invalid @enderror" id="position" name="position" aria-label="Default select example" defaultValue="select">
                                <option selected disabled>Please Select Position</option>
                                <option value="Lead Developer">Lead Developer</option>
                                <option value="Senior Developer">Senior Developer</option>
                                <option value="Junior Developer">Junior Developer</option>
                                <option value="Web Designer">Web Designer</option>
                                <option value="Tester">Tester</option>
                            </select>
                            <!-- <input name="position" type="text" class="form-control" id="formGroupExampleInput"
                                placeholder="Position"> -->
                            <span id="error_position" class="text-danger"></span>
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Phone Number</label>
                            <input id="phone_number" name="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" placeholder="Phone Number">
                            <span id="error_phone_number" class="text-danger"></span>
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Address</label>
                            <input name="address" id="address" type="text" class="form-control @error('address') is-invalid @enderror" placeholder="Address">
                            <span id="error_address" class="text-danger"></span>
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Province</label>
                            <input name="province" id="province" type="text" class="form-control @error('province') is-invalid @enderror" placeholder="Province">
                            <span id="error_province" class="text-danger"></span>
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">City</label>
                            <input id="city" name="city" type="text" class="form-control @error('city') is-invalid @enderror" placeholder="City">
                            <span id="error_city" class="text-danger"></span>
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Zip Code</label>
                            <input id="zip_code" name="zip_code" type="text" class="form-control @error('zip_code') is-invalid @enderror" placeholder="Zip Code">
                            <span id="error_zip_code" class="text-danger"></span>
                        </div>

                        <!-- <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Profile Status</label>
                            <select class="form-select @error('profile_status') is-invalid @enderror"
                                name="profile_status" id="profile_status" aria-label="Default select example">
                                <option selected disabled value="">Please Select Profile Status</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                         
                            @error('profile_status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div> -->

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Account Number</label>
                            <input name="acct_no" id="acct_no" type="text" class="form-control @error('acct_no') is-invalid @enderror" placeholder="Account Number">
                            <span id="error_acct_no" class="text-danger"></span>
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Account Name</label>
                            <input name="acct_name" id="acct_name" type="text" class="form-control @error('acct_name') is-invalid @enderror" placeholder="Account Name">
                            <span id="error_acct_name" class="text-danger"></span>
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Bank Name</label>
                            <select class="form-select @error('bank_name') is-invalid @enderror" id="bank_name" name="bank_name" aria-label="Default select example">
                                <option selected disabled>Please Select Bank Name</option>
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
                            <span id="error_bank_name" class="text-danger"></span>
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Bank Location</label>
                            <input id="bank_location" name="bank_location" type="text" class="form-control @error('bank_location') is-invalid @enderror" placeholder="Bank Address">
                            <span id="error_bank_location" class="text-danger"></span>
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Gcash Number</label>
                            <input name="gcash_no" type="text" class="form-control @error('gcash_no') is-invalid @enderror" id="gcash_no" placeholder="Gcash Number">
                            <span id="error_gcash_no" class="text-danger"></span>
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Date Hired</label>
                            <input name="date_hired" type="date" class="form-control @error('date_hired') is-invalid @enderror" id="date_hired" placeholder="Date Hired">
                            <span id="error_date_hired" class="text-danger"></span>
                        </div>

                        <div class="col mb-3">
                            <button type="submit" style="width:100%; height:50px;color:white; background-color: #CF8029;" class="btn ">Add
                                Profile</button>
                        </div>

                        <div class="col mb-3">
                            <button type="submit" style="width:100%; height:50px;color:white; background-color: #A4A6B3;" class="btn">Change Password</button>
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
        $("#success_msg").hide();

        $('#ProfileStore').submit(function(e) {
            e.preventDefault();

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
            if (document.getElementById('profile_status').checked == true) {
                formData.append('profile_status', 'Active');
            } else {
                formData.append('profile_status', 'Inactive');
            }
            formData.append('acct_no', acct_no);
            formData.append('acct_name', acct_name);
            formData.append('bank_name', bank_name);
            formData.append('bank_location', bank_location);
            formData.append('gcash_no', gcash_no);
            formData.append('date_hired', date_hired);

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

                    if (response.data.success == true) {
                        $('#header').append(this).html(
                            "<div class='alert alert-success text-center mt-3'>" + data
                            .message +
                            "</div>").show();
                        localStorage.token = data.token;
                        // localStorage.userdata = JSON.parse(data.user);
                        // window.location.replace(apiUrl + '/admin/profile');
                    }
                }).catch(function(error) {
                    if (error) {
                        if (error.response.data.errors.full_name) {
                            $('#error_full_name').text(error.response.data.errors.full_name[0]);
                        }
                        if (error.response.data.errors.position) {
                            $('#error_position').text(error.response.data.errors.position[0]);
                        }
                        if (error.response.data.errors.phone_number) {
                            $('#error_phone_number').text(error.response.data.errors.phone_number[0]);
                        }
                        if (error.response.data.errors.address) {
                            $('#error_address').text(error.response.data.errors.address[0]);
                        }
                        if (error.response.data.errors.province) {
                            $('#error_province').text(error.response.data.errors.province[0]);
                        }
                        if (error.response.data.errors.city) {
                            $('#error_city').text(error.response.data.errors.city[0]);
                        }
                        if (error.response.data.errors.zip_code) {
                            $('#error_zip_code').text(error.response.data.errors.zip_code[0]);
                        }
                        if (error.response.data.errors.acct_no) {
                            $('#error_acct_no').text(error.response.data.errors.acct_no[0]);
                        }
                        if (error.response.data.errors.acct_name) {
                            $('#error_acct_name').text(error.response.data.errors.acct_name[0]);
                        }
                        if (error.response.data.errors.bank_name) {
                            $('#error_bank_name').text(error.response.data.errors.bank_name[0]);
                        }
                        if (error.response.data.errors.bank_location) {
                            $('#error_bank_location').text(error.response.data.errors.bank_location[0]);
                        }
                        if (error.response.data.errors.gcash_no) {
                            $('#error_gcash_no').text(error.response.data.errors.gcash_no[0]);
                        }
                        if (error.response.data.errors.date_hired) {
                            $('#error_date_hired').text(error.response.data.errors.date_hired[0]);
                        }
                    }
                });
            // .catch(function(error) {
            //     let error_data = error.data;
            //     console.log('CATCH ERROR', error_data);

            // });
        })

    });
</script>

<script>

</script>

@endsection