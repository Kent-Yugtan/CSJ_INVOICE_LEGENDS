@extends('layouts.master')
@section('content-dashboard')

<div class="container-fluid px-4">


    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4"></ol>

    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card-hover card shadow p-2 mb-4 bg-white rounded" style="max-width: 40rem;">
                <div class="card-body text-center py-1" style="border-bottom: none; color: #A4A6B3;">Pending</div>
                <div>
                    <div class="row text-center py-3">
                        <Label class="fs-3">COUNT</Label>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between">

                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card-hover card shadow p-2 mb-4 bg-white rounded" style="max-width: 40rem;">
                <div class="card-body text-center py-1" style="border-bottom: none;color: #A4A6B3; ">Overdue</div>
                <div>
                    <div class="row text-center py-3">
                        <Label class="fs-3">COUNT</Label>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between">

                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card-hover card shadow p-2 mb-4 bg-white rounded" style="max-width: 40rem;">
                <div class="card-body text-center py-1" style="border-bottom: none;color: #A4A6B3; ">Completed</div>
                <div>
                    <div class="row text-center py-3">
                        <Label class="fs-3">COUNT</Label>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between">

                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card-hover card shadow p-2 mb-4 bg-white rounded" style="max-width: 40rem;">
                <div class="card-body text-center py-1" style="border-bottom: none;color: #A4A6B3; ">Cancelled</div>
                <div>
                    <div class="row text-center py-3">
                        <Label class="fs-3">COUNT</Label>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between">

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <h5>
                        <i class="fa-sharp fa-solid fa-file-invoice-dollar"></i>
                        Quick Invoice
                    </h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="mb-3">
                                    <label mb-2 style="color: #A4A6B3;">Profile</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput"
                                        placeholder="Profile">
                                </div>
                                <div class="mb-3">
                                    <label mb-2 style="color: #A4A6B3;">Description</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2"
                                        placeholder="Description">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="mb-3">
                                    <label mb-2 style="color: #A4A6B3;">Invoice #</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput"
                                        placeholder="Invoice #">
                                </div>
                                <div class="mb-3">
                                    <label mb-2 style="color: #A4A6B3; ">Amount</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2"
                                        placeholder="Amount">
                                </div>

                            </div>
                        </div>

                        <button type="submit" style="width:100%; height:50px;color:white; background-color: #CF8029;"
                            class="btn" class="btn">Create Invoice</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-xl-6">
            <div class="card mb-3">
                <div class="card-header">
                    <h5>
                        <i class="fa-solid fa-list"></i>
                        Pending Invoices
                    </h5>
                </div>
                <div class="card-body">
                    <div class="text-end">
                        <label mb-2 style="color: #A4A6B3;text-align: right;">View All</label>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            A list item
                            <span class="fa-solid fa-magnifying-glass" style="color: #CF8029;"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            A second list item
                            <span class="fa-solid fa-magnifying-glass" style="color: #CF8029;"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            A third list item
                            <span class="fa-solid fa-magnifying-glass" style="color: #CF8029;"></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-xl-6">
            <div class="card mb-3">
                <div class="card-header">
                    <h5>
                        <i class="fa-solid fa-list"></i>
                        Overdue Invoices
                    </h5>
                </div>
                <div class="card-body">
                    <div class="text-end">
                        <label mb-2 style="color: #A4A6B3;text-align: right;">View All</label>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            A list item
                            <span class="fa-solid fa-magnifying-glass" style="color: #CF8029;"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            A second list item
                            <span class="fa-solid fa-magnifying-glass" style="color: #CF8029;"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            A third list item
                            <span class="fa-solid fa-magnifying-glass" style="color: #CF8029;"></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection