@extends('layouts.master')
@section('content-dashboard')

<div class="container-fluid px-4">
    <h1 class="mt-4">Inactive Invoices</h1>
    <ol class="breadcrumb mb-4"></ol>
    <div class="row">
        <div class="col">
            <div class="card-hover card shadow p-2 mb-4 bg-white rounded" style="width: 100%;">
                <div>
                    <div class="row text-center py-3">
                        <Label class="fs-3">COUNT</Label>
                    </div>
                    <div class="card-body text-center py-1" style="border-bottom: none; color: #A4A6B3;">Pending</div>
                </div>
                <div class="d-flex align-items-center justify-content-between"></div>
            </div>
        </div>
        <div class="col">
            <div class="card-hover card shadow p-2 mb-4 bg-white rounded" style="width: 100%;">
                <div>
                    <div class="row text-center py-3">
                        <Label class="fs-3">COUNT</Label>
                    </div>
                    <div class="card-body text-center py-1" style="border-bottom: none;color: #A4A6B3; ">Paid</div>
                </div>
                <div class="d-flex align-items-center justify-content-between"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col ">
            <form>
                @csrf
                <div class="input-group ">
                    <input name="search" type="text" class="form-control form-check-inline" placeholder="Search">
                    <button class="btn" style=" color:white; background-color: #CF8029;width:30%" type="submit" id="button-addon2">Search</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row pt-3">
        <div class="col">
            <div class="card mb-5">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Inactive Invoices
                </div>
                <div class="card-body table-responsive">
                    <table style=" color: #A4A6B3; " class="table table-hover" id="datatablesSimple">
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

                        <tbody>

                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>




</div>


@endsection