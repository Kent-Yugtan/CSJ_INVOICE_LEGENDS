@extends('layouts.master')
@section('content-dashboard')
<div class="container-fluid px-4" id="loader_load">
    <h1 class="mt-4">Active Profiles</h1>
    <ol class="breadcrumb mb-4"></ol>

    <div class="row">
        <div class="col-12 col-md-6">
            <div class="card-hover card shadow p-2 mb-4 bg-white rounded">
                <div>
                    <div class="row text-center py-3">
                        <Label class="fs-1" id="paid_invoices">
                        </Label>
                    </div>
                    <div class="card-body text-center py-1" style="border-bottom: none; color: #A4A6B3;">Paid Invoices
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between"></div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="card-hover card shadow p-2 mb-4 bg-white rounded">
                <div>
                    <div class="row text-center py-3">
                        <Label class="fs-1" id="pending_invoices">
                        </Label>
                    </div>
                    <div class="card-body text-center py-1" style="border-bottom: none;color: #A4A6B3; ">Pending Invoices</div>
                </div>
                <div class="d-flex align-items-center justify-content-between"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="input-group has-search">
            <div class="col-4">
                <div class="form-group form-check-inline has-search" style="width:90%">
                    <span class=" fa fa-search form-control-feedback"></span>
                    <input id="search" name="search" type="text" class="form-control form-check-inline" placeholder="Search">
                </div>
            </div>

            <div class="col-4">
                <div class="form-group form-check-inline has-search" style="width:90%">
                    <select class="form-select form-check-inline" id="filter">
                        <option value="All">All</option>
                        <option value="Asc">Ascending</option>
                        <option value="Desc">Descending</option>
                    </select>
                </div>
            </div>

            <div class="col-4">
                <button type="button" class="btn w-100" style="color:white; background-color: #CF8029;width:30%" id="button-submit">Search</button>
            </div>
        </div>

    </div>
    </form>

    <div class="row pt-3">
        <div class="col-12">
            <div class="card mb-5">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Current Profile
                </div>
                <div id="tbl_user_wrapper" class="card-body table-responsive">
                    <table style="color:#A4A6B3;" class="table table-hover" id="tbl_user">
                        <style>
                            .table-responsive {
                                overflow-x: auto;
                                overflow-y: hidden;
                            }
                        </style>
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Status</th>
                                <th>Phone Number</th>
                                <th>Position</th>
                                <th>Latest Invoice</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>

                    <div style="display: flex; justify-content: space-between;">
                        <div class="page_showing" id="tbl_user_showing"></div>
                        <ul class="pagination" id="tbl_user_pagination"></ul>
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
<script type="text/javascript">
    $(document).ready(function() {

        $(window).on('load', function() {
            $("div.spanner").addClass("show");
            setTimeout(function() {
                $("div.spanner").removeClass("show");
                active_count_paid();
                active_count_pending()
                show_data();
            }, 2000)
        })


        function active_count_paid() {
            axios.get(apiUrl + '/api/active_paid_invoice_count', {
                headers: {
                    Authorization: token,
                },
            }).then(function(response) {
                let data = response.data
                if (data.success) {
                    // console.log("SUCCESS", data.data.length ? data.data.length : 0);
                    $('#paid_invoices').html(data.data.length ? data.data.length : 0);
                }
            }).catch(function(error) {
                console.log("ERROR", error);
            })
        }

        function active_count_pending() {
            axios.get(apiUrl + '/api/active_pending_invoice_count', {
                headers: {
                    Authorization: token,
                },
            }).then(function(response) {
                let data = response.data
                if (data.success) {
                    $('#pending_invoices').html(data.data.length ? data.data.length : 0);
                }
            }).catch(function(error) {
                console.log("ERROR", error);
            })
        }

        $(document).on('click', '#button-submit', function(e) {
            e.preventDefault();

            document.getElementById("loader_load").scrollIntoView({
                behavior: "smooth"
            })
            $("div.spanner").addClass("show");
            setTimeout(function() {
                $("div.spanner").removeClass("show");
                let search = $('#search').val();
                $('#tbl_user tbody').empty();
                show_data({
                    search
                });
            }, 2000)

        })

        // FUNCTIOIN FOR DATE DIFFERENCE
        function datediff(first, second) {
            return Math.round((second - first) / (1000 * 60 * 60 * 24));
        }

        // FUNCTIOIN FOR DATE DIFFERENCE
        function parseDate(str) {
            var mdy = str.split('/');
            return new Date(mdy[2], mdy[0] - 1, mdy[1]);
        }

        function show_data(filters) {
            let filter = {
                page_size: 10,
                page: 1,
                ...filters,
            }
            axios
                .get(`${apiUrl}/api/admin/show_data_active?${new URLSearchParams(filter)}`, {
                    headers: {
                        Authorization: token,
                    },
                })
                .then(function(res) {
                    res = res.data;
                    console.log('res123', res);
                    if (res.success) {
                        if (res.data.data.length > 0) {
                            $('#tbl_user tbody').empty();
                            res.data.data.map((item) => {
                                let tr = '<tr style="vertical-align:sub;">';
                                if (item.file_path) {
                                    tr +=
                                        '<td>  <img style="width:40px;" class="rounded-pill" src ="' +
                                        item
                                        .file_path + '"> ' + item.full_name + ' </td>';
                                } else {
                                    tr +=
                                        '<td>  <img style="width:40px;" class="rounded-pill" src ="/images/default.png"> ' +
                                        item.full_name + ' </td>';
                                }

                                tr += '<td>' + item.profile_status + '</td>';
                                tr += '<td>' + item
                                    .phone_number + '</td>';
                                tr += '<td>' + item.position + '</td>';

                                if (item.profile.invoice.length > 0) {
                                    let latest_invoice = item.profile.invoice[item.profile.invoice
                                        .length - 1]
                                    var date_1 = new Date(latest_invoice.created_at);
                                    var todate1 = new Date(date_1).getDate();
                                    var tomonth1 = new Date(date_1).getMonth() + 1;
                                    var toyear1 = new Date(date_1).getFullYear();
                                    var from = tomonth1 + '/' + todate1 + '/' + toyear1;

                                    var date_2 = new Date();
                                    var todate2 = new Date(date_2).getDate();
                                    var tomonth2 = new Date(date_2).getMonth() + 1;
                                    var toyear2 = new Date(date_2).getFullYear();
                                    var to = tomonth2 + '/' + todate2 + '/' + toyear2;

                                    var diff = date_2 - date_1;
                                    diff = diff / (1000 * 3600 * 24);
                                    // console.log("DIFF", Math.round(diff));
                                    tr += '<td>' + Math.round(diff ? diff : 0) +
                                        ' Days ago</td>';

                                    tr +=
                                        '<td  class="text-center"> <a href="' + apiUrl +
                                        '/admin/activeProfile/' +
                                        item.id + "/" + item.profile.id +
                                        '" class="btn btn-outline-primary">View</a> </td>';

                                    tr += '</tr>';
                                    $("#tbl_user tbody").append(tr);
                                    return ''

                                } else {
                                    let tr = '<tr style="vertical-align:sub;">';
                                    if (item.file_path) {
                                        tr +=
                                            '<td>  <img style="width:40px;" class="rounded-pill" src ="' +
                                            item
                                            .file_path + '"> ' + item.full_name + ' </td>';
                                    } else {
                                        tr +=
                                            '<td>  <img style="width:40px;" class="rounded-pill" src ="/images/default.png"> ' +
                                            item.full_name + ' </td>';
                                    }

                                    tr += '<td>' + item.profile_status + '</td>';
                                    tr += '<td>' + item
                                        .phone_number + '</td>';
                                    tr += '<td>' + item.position + '</td>';
                                    tr += '<td> No Latest Invoice</td>';

                                    tr +=
                                        '<td  class="text-center"> <a href="' + apiUrl +
                                        '/admin/activeProfile/' +
                                        item.id + "/" + item.profile.id +
                                        '" class="btn btn-outline-primary">View</a> </td>';

                                    tr += '</tr>';
                                    $("#tbl_user tbody").append(tr);
                                    return ''
                                }
                            })

                            $('#tbl_user_pagination').empty();
                            res.data.links.map(item => {
                                let li =
                                    `<li class="page-item cursor-pointer ${item.active ? 'active':''}"><a class="page-link" data-url="${item.url}">${item.label}</a></li>`
                                $('#tbl_user_pagination').append(li)
                                return ""
                            })

                            $("#tbl_user_pagination .page-item .page-link").on('click', function() {
                                let url = $(this).data('url')
                                $.urlParam = function(name) {
                                    var results = new RegExp("[?&]" + name + "=([^&#]*)")
                                        .exec(
                                            url
                                        );

                                    return results !== null ? results[1] || 0 : false;
                                };
                            })
                            let tbl_user_showing =
                                `Showing ${res.data.from} to ${res.data.to} of ${res.data.total} entries`;
                            $('#tbl_user_showing').html(tbl_user_showing);
                        } else {
                            $("#tbl_user tbody").append(
                                '<tr><td colspan="6" class="text-center">No data</td></tr>');
                        }
                    }
                })
                .catch(function(error) {
                    // console.log("catch error");
                });
        }

    });
</script>
@endsection