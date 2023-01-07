@extends('layouts.master')

@section('content-dashboard')

<div class="container-fluid pt-0">
    <h1 class="mt-0">View Profile</h1>
    <ol class="breadcrumb mb-3"></ol>

    <div class="row">
        <div class="col-md-6 px-2">
            <div class="card shadow p-2 mb-5 bg-white rounded" style="width: 100%; height:100%">
                <div class="card-header">Edit Information</div>
                <div class="row px-4 pb-4">

                    <form id="ProfileUpdate" method="POST" action="javascript:void(0)" class="row g-3 needs-validation"
                        novalidate>
                        @csrf

                        <input type="text" id="profile_id" hidden value="{{$profile_id}}">

                        <div class="col mb-3">
                            <div class="profile-pic-div" style="position: relative; height:200px">
                                <img src="/images/default.png" id="photo">
                                <input name="file" type="file" id="file">
                                <label for="file" id="uploadBtn">Choose Photo</label>
                            </div>
                        </div>

                        <div class="col pt-5">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="profile_status"
                                    name="profile_status" checked>
                                <label class="form-check-label" for="status">
                                    Active
                                </label>

                            </div>
                            <div class="mb-3">
                                <label mb-2 style="color: #A4A6B3;">Full Name</label>
                                <input id="full_name" name="full_name" type="text"
                                    class="form-control @error('full_name') is-invalid @enderror "
                                    placeholder="Full Name" required>

                            </div>
                        </div>


                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Position</label>
                            <select class="form-select @error('position') is-invalid @enderror" id="position"
                                name="position" aria-label="Default select example" defaultValue="select">
                                <option selected disabled>Please Select Position</option>
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



        <div class="col-md-6 px-1">
            <div class="row" style="height:100%">
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

                        <div class="col-md-4 w-100">
                            <div class="input-group">
                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Create Invoice</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <form>
                                                        <div class="col pt-3">
                                                            <div class="form-group">

                                                                <label for="formGroupExampleInput">Invoice #</label>
                                                                <input type="number" class="form-control"
                                                                    id="invoice_no" placeholder="">
                                                            </div>

                                                        </div>
                                                        <div class="col pt-3">
                                                            <div class="form-group">

                                                                <label for="formGroupExampleInput">Description</label>
                                                                <input type="number" class="form-control"
                                                                    id="description" placeholder="">
                                                            </div>

                                                        </div>

                                                        <div class="col pt-3">
                                                            <div class="form-group">

                                                                <label for="formGroupExampleInput">Item
                                                                    Description</label>
                                                                <input type="number" class="form-control"
                                                                    id="item_description" placeholder="">
                                                            </div>

                                                        </div>

                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label class="formGroupExampleInput2"
                                                                        for="form3Example1">Quantity</label>
                                                                    <input type="text" id="quantity"
                                                                        class="form-control" />

                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label class="formGroupExampleInput2"
                                                                        for="form3Example2">Rate</label>
                                                                    <input type="text" id="rate" class="form-control" />

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col pt-3">
                                                            <div class="form-group">

                                                                <label for="formGroupExampleInput">Peso Rate</label>
                                                                <input type="number" class="form-control" id="pesorate"
                                                                    placeholder="">
                                                            </div>
                                                            <div class=" row mb-4">
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label class="formGroupExampleInput2"
                                                                            for="form3Example1">Total Amount($)</label>
                                                                        <input type="text" id="total_amountdollar"
                                                                            class="form-control" />

                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label class="formGroupExampleInput2"
                                                                            for="form3Example2">Total Amount
                                                                            (PHP)</label>
                                                                        <input type="text" id="total_amountphp"
                                                                            class="form-control" />

                                                                    </div>
                                                                </div>


                                                                <!-- <button type="button" class="btn btn-primary" style=" color:white; background-color: #CF8029">Save changes</button> -->
                                                            </div>
                                                            <div class="row mb-4">
                                                                <div class="col">
                                                                    <button type="button"
                                                                        class="btn btn-secondary w-100"
                                                                        style=" color:#CF8029; background-color:white; "
                                                                        data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                                <div class="col">
                                                                    <button type="button"
                                                                        class="btn btn-secondary w-100"
                                                                        style=" color:#CF8029; background-color:white; "
                                                                        data-bs-dismiss="modal">Close</button>
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


                        <div class="form-group has-search">

                            <div class=" tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                    aria-labelledby="pills-home-tab">
                                    <div class="card-body table-responsive">
                                        <table style=" color: #A4A6B3;font-size: 14px;" class="table table-hover"
                                            id="datatablesSimple">
                                            <div class="col-md-4 w-100">
                                                <div class="input-group">
                                                    <button style="color:white; background-color: #CF8029;"
                                                        data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                        type="submit" id="button-addon2"
                                                        class="btn form-check-inline pe-3 "><i
                                                            class="fa fa-plus pe-1"></i>Create
                                                        Invoice</button>
                                                    <input type="text" aria-label="First name"
                                                        class="form-control form-check-inline">
                                                    <div class="form-group has-search">
                                                        <span class="fa fa-search form-control-feedback"></span>
                                                        <input type="text" class="form-control" placeholder="Search">
                                                    </div>
                                                </div>
                                            </div>
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
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                    aria-labelledby="pills-profile-tab">
                                    <div class="card-body table-responsive">
                                        <table style=" color: #A4A6B3;font-size: 14px;" class="table table-hover"
                                            id="datatablesSimple">
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
                                                        <input type="text" class="form-control" placeholder="Search">
                                                    </div>
                                                </div>
                                            </div>
                                            <thead>
                                                <tr>
                                                    <th>Deduction</th>
                                                    <th>Status</th>
                                                    <th>Date Created</th>
                                                    <th>Amount</th>
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
</div>



