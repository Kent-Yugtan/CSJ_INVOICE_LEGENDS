@extends('layouts.master')
@section('content-dashboard')
<div class="container-fluid pt-0">
    <h1 class="mt-0">Invoice Configuration</h1>
    <ol class="breadcrumb mb-3"></ol>
    <div class="row">
        <div class="col-md-6 px-2" style="width: 35%;">
            <div class="card shadow p-2 mb-5 bg-white rounded" style="width: 100%; height:100%">
                <div class="card-header">Create Invoice Configuration</div>
                <div class="row px-4 pb-4" id="header">
                    <form name="invoiceconfigs_store" id="invoiceconfigs_store" method="post"
                        action="javascript:void(0)" class="row g-3 needs-validation" novalidate>
                        @csrf

                        <div class="mb-3">
                            <label style="color: #A4A6B3;" for="formFile" class="form-label">Invoice Logo</label>
                            <input class="form-control" id="invoice_logo" name="invoice_logo" type="file">
                        </div>


                        <div class=" mb-3">
                            <label mb-2 style="color: #A4A6B3;">Invoice Title</label>
                            <input id="invoice_title" name="email" type="text" class="form-control"
                                placeholder=" Title">
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Invoice Email</label>
                            <input id="invoice_email" name="username" type="text" class="form-control"
                                placeholder="Email">
                        </div>
                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Bill to Address</label>
                            <input id="bill_to_address" name="Email Address" type="text" class="form-control"
                                placeholder="From">
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Ship to Address</label>
                            <input id="ship_to_address" name="Email Address" type="text" class="form-control"
                                placeholder="To">
                        </div>

                        <div class="col mb-3">
                            <button type="button"
                                style="width:100%; height:50px;color:white; background-color: #A4A6B3;"
                                class="btn">Close</button>
                        </div>

                        <div class="col mb-3">
                            <button type="submit"
                                style="width:100%; height:50px;color:white; background-color: #CF8029;"
                                class="btn ">Save </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6 px-2" style="width: 65%;">
            <div class="card shadow  bg-white rounded " style="width: 100%; ">
                <div class="card-body table-responsive ">
                    <div class="row mt-3">
                        <div class="col">
                            <div class="w-100">
                                <input id="search" type="text" class="form-control form-check-inline"
                                    placeholder="Search">
                            </div>
                        </div>
                        <div class="col">
                            <button type="submit" class="btn w-100"
                                style="color:white; background-color: #CF8029;width:30%"
                                id="button_search">Search</button>
                        </div>
                    </div>
                    <div class="card-body table-responsive" id="tbl_invoiceConfig_wrapper">
                        <table style="color: #A4A6B3;" class="table table-hover" id="table_invoiceconfig">
                            <thead>
                                <th>Invoice Title</th>
                                <th>Invoice Email</th>
                                <th class=" text-center">From</th>
                                <th class=" text-center">To</th>
                                <th class=" text-center">Action</th>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                    </div>
                    <div style="display: flex; justify-content: space-between;">
                        <div class="page_showing" id="tbl_showing"></div>
                        <ul class="pagination" id="tbl_pagination"></ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-dialog">
                <div class="modal-content ">
                    <div class="modal-body ">
                        <div class="row">
                            <h5> Update Invoice Configuration </h5>
                            <form id="invoice_config_update">
                                @csrf
                                <input type="text" id="invoice_config_id" hidden>

                                <div class="mb-3">
                                    <label style="color: #A4A6B3;" for="formFile" class="form-label">Invoice
                                        Logo</label>
                                    <input class="form-control" id="edit_invoice_logo" name="edit_invoice_logo"
                                        type="file">
                                </div>


                                <div class="mb-3">
                                    <label style="color: #A4A6B3;" for="formFile" class="form-label">Invoice
                                        Path</label>
                                    <div id="edit_invoice_path"></div>
                                </div>


                                <div class="form-group mt-3">
                                    <label for="formGroupExampleInput">Invoice Title</label>
                                    <input id="edit_invoice_title" type="text" class="form-control" placeholder="Title">
                                </div>

                                <div class="form-group mt-3">
                                    <label for="formGroupExampleInput">Invoice Email</label>
                                    <input id="edit_invoice_email" type="text" class="form-control" placeholder="Email">
                                </div>

                                <div class="form-group mt-3">
                                    <label for="formGroupExampleInput">Bill to Address</label>
                                    <input id="edit_to_bill" type="text" class="form-control" placeholder="From">
                                </div>

                                <div class="form-group mt-3">
                                    <label for="formGroupExampleInput">Ship to address</label>
                                    <input id="edit_to_ship" type="text" class="form-control" placeholder="To">

                                    <div class="row mt-3">
                                        <div class="col mt-3">
                                            <button type="button" class="btn btn-secondary w-100"
                                                style=" color:#CF8029; background-color:white; "
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                        <div class="col mt-3">
                                            <button type="submit" class="btn btn-secondary w-100"
                                                style="color:White; background-color:#CF8029; "
                                                data-bs-dismiss="modal">Update</button>
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

    <script type="text/javascript">
    $(document).ready(function() {
        let toast1 = $('.toast1');
        show_data();
        $('#button_search').on('click', function() {
            let search = $('#search').val();
            show_data({
                search
            });
        })
        toast1.toast({
            delay: 5000,
            animation: true
        });

        $('.close').on('click', function(e) {
            e.preventDefault();
            toast1.toast('hide');
        })

        $("#error_msg").hide();
        $("#success_msg").hide();

        // CLICK TO UPDATE
        $('#invoice_config_update').on('submit', function(e) {
            e.preventDefault();

            let invoice_config_id = $('#invoice_config_id').val();
            let edit_invoice_title = $('#edit_invoice_title').val();
            let edit_invoice_email = $('#edit_invoice_email').val();
            let edit_bill_to_address = $('#edit_to_bill').val();
            let edit_ship_to_address = $('#edit_to_ship').val();

            let formData = new FormData();
            formData.append('id', invoice_config_id);
            formData.append('invoice_title', edit_invoice_title);
            formData.append('invoice_email', edit_invoice_email);
            formData.append('bill_to_address', edit_bill_to_address);
            formData.append('ship_to_address', edit_ship_to_address);

            if (document.getElementById('edit_invoice_logo').files.length > 0) {
                formData.append('edit_invoice_logo', document.getElementById('edit_invoice_logo').files[
                        0],
                    document.getElementById('edit_invoice_logo').files[0].name);
            } else {
                formData.append('invoice_logo', edit_invoice_path);
            }

            axios.post(apiUrl + '/api/saveInvoiceConfig', formData, {
                headers: {
                    Authorization: token,
                    // "Content-Type": "multipart/form-data",
                }
            }).then(function(response) {
                let data = response.data;
                if (data.success) {
                    console.log('success', data);
                    // $('#invoice_logo').val("");
                    // $('#invoice_title').val("");
                    // $('#invoice_email').val("");
                    // $("#bill_to_address").val("");
                    // $("#ship_to_address").val("");
                    show_data();
                    $('.toast1 .toast-title').html('Invoice Configuration');
                    $('.toast1 .toast-body').html(response.data.message);
                    toast1.toast('show');

                }

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
                        $('.toast1 .toast-body').html(Object.values(errors)[0].join(
                            "\n\r"));
                    })
                    toast1.toast('show');
                }
            });

        })

        // CLICK TO EDIT BUTTON
        $(document).on('click', '.editButton', function(e) {
            e.preventDefault();
            let id = $(this).val();
            $('#invoice_config_id').val(id);

            axios
                .get(apiUrl + '/api/invoice_config/show_edit/' + id, {
                    headers: {
                        Authorization: token,
                    },
                })
                .then(function(response) {
                    let data = response.data;
                    if (data.success) {
                        if (data.data.invoice_logo) {
                            // $('#edit_invoice_logo').val(url);
                            $('#edit_invoice_path').html(data.data.invoice_logo);
                        }

                        $('#edit_invoice_title').val(data.data.invoice_title);
                        $('#edit_invoice_email').val(data.data.invoice_email);
                        $('#edit_to_bill').val(data.data.bill_to_address);
                        $('#edit_to_ship').val(data.data.ship_to_address);

                    } else {
                        console.log("ERROR");
                    }
                }).catch(function(error) {
                    console.log("ERROR", error);
                });
        })

        // STORE DATA
        $('#invoiceconfigs_store').on('submit', function(e) {
            e.preventDefault();

            let invoice_title = $('#invoice_title').val();
            let invoice_email = $('#invoice_email').val();
            let bill_to_address = $('#bill_to_address').val();
            let ship_to_address = $('#ship_to_address').val();

            let formData = new FormData();
            formData.append('invoice_title', invoice_title);
            formData.append('invoice_email', invoice_email);
            formData.append('bill_to_address', bill_to_address);
            formData.append('ship_to_address', ship_to_address);

            if (document.getElementById('invoice_logo').files.length > 0) {
                formData.append('invoice_logo', document.getElementById('invoice_logo').files[0],
                    document.getElementById('invoice_logo').files[0].name);
            }

            axios.post(apiUrl + '/api/saveInvoiceConfig', formData, {
                headers: {
                    Authorization: token,
                    // "Content-Type": "multipart/form-data",

                }
            }).then(function(response) {
                let data = response.data;
                if (data.success) {
                    console.log('success', data);
                    $('#invoice_logo').val("");
                    $('#invoice_title').val("");
                    $('#invoice_email').val("");
                    $("#bill_to_address").val("");
                    $("#ship_to_address").val("");
                    show_data();
                    $('.toast1 .toast-title').html('Invoice Configuration');
                    $('.toast1 .toast-body').html(response.data.message);
                    toast1.toast('show');

                }

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
                        $('.toast1 .toast-body').html(Object.values(errors)[0].join(
                            "\n\r"));
                    })
                    toast1.toast('show');
                }
            });

        })


        function show_data(filters) {
            let filter = {
                page_size: 10,
                page: 1,
                ...filters,
            }

            $('#table_invoiceconfig tbody').empty();
            axios.get(`${apiUrl}/api/show_invoiceConfig_data?${new URLSearchParams(filter)}`, {
                headers: {
                    Authorization: token
                },
            }).then(function(response) {
                let data = response.data
                if (data.success) {
                    if (data.data.data.length > 0) {
                        $('#table_invoiceconfig tbody').empty();
                        data.data.data.map((item) => {
                            let tr = '<tr style="vertical-align:sub;">';

                            tr += '<td>' + item.invoice_title + '</td>';
                            tr += '<td>' + item.invoice_email + '</td>';
                            tr += '<td>' + item.bill_to_address + '</td>';
                            tr += '<td>' + item.ship_to_address + '</td>';
                            tr +=
                                '<td class="text-center"> <button value=' + item.id +
                                ' class="editButton btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editModal" >Edit</button> </td>';

                            tr += '</tr>';

                            $('#table_invoiceconfig tbody').append(tr);
                            return '';
                        })
                        $('#tbl_pagination').empty();
                        data.data.links.map(item => {
                            let li =
                                `<li class="page-item cursor-pointer ${item.active ? 'active':''}"><a class="page-link" data-url="${item.url}">${item.label}</a></li>`
                            $('#tbl_pagination').append(li)
                            return ""

                        })

                        $("#tbl_pagination .page-item .page-link").on('click', function() {
                            let url = $(this).data('url')
                            $.urlParam = function(name) {
                                var results = new RegExp("[?&]" + name + "=([^&#]*)").exec(
                                    url
                                );
                                return results !== null ? results[1] || 0 : false;
                            };

                            // let search = $('#search').val();
                            // show_data({
                            //     search,
                            //     page: $.urlParam('page')
                            // });
                        })

                        let table_invoieConfig =
                            `Showing ${data.data.from} to ${data.data.to} of ${data.data.total} entries`;
                        $('#tbl_showing').html(table_invoieConfig);

                    } else {
                        $("#table_invoiceconfig tbody").append(
                            '<tr><td colspan="5" class="text-center">No data</td></tr>');
                    }


                }
            }).catch(function(error) {
                console.log("catch error");
            });


        }

        function capitalize(s) {
            if (typeof s !== 'string') return "";
            return s.charAt(0).toUpperCase() + s.slice(1);
        }


    })
    </script>
    @endsection