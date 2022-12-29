@extends('layouts.master')
@section('content-dashboard')

<div class="container-fluid pt-0">
    <h1 class="mt-0">Deduction Types</h1>
    <ol class="breadcrumb mb-3"></ol>
  
    
    <div class="card-body">
        <button class="btn" style=" color:white; background-color: #CF8029;width:30%" type="submit" id="button-addon2">Add Deduction Types</button>
        <div class="row pt-3">
           
            <div class="col-xl-6">
                <form action="{{ route('current.search')}}" method="GET">
                    @csrf
                    <div class="input-group ">
                        <input name="search" type="text" class="form-control form-check-inline" placeholder="Search">
                        <button class="btn" style=" color:white; background-color: #CF8029;width:50%" type="submit"
                            id="button-addon2">Search</button>
                    </div>
                </form>
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

    

</div>

@endsection




