@extends('layouts.master')
@section('content-dashboard')

<div class="container-fluid pt-0">
    <h1 class="mt-0">View Invoice</h1>
    <ol class="breadcrumb mb-3"></ol>
    <div class="row">
        <div class="col-md-6 px-2 w-75">
            <div class="card shadow p-2 mb-5 bg-white rounded" style="width: 100%; height:100%">
                <div class="my-3 mx-3">
                    <h3> Edit Invoice </h3>
                </div>
                <div class="row px-4 pb-4" id="header">
                    <div class="col mb-3">
                        <div class="form-group w-50">
                            <label class=" formGroupExampleInput2">Invoice #</label>
                            <input id="invoice_#" name="email" type="email" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mb-3">
                            <div class=" form-group">
                                <label class=" formGroupExampleInput2">Description</label>
                                <input id="description" name="email" type="email" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mb-3">
                            <div class="form-group">
                                <label class="formGroupExampleInput2">Item Desctiption</label>
                                <input type="text" id="item_descrption" class="form-control" />
                            </div>
                        </div>
                        <div class="col mb-3">
                            <div class="form-group">
                                <label class="formGroupExampleInput2">Quantity</label>
                                <input type="text" id="quantity" class="form-control" />
                            </div>
                        </div>
                        <div class="col mb-3">
                            <div class="form-group">
                                <label class="formGroupExampleInput2" for="form3Example2">Rate</label>
                                <input type="text" id="rate" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3" style="justify-content:end;display:flex">
                            <button class="btn" style="color:white; background-color: #CF8029;" id="add_item">Add
                                Item </button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mb-3" style="justify-content:end;display:flex">
                            <!-- border-style:none -->
                            <label>Subtotal: <label>
                                    <input type="text" id="rate" class="form-control no-outline">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mb-3">
                            <div class="form-group">
                                <label class="formGroupExampleInput2">Dollar Amount ($)</label>
                                <input type="text" id="dollar_amount" class="form-control" />
                            </div>
                        </div>
                        <div class="col mb-3">
                            <div class="form-group">
                                <label class="formGroupExampleInput2">Peso Rate (Php)</label>
                                <input type="text" id="peso_rate" class="form-control" />
                            </div>
                        </div>
                        <div class="col mb-3">
                            <div class="form-group">
                                <label class="formGroupExampleInput2" for="form3Example2">Converted Amount</label>
                                <input type="text" id="converted_amount" class="form-control" />
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col mb-3">
                            <h3> DEDUCTIONS </h3>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8 mb-3">
                            <div class="form-group w-100">
                                <label class="formGroupExampleInput2">Deduction Type</label>
                                <input type="text" id="deduction_type" class="form-control" />
                            </div>
                        </div>
                        <div class="col-4 mb-3">
                            <div class="form-group ">
                                <label class="formGroupExampleInput2">Deduction Amount</label>
                                <input type="text" id="deduction_amount" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8 mb-3">
                            <div class="form-group w-100">
                                <label class="formGroupExampleInput2">Deduction Type</label>
                                <input type="text" id="deduction_type" class="form-control" />
                            </div>
                        </div>
                        <div class="col-4 mb-3">
                            <div class="form-group ">
                                <label class="formGroupExampleInput2">Deduction Amount</label>
                                <input type="text" id="deduction_amount" class="form-control" />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8 mb-3">
                            <div class="form-group w-100">
                                <label class="formGroupExampleInput2">Deduction Type</label>
                                <input type="text" id="deduction_type" class="form-control" />
                            </div>
                        </div>
                        <div class="col-4 mb-3">
                            <div class="form-group mb-2">
                                <label class="formGroupExampleInput2">Deduction Amount</label>
                                <input type="text" id="deduction_amount" class="form-control" />

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8"></div>
                        <div class="col-4 text-center mb-3">
                            <h4> Grand Total </h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mb-3" style="justify-content:end;display:flex">
                            <!-- border-style:none -->
                            <label>Total: <label>
                                    <input type="text" id="rate" class="form-control no-outline">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 px-2 w-25">
            <div class="card shadow p-2 mb-5 bg-white rounded " style="width: 100%; height:25%">
                <!-- <div class="card-header">Profile Information</div> -->
                <div class="row mt-3">
                    <div class="col g-5">
                        <div class="pb-3">
                            <button type="button" class="btn btn-secondary w-100"
                                style=" color:White; background-color:#CF8029; " data-bs-dismiss="modal">Save</button>

                        </div>
                        <div>
                            <button type="button" class="btn btn-secondary w-100"
                                style=" color:#CF8029; background-color:white; " data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection