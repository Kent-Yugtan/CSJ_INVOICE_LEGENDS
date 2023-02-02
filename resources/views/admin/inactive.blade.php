@extends('layouts.master')
@section('content-dashboard')
@inject('invoice', 'App\Http\Controllers\Admin\InvoiceController')
<div class="container-fluid px-4">
    <h1 class="mt-4">Inactive Profiles</h1>
    <ol class="breadcrumb mb-4"></ol>

    <div class="row">
        <div class="col">
            <div class="card-hover card shadow p-2 mb-4 bg-white rounded" style="width: 100%;">
                <div>
                    <div class="row text-center py-3">
                        <Label class="fs-3">
                            {{$invoice->count_paid() ? $invoice->count_paid() : 0 ;}}
                        </Label>
                    </div>
                    <div class="card-body text-center py-1" style="border-bottom: none; color: #A4A6B3;">Paid</div>
                </div>
                <div class="d-flex align-items-center justify-content-between"></div>
            </div>
        </div>
        <div class="col">
            <div class="card-hover card shadow p-2 mb-4 bg-white rounded" style="width: 100%;">
                <div>
                    <div class="row text-center py-3">
                        <Label class="fs-3">
                            {{$invoice->count_pending() ? $invoice->count_pending() : 0;}}
                        </Label>
                    </div>
                    <div class="card-body text-center py-1" style="border-bottom: none;color: #A4A6B3; ">Pending</div>
                </div>
                <div class="d-flex align-items-center justify-content-between"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col ">
            <div class="input-group ">
                <input id="search" name="search" type="text" class="form-control form-check-inline"
                    placeholder="Search">
                <button class="btn" style=" color:white; background-color: #CF8029;width:30%"
                    id="button-submit">Search</button>
            </div>
            </form>
        </div>
    </div>

    <div class="row pt-3">
        <div class="col">
            <div class="card mb-5">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Inactive Profile
                </div>
                <div id="tbl_user_wrapper" class="card-body table-responsive">
                    <table style=" color: #A4A6B3; " class="table table-hover" id="tbl_user">
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

<script type="text/javascript">
$(document).ready(function() {

    show_data();

    $('#button-submit').on('click', function() {
        let search = $('#search').val();
        show_data({
            search
        });
    })

    function show_data(filters) {
        let filter = {
            page_size: 50,
            page: 1,
            ...filters,
        }

        $('#tbl_user tbody').empty();

        axios
            .get(`${apiUrl}/api/admin/current_show_data_inactive?${new URLSearchParams(filter)}`, {
                headers: {
                    Authorization: token,
                },
            })
            .then(function(res) {
                res = res.data;
                console.log('res', res);
                if (res.success) {
                    if (res.data.data.length > 0) {
                        res.data.data.map((item) => {
                            let tr = '<tr>';

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
                            tr += '<td>' + item.phone_number + '</td>';
                            tr += '<td>' + item.position + '</td>';
                            tr += '<td> NOT YET </td>';
                            tr +=
                                '<td  class="text-center"> <a href="' + apiUrl +
                                '/admin/editProfile/' +
                                item.id + ' " class="btn btn-outline-primary">Edit</a> </td>';
                            tr += '</tr>';
                            $("#tbl_user tbody").append(tr);

                            return ''
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