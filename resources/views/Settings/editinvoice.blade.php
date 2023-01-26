@extends('layouts.master')
@section('content-dashboard')

<div class="container-fluid pt-0">
    <h1 class="mt-0">Edit Invoice</h1>
    <ol class="breadcrumb mb-3"></ol>
    <div class="row">
        <div class="col-6 px-2 w-75">
            <div class="card shadow p-2 mb-5 bg-white rounded" style="width: 100%; height:100%">
                <div class="container">
                    <div class="row">
                        <div class="col my-3 mx-3 fw-bolder">
                            Joshua Saubon
                            <br> joshuasaubon@gmail.com
                        </div>

                        <div class="col my-3 mx-3 fw-bolder " style="text-align:end">
                            <h2> INVOICES </h2>
                            <small class="text-muted"> # 5PP-0006</small>

                        </div>
                        <div class="row mx-3">
                            P9- Baan, Baan Km3 <br>
                            Butuan City, Agusan del Norte <br>
                            Philippines 8600 <br>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="row">
                            <div class="col mx-3">
                                Bill To:
                            </div>
                            <div class="col-md-auto">
                                <small class="text-muted"> Date: </small>
                            </div>
                            <div class="col col-lg-2 mx-3" style="text-align:end">
                                Dec 7, 2022
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mx-3">
                                5 pints Production
                            </div>
                            <div class="col-md-auto">
                                <small class="text-muted"> Due Date: </small>
                            </div>
                            <div class="col col-lg-2 mx-3" style="text-align:end">
                                Dec 7, 2022
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">

                            </div>
                            <div class="col-7">
                                <h4 class="text-muted" style="text-align:end"> </h4>
                            </div>
                            <div class="row justify-content-between">
                                <div class="col-4">

                                </div>
                                <div class="col-4">
                                    <div class="row rounded" style="background-color:#A4A6B3
">
                                        <h5>
                                            Balance Due: &emsp; &emsp; &ensp; 100$
                                        </h5>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class=" row">
                            <div class="col mx-3">

                            </div>
                            <!-- <div style="color:white; background-color: #A4A6B3; padding:5px; width:20%; text-align:center">
                                <div class="col-md-auto">
                                    <h5> Balance Due : 100$</h5>
                                </div>

                            </div> -->
                        </div>

                    </div>
                    <div class="col my-3 mx-3">
                        <div>
                            4094 South Power Road <br>
                            Suite 103-197 <br>
                            Mesa, AZ 85212 <br>
                            <br>
                        </div>
                        <table class="row">
                            <thead class="rounded" style="color:white; background-color:Black; padding:10px; width:100%;">
                                <tr>
                                    <th style="width:63%">Item </th>
                                    <th style="width:22%">Quantity</th>
                                    <th style="width:12%">Rate</th>
                                    <th style="width:12%">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th style="width:63%"> Joshua Payment for 12/09/2022 </th>
                                    <th style="width:22%">1</th>
                                    <th style="width:12%">$100.00</th>
                                    <th style="width:12%">$100.00</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <br><br><br><br>
                    <div class=" row">
                        <div class="col mx-3">

                        </div>
                        <div class="col-md-auto">
                            <medium> Subtotal: </medium>
                        </div>
                        <div class="col col-lg-2 mx-3" style="text-align:end">
                            100$
                        </div>
                    </div>
                    <div class=" row">
                        <div class="col mx-3">

                        </div>
                        <div class="col-md-auto">
                            <medium> Subtotal PHP: </medium>
                        </div>
                        <div class="col col-lg-2 mx-3" style="text-align:end">
                            P5602.00
                        </div>

                    </div>
                    <br>
                    <br>
                    <br>
                    <div class=" row">
                        <div class="col mx-3">

                        </div>
                        <div class="col-md-auto">
                            <h5> Deductions </h5>
                        </div>
                        <div class="col col-lg-2 mx-3" style="text-align:end">

                        </div>

                    </div>
                    <div class="row">
                        <div class="col mx-3">

                        </div>
                        <div class="col-md-auto">
                            <small class="text-muted"> SSS </small>
                        </div>
                        <div class="col col-lg-2 mx-3" style="text-align:end;color:red;">
                            P-200
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mx-3">

                        </div>
                        <div class="col-md-auto">
                            <small class="text-muted"> Phil-Health </small>
                        </div>
                        <div class="col col-lg-2 mx-3" style="text-align:end;color:red;">
                            P-100
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mx-3">
                        </div>
                        <div class="col-md-auto">
                            <small class="text-muted"> Pag-ibig </small>
                        </div>
                        <div class="col col-lg-2 mx-3" style="text-align:end;color:red;">
                            P-100
                        </div>
                    </div> <br><br><br><br>
                    <div class=" row">
                        <div class="col mx-3">
                        </div>
                        <div class="col-md-auto">
                            <h5> Grand Total </h5>
                        </div>
                        <div class="col col-lg-2 mx-3" style="text-align:end">

                        </div>

                    </div>
                    <div class=" row">
                        <div class="col mx-3">
                        </div>
                        <div class="col-md-auto">
                            <medium> Total </medium>
                        </div>
                        <div class="col col-lg-2 mx-3" style="text-align:end">
                            P5202.00
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-6 px-2 w-25">
            <div class="card shadow p-2 mb-5 bg-white rounded " style="width: 100%; height:40%">
                <!-- <div class="card-header">Profile Information</div> -->
                <div class="row mt-2">
                    <div class="col g-5">
                        <div class="pb-1">
                            <button type="button" class="btn btn-secondary w-100" style=" color:White; background-color:green; ">Paid Invoice</button>

                        </div>
                        <div>
                            <button type="button" class="btn btn-secondary w-100" style=" color:White; background-color:gray; ">Cancel Invoice</button>
                        </div>
                        <div class="pt-1">
                            <button type="button" class="btn btn-secondary w-100" style=" color:White; background-color:red; ">Delete Invoice</button>

                        </div>
                    </div>

                </div>
                <div class="row mt-5">
                    <div class="col g-5">
                        <div class="pb-1">
                            <button type="button" class="btn btn-secondary w-100" style=" color:White; background-color:#CF8029; ">Download</button>

                        </div>
                        <div>
                            <button type="button" class="btn btn-secondary w-100" style=" color:White; background-color:#CF8029; ">Edit Invoice</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @endsection