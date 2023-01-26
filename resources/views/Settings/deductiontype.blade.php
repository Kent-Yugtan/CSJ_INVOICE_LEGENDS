@extends('layouts.master')
@section('content-dashboard')

<div class="container-fluid px-4 pb-4">
    <h1 class="mt-0">Deduction Types</h1>
    <ol class="breadcrumb mb-3"></ol>
    <div class="row mt-5">
        <div class="col-md-6 px-2">
            <button class="btn w-50" style="color:white; background-color: #CF8029; margin-top:5px "
                data-bs-toggle="modal" data-bs-target="#addModal" type="submit" id="button-addon2"> <i
                    class="fa fa-plus pe-1"></i> Add Deduction Type </></button>
            <div class="row mt-3">
                <div class="col">
                    <div class="w-100">
                        <input id="search" type="text" class="form-control form-check-inline" placeholder="Search">
                    </div>
                </div>
                <div class="col">
                    <button type="submit" class="btn w-100" style=" color:white; background-color: #CF8029;width:30%"
                        id="button-submit">Search</button>
                </div>
            </div>

            <div class="card shadow mt-3 bg-white rounded " style="width: 100%; ">
                <div class="card-body table-responsive ">
                    <table style="color: #A4A6B3;" class="table " id="table_deduction">
                        <thead>
                            <th>Deduction Name</th>
                            <th>Amount</th>
                            <th class=" text-center">Action</th>

                        </thead>
                        <tbody></tbody>
                    </table>
                    <div style="display: flex; justify-content: space-between;">
                        <div class="page_showing" id="tbl_showing"></div>
                        <ul class="pagination" id="tbl_pagination"></ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- START MODAL ADD -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-dialog">
            <div class="modal-content ">
                <div class="modal-body ">
                    <div class="row">
                        <h5> Create Deduction Type </h5>
                        <form id="deductiontype_store">
                            @csrf
                            <div class="form-group mt-3">
                                <label for="formGroupExampleInput">Deduction Name</label>
                                <input id="deduction_name" type="text" class="form-control"
                                    placeholder="Deduction Name">
                            </div>

                            <div class="form-group">
                                <label for="formGroupExampleInput">Amount</label>
                                <input id="deduction_amount" type="text" class="form-control" placeholder="Amount">

                                <div class="row mt-3">
                                    <div class="col">
                                        <button type="button" class="btn btn-secondary w-100"
                                            style=" color:#CF8029; background-color:white; "
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="btn btn-secondary w-100"
                                            style="color:White; background-color:#CF8029; "
                                            data-bs-dismiss="modal">Save</button>
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

<!-- START MODAL EDIT -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-dialog">
            <div class="modal-content ">
                <div class="modal-body ">
                    <div class="row">
                        <h5> Update Deduction Type </h5>
                        <form id="deductiontype_update">
                            @csrf
                            <input type="text" id="deduction_id" hidden>

                            <div class="form-group mt-3">
                                <label for="formGroupExampleInput">Deduction Name</label>
                                <input id="edit_deduction_name" type="text" class="form-control"
                                    placeholder="Deduction Name">
                            </div>

                            <div class="form-group">
                                <label for="formGroupExampleInput">Amount</label>
                                <input id="edit_deduction_amount" type="text" class="form-control" placeholder="Amount">

                                <div class="row mt-3">
                                    <div class="col">
                                        <button type="button" class="btn btn-secondary w-100"
                                            style=" color:#CF8029; background-color:white; "
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                    <div class="col">
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
<!-- END MODAL EDIT -->

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
    show_data();

    $('#button-submit').on('click', function() {
        let search = $('#search').val();
        show_data({
            search
        });
    })

    let toast1 = $('.toast1');
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

    function show_data(filters) {
        let filter = {
            page_size: 10,
            page: 1,
            ...filters,
        }
        $('#table_deduction tbody').empty();
        axios.get(`${apiUrl}/api/settings/show_data?${new URLSearchParams(filter)}`, {
                headers: {
                    Authorization: token,
                },
            })
            .then(function(res) {
                res = res.data;
                if (res.success) {
                    if (res.data.data.length > 0) {
                        res.data.data.map((item) => {
                            let tr = '<tr>';
                            tr += '<td style="width:40%;">' + item.deduction_name + '</td>';
                            tr += '<td style="width:5%;" class="text-end">' + item
                                .deduction_amount
                                .toFixed(2) +
                                '</td>';
                            tr +=
                                '<td style="width:45%;" class="text-center"> <button value=' +
                                item
                                .id +
                                ' class="editButton btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editModal" >Edit</button> </td>';
                            tr += '</tr>';
                            $("#table_deduction tbody").append(tr);

                            return ''
                        })

                        $('#tbl_pagination').empty();
                        res.data.links.map(item => {
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

                            let search = $('#search').val();
                            show_data({
                                search,
                                page: $.urlParam('page')
                            });
                        })

                        let tbl_user_showing =
                            `Showing ${res.data.from} to ${res.data.to} of ${res.data.total} entries`;
                        $('#tbl_showing').html(tbl_user_showing);
                    } else {
                        $("#tbl_user tbody").append(
                            '<tr><td colspan="6" class="text-center">No data</td></tr>');
                    }
                }
            })
            .catch(function(error) {
                console.log("catch error", error);
            });

    }

    $('#deductiontype_store').submit(function(e) {
        e.preventDefault();

        let deduction_name = $("#deduction_name").val();
        let deduction_amount = $("#deduction_amount").val();

        let data = {
            deduction_name: deduction_name,
            deduction_amount: deduction_amount,
        };

        axios
            .post(apiUrl + "/api/savedeductiontype", data, {
                headers: {
                    Authorization: token,
                },
            })
            .then(function(response) {
                // console.log("then", response.data.success);
                let data = response.data;
                if (data.success) {
                    // console.log('success', data.data.message);
                    $('#deduction_name').val('');
                    $('#deduction_amount').val('');

                    $('.toast1 .toast-title').html('Deduction Types');
                    $('.toast1 .toast-body').html(response.data.message);
                    toast1.toast('show');
                    show_data();
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
                        $('.toast1 .toast-body').html(Object.values(errors)[0].join(
                            "\n\r"));
                    })
                    toast1.toast('show');
                }
            });
    })

    $(document).on('click', '.editButton', function(e) {
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

                } else {
                    console.log("ERROR");
                }

            }).catch(function(error) {
                console.log("ERROR", error);
            });
    })

    $('#deductiontype_update').submit(function(e) {
        e.preventDefault();

        let deduction_id = $('#deduction_id').val();
        let deduction_name = $("#edit_deduction_name").val();
        let deduction_amount = $("#edit_deduction_amount").val();

        let data = {
            id: deduction_id,
            deduction_name: deduction_name,
            deduction_amount: deduction_amount,
        };

        axios
            .post(apiUrl + "/api/savedeductiontype", data, {
                headers: {
                    Authorization: token,
                },
            })
            .then(function(response) {
                // console.log("then", response.data.success);
                let data = response.data;
                if (data.success) {

                    $('#edit_deduction_name').val('');
                    $('#edit_deduction_amount').val('');

                    $('.toast1 .toast-title').html('Deduction Types');
                    $('.toast1 .toast-body').html(response.data.message);
                    toast1.toast('show');
                    show_data();
                    console.log('success', data.data);
                }
            })
            .catch(function(error) {
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