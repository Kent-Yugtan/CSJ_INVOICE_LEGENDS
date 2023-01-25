@extends('layouts.master')
@section('content-dashboard')
<div class="container-fluid pt-0">
    <h1 class="mt-0">Invoice Configuration</h1>
    <ol class="breadcrumb mb-3"></ol>
    <div class="row">
        <div class="col-md-6 px-2">
            <div class="card shadow p-2 mb-5 bg-white rounded" style="width: 100%; height:100%">
                <div class="card-header">Create Invoice Configuration</div>
                <div class="row px-4 pb-4" id="header">
                    <form name="emailstore" id="email_store" method="post" action="javascript:void(0)"
                        class="row g-3 needs-validation" novalidate>
                        @csrf
                        
                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Invoice Title</label>
                            <input id="invoice_title" name="email" type="text" class="form-control" placeholder=" Title"
                                required>
                        </div>
                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Invoice Email</label>
                            <input id="invoice_email" name="username" type="text" class="form-control" placeholder="Email"
                                required>
                        </div>
                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Bill to Address</label>
                            <input id="bill_address" name="Email Address" type="text" class="form-control"
                                placeholder="From" required>
                        </div>

                        <div class="mb-3">
                            <label mb-2 style="color: #A4A6B3;">Ship to Address</label>
                            <input id="ship_address" name="Email Address" type="text" class="form-control"
                                placeholder="To" required>
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
                            <th>Invoice Title</th>
                            <th>Invoice Email</th>
                            <th class=" text-center">From</th>
                            <th class=" text-center">To</th>
                            <th class=" text-center">Position</th>
                            <th class=" text-center">Action</th>
                            

                        </thead>
                        <tbody>

                            <tr>
                                <td></td>
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
                        <h5> Update Invoice Configuration </h5>
                        <form id="email_update">
                            @csrf
                            <input type="text" id="email_id" hidden>

                            <div class="form-group mt-3">
                                <label for="formGroupExampleInput">Invoice Title</label>
                                <input id="edit_invoice_title" type="text" class="form-control"
                                    placeholder="Title">
                            </div>

                            <div class="form-group mt-3">
                                <label for="formGroupExampleInput">Invoice Email</label>
                                <input id="edit_invoice_email" type="text" class="form-control"
                                    placeholder="Email">
                            </div>

                            <div class="form-group mt-3">
                                <label for="formGroupExampleInput">Bill to Address</label>
                                <input id="edit_to_bill" type="text" class="form-control"
                                    placeholder="From">
                            </div>
                            
                            <div class="form-group mt-3">
                                <label for="formGroupExampleInput">Ship to address</label>
                                <input id="edit_to_ship" type="text" class="form-control" placeholder="To">

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

@endsection