@extends('layouts.master')
@section('content-dashboard')
<div class="container-fluid pt-0">
    <h1 class="mt-0">View Invoice</h1>
    <ol class="breadcrumb mb-3"></ol>
    <div class="row">
        <div class="col-6 px-2 w-75">
            <div class="card shadow px-5 p-2 bg-white rounded " style="width: 100%; height:100%; ">
                <div class="row">
                    <div class="col-6 pt-5  fw-bolder">
                        <div id="fullname"></div>
                        <div class="pt-3" id="email"></div>
                    </div>
                    <div class="col-6 pt-5  fw-bolder " style="text-align:end">
                        <h2> INVOICES </h2>
                        <div class="text-muted" id="invoice_no"></div>
                    </div>
                </div>

                <div class="row pt-3">
                    <div class="col-6">
                        <div id="address"></div>
                        <div id="city-province"></div>
                        <div id="zip_code"></div>
                    </div>
                </div>

                <div class="row pt-3">
                    <div class="col-6 ">
                        <span class="text-muted"> Bill To:</span>
                    </div>

                    <div class="col-3" style="text-align: right;">
                        <span class="text-muted"> Date: </span>
                    </div>

                    <div class="col-3 " style="text-align: right;">
                        <div id="date_created"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6 ">
                        <span> (5Ppints Production) </span>
                    </div>

                    <div class="col-3" style="text-align: right;">
                        <span class="text-muted"> Due Date: </span>
                    </div>

                    <div class="col-3" style="text-align: right;">
                        TO BE ASK
                    </div>
                </div>

                <div class="row">
                    <div class="col-6 ">
                        <span>(5ppints@gmail.com)</span>
                    </div>

                </div>

                <div class="row pt-3">
                    <div class="col-4">
                        <span>
                            (4094 South Power Road
                            Suite 103-197
                            Mesa, AZ 85212)
                        </span>
                    </div>
                    <div class="col-2"></div>
                    <div class="col-6">
                        <div class="rounded-3"
                            style="height:50px;background-color:#A4A6B3;display:flex;align-items:center">
                            <div class="col-6" style="text-align: right;">
                                <h5>
                                    <span>
                                        Balance Due:
                                    </span>
                                </h5>
                            </div>

                            <div class="col-6" style="text-align: right;">
                                <h5>
                                    <div class="me-3" id="balance_due"></div>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row pt-3">
                    <div class="col-12 table-responsive">
                        <table class="table" id="table_invoiceItems">
                            <thead class="thead-dark" style="border-radius:5px;background-color: black;color:white">
                                <tr>
                                    <th class="scope">Description</th>
                                    <th class="scope" style="text-align:end">Quantity</th>
                                    <th class="scope" style="text-align:end">Rate</th>
                                    <th class="scope" style="text-align:end">Amount</th>
                                </tr>
                            </thead>
                            <tbody class="px-3">
                                <!-- <tr>
                                    <td class="scope">Joshua Payment for 12/09/2022 </td>
                                    <td class="scope" style="text-align:end">1</td>
                                    <td class="scope" style="text-align:end">$100.00</td>
                                    <td class="scope" style="text-align:end">$100.00</td>
                                </tr>
                                <tr>
                                    <td class="scope"> Joshua Payment for 12/09/2022 </td>
                                    <td class="scope" style="text-align:end">1</td>
                                    <td class="scope" style="text-align:end">$100.00</td>
                                    <td class="scope" style="text-align:end">$100.00</td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">Notes:</div>
                    <div class="col">
                        <label class="text-muted"> Subtotal: </label>
                    </div>

                    <div id="sub_total" class="col mx-2 h6" style="text-align:end"></div>
                </div>
                <div class="row">
                    <div class="col-5" id="notes"></div>
                    <div class="col">
                        <label class="text-muted">Subtotal (PHP): </label>
                    </div>
                    <div id="convertedAmount" class="col mx-2 h6" style="text-align:end">
                    </div>

                </div>

                <div class="row pt-3">
                    <div class="col-5"></div>
                    <div class="col">
                        <h5> DEDUCTIONS </h5>
                    </div>
                    <div class="col mx-2" style="text-align:end"></div>
                </div>


                <div class="row deductions" id="deductions">

                </div>

                <div class="row pt-3">
                    <div class="col-5"></div>
                    <div class="col">
                        <h5> GRAND TOTAL </h5>
                    </div>
                </div>

                <div class="row pb-5">
                    <div class="col-5"></div>
                    <div class="col">
                        <label class="text-muted">Total: </label>
                    </div>
                    <div class="col mx-2 h6" id="grand_total_amount" style="text-align:end"></div>
                </div>
            </div>
        </div>

        <div class="col-6 px-2 w-25">
            <div class="card shadow p-2 mb-5 bg-white rounded" style="width: 100%; height:45vh">
                <!-- <div class="card-header">Profile Information</div> -->
                <div class="row pt-3">
                    <div class="col">
                        <div class="pb-2">
                            <button type="button" class="btn btn-secondary w-100"
                                style=" color:White; background-color:green; ">Paid Invoice</button>
                        </div>
                        <div>
                            <button type="button" class="btn btn-secondary w-100"
                                style=" color:White; background-color:gray; ">Cancel Invoice</button>
                        </div>
                        <div class="pt-2">
                            <button type="button" class="btn btn-secondary w-100"
                                style=" color:White; background-color:red; ">Delete Invoice</button>
                        </div>
                    </div>
                </div>

                <div class="row pt-5">
                    <div class="col">
                        <div class="pb-2">
                            <button type="button" class="btn btn-secondary w-100"
                                style=" color:White; background-color:#CF8029; ">Download</button>
                        </div>
                        <div class="pb-2">
                            <button type="button" class="btn btn-secondary w-100"
                                style=" color:White; background-color:#CF8029; ">Edit Invoice</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    show_invoice();

    function show_invoice() {
        let url = window.location.pathname;
        let urlSplit = url.split('/');
        if (urlSplit.length == 4) {
            let invoice_id = urlSplit[3];
            console.log("invoice_id", invoice_id);
            apiUrl
            axios
                .get(apiUrl + '/api/admin/editInvoice/' + invoice_id, {
                    headers: {
                        Authorization: token,
                    },
                }).then(function(response) {
                    let data = response.data;
                    if (data.success) {
                        const month = ["January", "February", "March", "April", "May", "June", "July",
                            "August", "September", "October", "November", "December"
                        ];
                        var newdate = new Date(data.data.created_at);
                        var mm = month[newdate.getMonth()];
                        var dd = newdate.getDate();
                        var yy = newdate.getFullYear();

                        $('#fullname').html(data.data.profile.user.first_name + " " + data.data.profile.user
                            .last_name);
                        $('#email').html(data.data.profile.user.email);
                        $('#invoice_no').html("#" + data.data.invoice_no);
                        $('#address').html(data.data.profile.address);
                        $('#city-province').html(data.data.profile.city + ", " + data.data.profile
                            .province);
                        $('#zip_code').html("Philippines " + data.data.profile.zip_code);
                        $('#date_created').html(mm + " " + dd + ", " + yy);
                        $('#notes').html(data.data.notes);


                        if (data.data.invoice_items.length > 0) {
                            let balance_due = parseFloat(data.data.sub_total ? data.data.sub_total : 0) +
                                parseFloat(data.data
                                    .discount_total ? data.data
                                    .discount_total : 0);
                            let converted_amount = parseFloat(data.data.converted_amount ? data.data
                                .converted_amount :
                                0);
                            $('#balance_due').html((balance_due)
                                .toLocaleString('en-US', {
                                    style: 'currency',
                                    currency: 'USD'
                                }));
                            data.data.invoice_items.map((item) => {
                                let tr = '<tr>';
                                tr += '<td class="scope">' + item.item_description + '</td>'
                                tr += '<td class="scope" style="text-align:end">' + item.quantity +
                                    '</td>'
                                tr += '<td class="scope" style="text-align:end">' + item.rate
                                    .toLocaleString('en-US', {
                                        style: 'currency',
                                        currency: 'USD'
                                    }) +
                                    '</td>'
                                tr += '<td class="scope" style="text-align:end">' + item
                                    .total_amount.toLocaleString('en-US', {
                                        style: 'currency',
                                        currency: 'USD'
                                    }) + '</td>'
                                tr += '</tr>';

                                $('#table_invoiceItems tbody').append(tr);
                                return '';
                            })

                            $('#sub_total').html(balance_due.toLocaleString('en-US', {
                                style: 'currency',
                                currency: 'USD'
                            }));

                            $('#convertedAmount').html(converted_amount.toLocaleString('en-US', {
                                style: 'currency',
                                currency: 'PHP'
                            }));

                            if (data.data.deductions.length > 0) {
                                data.data.deductions.map((item) => {
                                    let deduction_amount = parseFloat(item.profile_deduction_types
                                        .amount ? item.profile_deduction_types.amount : 0);
                                    let parent = $(this).closest('.row .deductions');
                                    let div_rows = '';
                                    div_rows += '<div class="col-5 row_deductions"></div>';
                                    div_rows += '<div class="col text-muted">' + item
                                        .profile_deduction_types
                                        .deduction_type.deduction_name + '</div>';
                                    div_rows +=
                                        '<div class="col mx-2 h6" style="text-align:end;color:red;">' +
                                        deduction_amount.toLocaleString('en-US', {
                                            style: 'currency',
                                            currency: 'PHP'
                                        }) + '</div>';

                                    $(".row .deductions").append(div_rows);
                                    return '';

                                })
                            } else {
                                let parent = $(this).closest('.row .deductions');
                                let div_rows = '';
                                div_rows += '<div class="col-5 row_deductions"></div>';
                                div_rows += '<div class="col">"NO DEDUCTIONS"</div>';
                                div_rows +=
                                    '<div class="col mx-2 h6" style="text-align:end;color:red;"></div>';
                                $(".row .deductions").append(div_rows);
                                return '';
                            }
                            let grand_total_amount = parseFloat(data.data.grand_total_amount ? data.data
                                .grand_total_amount : 0);
                            $('#grand_total_amount').html(grand_total_amount.toLocaleString(
                                'en-US', {
                                    style: 'currency',
                                    currency: 'PHP'
                                }));

                        } else {
                            $("#table_invoiceItems tbody").append(
                                '<tr><td colspan="4" class="text-center">No data</td></tr>');
                        }

                        console.log("SUCCESS", data);
                    }

                }).catch(function(error) {
                    console.log("ERROR", error);
                });
        }

    }
})
</script>
@endsection