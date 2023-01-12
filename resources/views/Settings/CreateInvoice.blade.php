@extends('layouts.master')
@section('content-dashboard')
<div class="container-fluid px-4">
    <ol class="breadcrumb mb-4"></ol>
    <div class="row">
        <div class="col">

            <div>
                <button class="btn" style=" color:white; background-color: #CF8029;width:30%" data-bs-toggle="modal" data-bs-target="#exampleModal" type="submit" id="button-addon2"> <i class="fa fa-plus pe-1"></i> Add Deduction Type </></button>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 " id="exampleModalLabel"> Create Deduction Type</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="row me-3 ms-3">
                                        <form>
                                            <div class="col pt-3">
                                                <div class="form-group pt-1">

                                                    <label for="formGroupExampleInput">Deduction Name</label>
                                                    <input type="text" class="form-control " id="deduction_name" placeholder="">
                                                </div>
                                                <div class=" form-group pt-4 mb-5">

                                                    <label for="formGroupExampleInput">Amount</label>
                                                    <input type="number" class="form-control " id="amount" placeholder="">
                                                </div>

                                            </div>
                                            <div class="row mb-4">
                                                <div class="col">
                                                    <button type="button" class="btn btn-secondary w-100" style=" color:#CF8029; background-color:white; " data-bs-dismiss="modal">Close</button>
                                                </div>
                                                <div class="col">
                                                    <button type="button" class="btn btn-secondary w-100" style=" color:White; background-color:#CF8029; " data-bs-dismiss="modal">Save</button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <div class=" input-group pt-4" style="width:30%;margin-right:50px">
                <input name="search" type="text" class="form-control" style="margin-right:10px" placeholder=" Search">
                <button class="btn" style=" color:white; background-color: #CF8029;width:30%" type="submit" id="button-addon">Search</button>
                </form>
            </div>
            <br>
            <div class="card" style="width:61%">

                <div class="card-header">
                    <div class="card-body table-responsive">
                        <table style=" color: #A4A6B3; " class="table" id="datatablesSimple">
                            <thead>

                                <th>Deduction Name</th>
                                <th>Amount</th>
                                <th>Action</th>

                            </thead>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>

    @endsection