<div style="position: absolute; top: 20px; right: 20px;">

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
$(document).ready(function() {
    let profile_id = $('#profile_id').val();
    axios.get(apiUrl + '/api/admin/show_edit/' + profile_id, {
        headers: {
            Authorization: token,
        },
    }).then(function(response) {
        let data = response.data;
        console.log("THEN RESPONSE", data.data);
        if (data.success) {
            console.log("SUCCESS");
            $('#full_name').val(data.data.full_name);
            $('#position').val(data.data.position);
            $('#phone_number').val(data.data.phone_number);
            $('#address').val(data.data.address);
            $('#province').val(data.data.province);
            $('#city').val(data.data.city);
            $('#zip_code').val(data.data.zip_code);
            $('#acct_no').val(data.data.acct_no);
            $('#acct_name').val(data.data.acct_name);
            $('#bank_name').val(data.data.bank_name);
            $('#bank_location').val(data.data.bank_location);
            $('#gcash_no').val(data.data.gcash_no);
            $('#date_hired').val(data.data.date_hired);
            $("#photo").attr("src", data.data.file_path);

        } else {
            console.log("ERROR");
        }
    });
});
$(document).ready(function() {
    let toast1 = $('.toast1');
    toast1.toast({
        delay: 5000,
        animation: true
    });

    // $('#showtoast').on('click', function(e) {
    //     e.preventDefault();

    // })
    $('.close').on('click', function(e) {
        e.preventDefault();
        toast1.toast('hide');
    })

    $("#error_msg").hide();
    $("#success_msg").hide();

    $('#ProfileUpdate').submit(function(e) {
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
                    $("#full_name").val("");
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

                    $('.toast1 .toast-title').html('Profile');
                    $('.toast1 .toast-body').html(data.message);
                    toast1.toast('show');

                }
            }).catch(function(error) {
                // console.log('CATCH ERROR', error);
                // if (error.response.data.message) {
                //     $('#error_full_name').text(error.response.data.errors.full_name[0]);
                // }
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
                        $('.toast1 .toast-body').html(Object.values(errors)[0].join(
                            "\n\r"));
                    })

                    toast1.toast('show');
                }

            });
    })

});

function capitalize(s) {
    if (typeof s !== 'string') return "";
    return s.charAt(0).toUpperCase() + s.slice(1);
}
</script>

@endsection