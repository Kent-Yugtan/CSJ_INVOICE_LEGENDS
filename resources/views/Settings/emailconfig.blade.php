@extends('layouts.master')
@section('content-dashboard')
<div class="container-fluid pt-0">
    <h1 class="mt-0">Email Configuration</h1>
    <ol class="breadcrumb mb-3"></ol>
    <div class="row">
        <div class="col-md-6 px-2">
            <div class="card shadow p-2 mb-5 bg-white rounded" style="width: 100%; height:100%">
                <div class="card-header">Create Email</div>
                <div class="row px-4 pb-4" id="header">
                    <form name="emailstore" id="email_store" method="post" action="javascript:void(0)"
                        class="row g-3 needs-validation" novalidate>
                        @csrf
                        
                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">ID</label>
                            <input id="Identification" name="email" type="text" class="form-control" placeholder="ID"
                                required>
                        </div>
                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Full Name</label>
                            <input id="full_name" name="username" type="text" class="form-control" placeholder="Full Name"
                                required>
                        </div>
                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Email Address</label>
                            <input id="email_address" name="Email Address" type="text" class="form-control"
                                placeholder="Email Address" required>
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
                        </div>


                      
                        <div class="col mb-3">
                            <button type="submit"
                                style="width:100%; height:50px;color:white; background-color: #CF8029;" class="btn ">Save </button>
                        </div>

                        <div class="col mb-3">
                            <button type="button"
                                style="width:100%; height:50px;color:white; background-color: #A4A6B3;"
                                class="btn">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

            <div class="col-md-6 px-2">
            <div class="card shadow  bg-white rounded " style="width: 100%; ">
                <div class="card-body table-responsive ">
                    <table style="color: #A4A6B3;" class="table " id="table_email">
                        <thead>
                            <th>Identification</th>
                            <th>Full Name</th>
                            <th class=" text-center">Email Address</th>
                            <th class=" text-center">Position</th>
                            <th class=" text-center">Action</th>
                            

                        </thead>
                        <tbody>

                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                
                                <td  class="text-center"> <button value=' + item
                                    .id +
                                    ' class="editButton btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editModal" >Edit</button> </td>


                                </td>
                            </tr>

                        </tbody>
                    </table>
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
                        <h5> Update Email Configuration </h5>
                        <form id="email_update">
                            @csrf
                            <input type="text" id="email_id" hidden>

                            <div class="form-group mt-3">
                                <label for="formGroupExampleInput">Email Address</label>
                                <input id="edit_email_address" type="text" class="form-control"
                                    placeholder="Email Address">
                            </div>

                            <div class="form-group mt-3">
                                <label for="formGroupExampleInput">ID</label>
                                <input id="edit_identification" type="text" class="form-control"
                                    placeholder="ID">
                            </div>
                            
                            <div class="form-group mt-3">
                                <label for="formGroupExampleInput">Full Name</label>
                                <input id="edit_full_name" type="text" class="form-control" placeholder="Full Name">

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
<!-- <button type="button" class="btn btn-primary" id="showtoast">Show Toast</button> -->

<script type="text/javascript">
    $(document).ready(function() {
        show_data();
    
            $('#table_email tbody').empty();
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
                                tr += '<td style="width:40%;">' + item.Identification + '</td>';
                                tr += '<td style="width:5%;" class="text-end">' + item.full_name
                                    .toFixed(2) +
                                    '</td>';
                                tr +=
                                    '<td style="width:45%;" class="text-center"> <button value=' + item
                                    .id +
                                    ' class="editButton btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editModal" >Edit</button> </td>';
                                tr += '</tr>';
                                $("#table_email tbody").append(tr);
    
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
    
        $('#email_store').submit(function(e) {
            e.preventDefault();
    
            let Identification = $("#Identification").val();
            let full_name = $("full_name").val();
    
            let data = {
                Identification: Identification,
                full_name: full_name,
            };
    
            axios
                .post(apiUrl + "/api/saveemail", data, {
                    headers: {
                        Authorization: token,
                    },
                })
                .then(function(response) {
                    // console.log("then", response.data.success);
                    let data = response.data;
                    if (data.success) {
                        // console.log('success', data.data.message);
                        $('#Identification').val('');
                        $('#full_name').val('');
    
                        $('.toast1 .toast-title').html('Email');
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
                .get(apiUrl + '/api/settings/show_emailedit/' + id, {
                    headers: {
                        Authorization: token,
                    },
                })
                .then(function(response) {
                    let data = response.data;
                    console.log("SUCCESS", data.data);
                    if (data.success) {
    
                        $('#edit_Identification').val(data.data.Identification);
                        $('#edit_full_name').val(data.data.full_name);
    
                    } else {
                        console.log("ERROR");
                    }
    
                }).catch(function(error) {
                    console.log("ERROR", error);
                });
        })
    
        $('#email_update').submit(function(e) {
            e.preventDefault();
    
            let email_id = $('#email_id').val();
            let Identification = $("#edit_Identification").val();
            let Full Name = $("#edit_full_name").val();
    
            let data = {
                id: email_id,
                Identification: Identification,
                full_name: full_name,
            };
    
            axios
                .post(apiUrl + "/api/saveemail", data, {
                    headers: {
                        Authorization: token,
                    },
                })
                .then(function(response) {
                    // console.log("then", response.data.success);
                    let data = response.data;
                    if (data.success) {
    
                        $('#edit_Identification').val('');
                        $('#edit_full_name').val('');
    
                        $('.toast1 .toast-title').html('Email');
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
    </script>
@endsection