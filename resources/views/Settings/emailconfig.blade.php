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
                    <form id="emailconfig_store" class="row g-3 needs-validation" novalidate>
                        @csrf
                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Full Name</label>
                            <input id="full_name" name="username" type="text" class="form-control"
                                placeholder="Full Name" required>
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
                                style="width:100%; height:50px;color:white; background-color: #CF8029;"
                                class="btn ">Save </button>
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

                                <td class="text-center"> <button value=' + item
                                    .id +
                                    ' class="editButton btn btn-outline-primary" data-bs-toggle="modal"
                                        data-bs-target="#editModal">Edit</button> </td>


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
                                    <input id="edit_identification" type="text" class="form-control" placeholder="ID">
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
        get_names();

        function get_names() {
            axios
                .get(apiUrl + '/api/get_name', {
                    headers: {
                        Authorization: token,
                    },
                }).then(function(response) {
                    let data = response.data;
                    console.log("SUCCESS", data);

                }).catch(function(error) {
                    console.log("ERROR", error);
                });
        }

    });


    function capitalize(s) {
        if (typeof s !== 'string') return "";
        return s.charAt(0).toUpperCase() + s.slice(1);
    }
    </script>
    @endsection