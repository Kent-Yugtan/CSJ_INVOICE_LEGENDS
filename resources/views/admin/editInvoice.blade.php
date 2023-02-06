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
                            <button type="button" id="edit_invoice" data-bs-toggle="modal"
                                data-bs-target="#exampleModal" class="btn btn-secondary w-100"
                                style=" color:White; background-color:#CF8029; ">Edit Invoice</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL FOR EDIT INVOICE -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="width:100%;">
        <div class=" modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Update Invoice</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row whole_row">
                    <form id="submit_update_invoice">
                        @csrf
                        <div class="row px-4 pb-4" id="header">
                            <div class="col-md-6 px-2 w-100">
                                <div class="card shadow p-2 mb-5 bg-white rounded">

                                    <div class="row px-4 pb-4" id="header">
                                        <div class="col-12 mb-3">
                                            <div class="form-group w-50">
                                                <!-- <label class="formGroupExampleInput2">Invoice #</label> -->
                                                <input id="invoice_no"
                                                    style="font-weight: bold;border:none;background-color:white"
                                                    disabled name="invoice_no" type="text" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <div class="row">
                                                <div class="col">
                                                    <div class=" form-group">
                                                        <label class=" formGroupExampleInput2">Description</label>
                                                        <input id="invoice_description" name="invoice_description"
                                                            type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12" id="show_items">
                                            <!-- FOR TABLE INVOICE DESCRIPTION DISPLAY -->
                                        </div>

                                        <div class="col-8 mb-3"></div>
                                        <div class="col-4 mb-3">
                                            <div class="row">
                                                <div class="col-4 md-2 w-100">
                                                    <div class="form-group">
                                                        </br>
                                                        <button class="btn btn-secondary"
                                                            style="width:100%;color:white; background-color: #CF8029;"
                                                            id="add_item">Add
                                                            Item</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <div class="row">
                                                <div class="col"
                                                    style="display: flex;flex-direction: column-reverse;align-items: center;">
                                                    <div class="form-group">
                                                        <label class="formGroupExampleInput2">Discount
                                                            Type</label>
                                                        <br>
                                                        <input class="form-check-input" type="radio"
                                                            name="discount_type" id="discount_type" value="fixed">
                                                        <label class="formGroupExampleInput2">
                                                            Fxd &nbsp; &nbsp;
                                                        </label>
                                                        <input class="discount_type form-check-input" type="radio"
                                                            name="discount_type" id="discount_type" value="percentage">
                                                        <label class="formGroupExampleInput2">
                                                            %
                                                        </label>
                                                        <!-- <input type="text" id="discount_type" class="form-control" /> -->

                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="form-group">
                                                        <label
                                                            class="formGroupExampleInput2 label_discount_amount">Discount
                                                            Amount ($)</label>
                                                        <input type="text" step="any" style="text-align:right;"
                                                            name="discount_amount" id="discount_amount"
                                                            class="form-control" />
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label
                                                            class="formGroupExampleInput2 label_discount_total">Discount
                                                            Total ($)</label>
                                                        <input type="text" disabled
                                                            style="text-align:right; border:0px;background-color:white;"
                                                            onkeypress="return onlyNumberKey(event)"
                                                            name="discount_total" id="discount_total"
                                                            class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <div class="row">
                                                <div class="col-12 my-3" style="justify-content:end;display:flex">
                                                    <div class="form-group">
                                                        <!-- border-style:none -->
                                                        <label>Subtotal ($): </label>
                                                        <input type="text"
                                                            style="font-weight: bold;text-align:right;border:none;background-color:white"
                                                            name="subtotal" id="subtotal"
                                                            class="form-control no-outline subtotal" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="formGroupExampleInput2">Dollar Amount
                                                            ($)</label>
                                                        <input type="text" id="dollar_amount"
                                                            style="font-weight: bold;border:none; text-align:right;background-color:white"
                                                            class="form-control dollar_amount" disabled />

                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="formGroupExampleInput2">Peso Rate
                                                            (Php)</label>
                                                        <input type="text"
                                                            style="font-weight: bold;border:none; text-align:right;background-color:white"
                                                            onkeypress="return onlyNumberKey(event)" id="peso_rate"
                                                            class="form-control" disabled />
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label class="formGroupExampleInput2"
                                                            for="form3Example2">Converted
                                                            Amount (Php)</label>
                                                        <input type="text"
                                                            style="font-weight: bold;border:none; text-align:right;background-color:white"
                                                            onkeypress="return onlyNumberKey(event)"
                                                            id="converted_amount" class="form-control converted_amount"
                                                            disabled />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <div class="row">
                                                <div class="col">
                                                    <h3> DEDUCTIONS </h3>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12" id="show_deduction_items">
                                        </div>

                                        <div class="col-12 mb-3">
                                            <div class="row">
                                                <div class="col-8"></div>
                                                <div class="col-4 text-center mb-3">
                                                    <h4> Grand Total </h4>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <div class="row">
                                                <div class="col-8" style="text-align:right;">
                                                    <label style="vertical-align: -webkit-baseline-middle">Total
                                                        (Php):
                                                        <label>
                                                </div>
                                                <div class="col-4 mb-3" style="justify-content:end;display:flex">
                                                    <!-- border-style:none -->
                                                    <input type="text" id="grand_total" class="form-control no-outline"
                                                        style="text-align:right;border:0;background-color:white;"
                                                        disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <div class="row">
                                                <div class="col-12 form-control">
                                                    <label for="floatingTextarea">Notes</label>
                                                    <textarea class="form-control" placeholder="Leave a notes here"
                                                        id="notes" name="notes"></textarea>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6 mb-3">
                                            <div class="pb-3">
                                                <button type="button" class="btn btn-secondary w-100"
                                                    style=" color:#CF8029; background-color:white; "
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <div class="pb-3">
                                                <button type="submit" id="update" class="btn btn-secondary w-100"
                                                    style="color:White; background-color:#CF8029;">Update</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
let total_deduction_amount = 0
let x = 1;

const PHP = value => currency(value, {
    symbol: '',
    decimal: '.',
    separator: ','
});

//  For creating invoice codes
const api = "https://api.exchangerate-api.com/v4/latest/USD";

$(document).ready(function() {
    show_invoice();
    // display_item_rows();


    let toast1 = $('.toast1');
    toast1.toast({
        delay: 3000,
        animation: true,

    });

    $('.close').on('click', function(e) {
        e.preventDefault();
        toast1.toast('hide');
    })
    $("#error_msg").hide();
    $("#success_msg").hide();

    $('#discount_amount').on('keyup', function() {
        subtotal();
    })


    // FOR UPDATE
    // $('#invoice_items').on('submit', function(e) {
    //     e.preventDefault();
    //     let toast1 = $('.toast1');


    //     // CONDITION IF THERE IS BLANK ROW
    //     $('#show_items .row1').each(function() {
    //         let parent = $(this).closest('.row1');
    //         let row_item = $(this).parent();
    //         let item_rate = $(this).find('.rate').val();
    //         let item_qty = $(this).find('.quantity').val();

    //         if (item_rate == "" && item_qty == "") {

    //             // console.log("row_item", parent);

    //             if ($('#show_items > .row').length === 1) {
    //                 $('#show_items > .row').find('.col-remove-item').removeClass(
    //                         'd-none')
    //                     .addClass(
    //                         'd-none');
    //             } else {
    //                 $(parent).remove();
    //             }
    //         }
    //         x--;
    //     });

    //     let profile_id = $('#profile_id').val();
    //     // let invoice_no = $('#invoice_no').val();
    //     // INVOICE TABLE
    //     let invoice_description = $('#invoice_description').val();
    //     let invoice_subtotal = $('#subtotal').val().replaceAll(',', '');
    //     let invoice_converted_amount = $('#converted_amount').val().replaceAll(',', '');
    //     let invoice_discount_type = $('#discount_type:checked').val();
    //     let invoice_discount_amount = $('#discount_amount').val().replaceAll(',', '');
    //     let invoice_discount_total = $('#discount_total').val().replaceAll(',', '');
    //     let invoice_total_amount = $('#grand_total').val().replaceAll(',', '');
    //     let invoice_notes = $('#notes').val();

    //     // INVOICE ITEMS TABLE
    //     let invoiceItem = [];
    //     $('#show_items .row').each(function() {
    //         let item_description = $(this).find('.item_description').val() ? $(this).find(
    //             '.item_description').val() : "";
    //         let item_rate = $(this).find('.rate').val().replaceAll(',', '') ? $(this).find(
    //             '.rate').val().replaceAll(',', '') : 0;
    //         let item_qty = $(this).find('.quantity').val() ? $(this)
    //             .find('.quantity').val() : 0;
    //         let item_total_amount = $(this).find('.amount').val().replaceAll(',', '') ? $(
    //                 this).find('.amount')
    //             .val().replaceAll(',', '') : 0;

    //         invoiceItem.push({
    //             item_description,
    //             item_rate,
    //             item_qty,
    //             item_total_amount,
    //         })
    //     });

    //     // DEDUCTIONS TABLE
    //     let Deductions = [];
    //     $('#show_deduction_items .row').each(function() {
    //         let profile_deduction_type_id = $(this).find('.profile_deduction_type').val() ?
    //             $(this)
    //             .find(
    //                 '.profile_deduction_type').val() : 0;
    //         let deduction_amount = $(this).find('.deduction_amount').val().replaceAll(',',
    //             '') ? $(this).find(
    //             '.deduction_amount').val().replaceAll(',', '') : 0;

    //         Deductions.push({
    //             profile_deduction_type_id,
    //             deduction_amount,
    //         })

    //     });

    //     let data = {
    //         profile_id: profile_id,
    //         // invoice_no: invoice_no,
    //         description: invoice_description,
    //         sub_total: invoice_subtotal,
    //         converted_amount: invoice_converted_amount,
    //         discount_type: invoice_discount_type,
    //         discount_amount: invoice_discount_amount,
    //         discount_total: invoice_discount_total,
    //         grand_total_amount: invoice_total_amount,
    //         notes: invoice_notes,
    //         invoiceItem,
    //         Deductions,
    //     }

    //     console.log("Deductions", data);
    //     axios.
    //     post(apiUrl + "/api/createinvoice", data, {
    //         headers: {
    //             Authorization: token
    //         },
    //     }).then(function(response) {
    //         let data = response.data;
    //         if (data.success) {
    //             console.log("SUCCES", data.success);
    //             $('.toast1 .toast-title').html('Create Invoices');
    //             $('.toast1 .toast-body').html(response.data.message);

    //             toast1.toast('show');
    //             setTimeout(function() {
    //                 $('#exampleModal').modal('hide');
    //             }, 1500);
    //             $("#save").attr("data-bs-dismiss", "modal");
    //         }
    //     }).catch(function(error) {
    //         if (error.response.data.errors) {
    //             let errors = error.response.data.errors;
    //             console.log("errors", errors);
    //             let fieldnames = Object.keys(errors);

    //             Object.values(errors).map((item, index) => {
    //                 fieldname = fieldnames[0].split('_');
    //                 fieldname.map((item2, index2) => {
    //                     fieldname['key'] = capitalize(item2);
    //                     return ""
    //                 });
    //                 fieldname = fieldname.join(" ");

    //                 $('.toast1 .toast-title').html(fieldname);
    //                 $('.toast1 .toast-body').html(Object.values(errors)[0].join(
    //                     "\n\r"));
    //             })
    //             toast1.toast('show');
    //         }
    //     });

    // });

    // function capitalize(s) {
    //     if (typeof s !== 'string') return "";
    //     return s.charAt(0).toUpperCase() + s.slice(1);
    // }

    // CHECK IF THE USER HAVE THE PROFILE
    $("#exampleModal").on('hide.bs.modal', function() {
        window.location.reload();
    });


    // ONLY NUMBERS FOR NUMBER INPUTS
    function onlyNumberKey(evt) {
        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }

    // FUNCTION FOR KEYUP CLASS MULTI INPUTS FOR ADD ITEMS
    $('#show_items').on("keyup", ".multi", function() {
        let sub_total = 0;
        let parent = $(this).closest('.row');
        let quantity = parent.find('.quantity').val().replaceAll(',', '') ? parent.find('.quantity')
            .val().replaceAll(',', '') : 0;
        let rate = parent.find('.rate').val().replaceAll(',', '') ? parent.find('.rate').val()
            .replaceAll(',', '') : 0;
        sub_total = parseFloat(quantity * rate);

        parent.find('.amount').val(PHP(sub_total).format());
        // getResults_Converted();
        displayResults();
        Additems_total();
        subtotal();
    });


    $('#show_items').focusout(".multi", function() {

        let parent = $(this).closest('.row');

        let quantity = $('.quantity').val();
        $('.quantity').val(PHP(quantity).format());
        let PHPquantity = $('.quantity').val();

        let rate = $('.rate').val();
        $('.rate').val(PHP(rate).format());
        let PHPrate = $('.rate').val();

        DeductionItems_total();
    })


    $('#discount_amount').focusout(function() {
        if ($('#discount_amount').val() == "") {
            $('#discount_amount').val('0.00');
        } else {
            let discount_type = $("input[id='discount_type']:checked").val();
            if (discount_type == 'percentage') {
                let discount_amount = $('#discount_amount').val();
                $('#discount_amount').val(parseInt(discount_amount));
            } else {
                let discount_amount = $('#discount_amount').val();
                $('#discount_amount').val(PHP(discount_amount).format());
            }
        }
        DeductionItems_total();
    })

    // FUNCTION FOR KEYUP CLASS DEDUCTIONS FOR DEDUCTIONS
    $('#show_deduction_items').on("keyup", ".multi2", function() {
        let grand_total = 0;
        let parent = $(this).closest('.row');
        let deduction_amount = parent.find('.deduction_amount').val() ? parent
            .find(
                '.deduction_amount')
            .val() : 0;
        // grand_total = parseFloat($('#converted_amount').val().replaceAll(',', '')) - parseFloat(
        // deduction_amount.replaceAll(',', ''));
        // $('#grand_total').val(PHP(grand_total).format());
        DeductionItems_total();

    });

    $('#show_deduction_items').focusout('.multi2', function() {
        let deduction_sum = 0;
        $('#show_deduction_items .deduction_amount').each(function() {
            let parent = $(this).closest('.row');
            let deduction_amount = parent.find('.deduction_amount').val();
            parent.find('.deduction_amount').val(PHP(deduction_amount).format());
        })
    })

    // DISPLAY CONVERTED AMOUTN FROM DATABASE
    function displayResults() {
        let converted_amount = 0;
        let dollar_amount = $("#dollar_amount").val().replaceAll(',', '');
        let peso_rate = $('#peso_rate').val().replaceAll(',', '');
        converted_amount = parseFloat(dollar_amount * peso_rate);
        $('#converted_amount').val(PHP(parseFloat(converted_amount)).format());
    }

    // FUNCTION FOR DISPLAY RESULTS AND CONVERTED AMOUNT
    // function displayResults(currency) {
    //     let dollar_amount = $("#dollar_amount").val().replaceAll(',', '');
    //     let peso_rate = 0;
    //     let converted_amount = 0;
    //     let fromRate = currency.rates['USD'];
    //     let toRate = currency.rates['PHP'];
    //     peso_rate = (toRate / fromRate);
    //     converted_amount = ((toRate / fromRate) * dollar_amount);
    //     $('#peso_rate').val(PHP(parseFloat(peso_rate)).format());
    //     $('#converted_amount').val(PHP(parseFloat(converted_amount)).format());
    // }

    $("#discount_amount").addClass('d-none');
    $("#discount_total").addClass('d-none');
    $(".label_discount_amount").addClass('d-none');
    $(".label_discount_total").addClass('d-none');
    $('input[type=radio][id=discount_type]').change(function() {

        if (subtotal == 0) {
            $("#discount_amount").addClass('d-none');
            $("#discount_total").addClass('d-none');
            $(".label_discount_amount").addClass('d-none');
            $(".label_discount_total").addClass('d-none');
        } else {
            if (this.value == 'fixed') {
                //write your logic here
                // console.log("FIXED");
                $("#discount_amount").removeClass('d-none');
                $("#discount_total").removeClass('d-none');
                $(".label_discount_amount").removeClass('d-none');
                $(".label_discount_total").removeClass('d-none');

                $('#discount_amount').val('0.00');

            } else if (this.value == 'percentage') {
                //write your logic here
                // console.log("PERCENTAGE");
                $("#discount_amount").removeClass('d-none');
                $("#discount_total").removeClass('d-none');
                $(".label_discount_amount").removeClass('d-none');
                $(".label_discount_total").removeClass('d-none');

                $('#discount_amount').val('0.00');
                $('#discount_total').val('0.00');
            }
        }
        subtotal();
        Additems_total();
    })


    // FUNCTION FOR CALCUTAION DEDUCTIONS
    function DeductionItems_total() {
        var deduction_sum = 0;
        let converted_amount = 0;
        let dollar_amount = 0;
        let converted_amount_input = 0;
        let peso_rate = 0;
        let grand_total = 0;

        $('#show_deduction_items .deduction_amount').each(function() {
            deduction_sum += Number($(this).val().replaceAll(',', ''));
        })

        $('#show_items .amount').each(function() {
            converted_amount += Number($(this).val().replaceAll(',', ''));
        });

        peso_rate = $('#peso_rate').val().replaceAll(',', '') ? $('#peso_rate').val().replaceAll(',', '') :
            0;
        dollar_amount = $('#dollar_amount').val().replaceAll(',', '') ? $('#dollar_amount').val()
            .replaceAll(',', '') : 0;
        converted_amount_input = parseFloat(dollar_amount * peso_rate);
        grand_total = parseFloat(converted_amount_input - deduction_sum);
        $('#grand_total').val(PHP(grand_total).format());
        // console.log("grand_total", grand_total);
    }

    // SUBTOTAL CALCULATIONS
    function subtotal() {
        let discount_type = $("input[id='discount_type']:checked").val();
        let discount_amount = $('#discount_amount').val();
        let discount_total = $('#discount_total').val();
        let subtotal = $('#subtotal').val();
        var sum = 0;

        $('#show_items .amount').each(function() {
            sum += Number($(this).val().replaceAll(',', ''));
        });

        if (discount_type == 'fixed') {
            $('#discount_total').val(PHP(parseFloat(discount_amount ? discount_amount : 0) * 1).format());
            let sub_total = (sum - $('#discount_total').val().replaceAll(',', ''));
            $('#subtotal').val(PHP(sub_total).format());

            let dollar_amount = $('#subtotal').val();
            $('#dollar_amount').val(PHP(dollar_amount).format());
            DeductionItems_total()
        } else if (discount_type == 'percentage') {

            let percentage = parseFloat(((discount_amount ? discount_amount : 0) / 100) * sum);
            $('#discount_total').val(PHP(percentage).format());
            let sub_total = (parseFloat(sum) - parseFloat(percentage));
            $('#subtotal').val(PHP(sub_total).format());
            $('#dollar_amount').val(PHP(sub_total).format());
            DeductionItems_total()
        }
        // getResults_Converted();
        displayResults();

    }

    // FUNCTION FOR DISPLAYING SUBTOTAL AMOUNT AND DOLLAR AMOUNT
    function Additems_total() {
        var sum = 0;
        let converted_amount = 0;
        $('#show_items .amount').each(function() {
            sum += Number($(this).val().replaceAll(',', ''));
        });
        // $('#subtotal').val(parseFloat(sum).toFixed(2));
        // $('#dollar_amount').val(parseFloat(sum).toFixed(2));

        $('#subtotal').val(PHP(parseFloat(sum)).format());
        $('#dollar_amount').val(PHP(parseFloat(sum)).format());

    }

    // FUNCTION FOR DISPLAY RESULTS AND CONVERTED AMOUNT
    // function getResults_Converted() {
    //     fetch(`${api}`)
    //         .then(currency => {
    //             return currency.json();
    //         }).then(displayResults);
    // }

    // FUNCTION CLICK FOR REMOVING INVOICE ITEMS ROWS
    $(document).on('click', '.remove_items', function(e) {
        e.preventDefault();
        let parent = $(this).closest('.row');
        let sub_total = parent.find('.subtotal').val();
        let row_item = $(this).parent().parent().parent();
        $(row_item).remove();


        if ($('#show_items > .row').length === 1) {
            $('#show_items > .row').find('.col-remove-item').removeClass('d-none')
                .addClass(
                    'd-none');
        }
        // getResults_Converted();
        displayResults();
        Additems_total();
        subtotal();
        DeductionItems_total();
        x--;
    });

    // BUTTON for ADD ITEMS ROWS
    $("#add_item").click(function(e) {
        e.preventDefault();
        display_item_rows()
    });

    // INITIALIZE DISPLAY ITEM ROWS
    function display_item_rows() {
        let max_fields = 10;
        let wrapper = $('#show_items');
        add_rows = '';
        add_rows += '<div class="row row1">';

        add_rows += '<div class="col-md-4 mb-3">';
        add_rows += '<div class="form-group">';
        add_rows += '<label class="formGroupExampleInput2">Item Desctiption</label>';
        add_rows +=
            '<input type="text" name="item_description" id="item_description" class="form-control item_description" />';
        add_rows += '</div>';
        add_rows += '</div>';

        add_rows += '<div class="col-md-2 mb-3">';
        add_rows += '<div class="form-group">';
        add_rows += '<label class="formGroupExampleInput2">Quantity</label>';
        add_rows +=
            '<input type="text" step="any" maxlength="4" name="quantity" id="quantity" style="text-align:right;" class="form-control multi quantity" />';
        add_rows += '</div>';
        add_rows += ' </div>';

        add_rows += '<div class="col-md-3 mb-3">';
        add_rows += '<div class="form-group">';
        add_rows += '<label class="formGroupExampleInput2" for="form3Example2">Rate</label>';
        add_rows +=
            '<input type="text" step="any" name="rate" id="rate" style="text-align:right;" class="form-control multi rate" />';
        add_rows += '</div>';
        add_rows += '</div>';

        add_rows += '<div class="col-md-2 mb-3">';
        add_rows += '<div class="form-group">';
        add_rows += '<label class="formGroupExampleInput2" for="form3Example2">Amount</label>';
        // style="text-align:right;border:none;background-color:white"
        add_rows +=
            '<input type="text" style="text-align:right;border:none;background-color:white" disabled name="amount" id="amount" class="form-control amount" />';
        add_rows += '</div>';
        add_rows += '</div>';

        add_rows += '<div class="col-md-1 col-remove-item d-none">';
        add_rows += '<div class="form-group">';
        add_rows += '</br>';
        add_rows +=
            '<button class="btn remove_items" style="display: flex;justify-content: center;"><i class="fa fa-trash pe-1" style="color:red"></i></button>';
        add_rows += '</div>';
        add_rows += '</div>';

        add_rows += '</div>'

        $(wrapper).append(add_rows);

        if ($('#show_items > .row').length > 1) {
            $('#show_items > .row').each(function() {
                $(this).find('.col-remove-item').removeClass('d-none');
            })
        } else {
            $('#show_items > .row').find('.col-remove-item').removeClass('d-none').addClass(
                'd-none');
        }
    }
    $(document).on('click', '#edit_invoice', function(e) {
        e.preventDefault();

        let url = window.location.pathname;
        let urlSplit = url.split('/');
        if (urlSplit.length == 4) {
            let invoice_id = urlSplit[3]
            console.log("CICK", urlSplit[3]);

            axios.get(apiUrl + '/api/admin/editInvoice/' + invoice_id, {
                headers: {
                    Authorization: token
                },
            }).then(function(response) {
                let data = response.data
                if (data.success) {
                    console.log("SUCCESS", data);
                    $('#invoice_description').val(data.data.description);
                    if (data.data.discount_type === 'fixed') {
                        $("#discount_amount").removeClass('d-none');
                        $("#discount_total").removeClass('d-none');
                        $(".label_discount_amount").removeClass('d-none');
                        $(".label_discount_total").removeClass('d-none');
                        $("input[id=discount_type][value=" + data.data.discount_type + "]")
                            .attr('checked', true)



                    } else {
                        $("#discount_amount").removeClass('d-none');
                        $("#discount_total").removeClass('d-none');
                        $(".label_discount_amount").removeClass('d-none');
                        $(".label_discount_total").removeClass('d-none');
                        $("input[id=discount_type][value=" + data.data.discount_type + "]")
                            .attr('checked', true)
                    }
                    $('#discount_amount').val(data.data.discount_amount);
                    $('#discount_total').val(data.data.discount_total);
                    $('#peso_rate').val(data.data.peso_rate);
                    $('textarea#notes').val(data.data.notes);
                    if (data.data.invoice_items.length > 0) {
                        data.data.invoice_items.map((item) => {
                            console.log(item.item_description + " " + item
                                .quantity +
                                " " + item.rate + " " + item.total_amount);
                            let wrapper = $('#show_items');
                            add_rows = '';
                            add_rows += '<div class="row row1">';

                            add_rows += '<div class="col-md-4 mb-3">';
                            add_rows += '<div class="form-group">';
                            add_rows +=
                                '<label class="formGroupExampleInput2">Item Desctiption</label>';
                            add_rows +=
                                '<input type="text" value=' + item
                                .item_description +
                                ' name="item_description" id="item_description" class="form-control item_description" />';
                            add_rows += '</div>';
                            add_rows += '</div>';

                            add_rows += '<div class="col-md-2 mb-3">';
                            add_rows += '<div class="form-group">';
                            add_rows +=
                                '<label class="formGroupExampleInput2">Quantity</label>';
                            add_rows +=
                                '<input type="text" value=' + PHP(item.quantity)
                                .format() +
                                ' step="any" maxlength="4" name="quantity" id="quantity" style="text-align:right;" class="form-control multi quantity" />';
                            add_rows += '</div>';
                            add_rows += ' </div>';

                            add_rows += '<div class="col-md-3 mb-3">';
                            add_rows += '<div class="form-group">';
                            add_rows +=
                                '<label class="formGroupExampleInput2" for="form3Example2">Rate</label>';
                            add_rows +=
                                '<input type="text" value=' + PHP(item.rate)
                                .format() +
                                ' step="any" name="rate" id="rate" style="text-align:right;" class="form-control multi rate" />';
                            add_rows += '</div>';
                            add_rows += '</div>';

                            add_rows += '<div class="col-md-2 mb-3">';
                            add_rows += '<div class="form-group">';
                            add_rows +=
                                '<label class="formGroupExampleInput2" for="form3Example2">Amount</label>';
                            // style="text-align:right;border:none;background-color:white"
                            add_rows +=
                                '<input type="text" value=' + PHP(item
                                    .total_amount)
                                .format() +
                                ' style="text-align:right;border:none;background-color:white" disabled name="amount" id="amount" class="form-control amount" />';
                            add_rows += '</div>';
                            add_rows += '</div>';

                            add_rows +=
                                '<div class="col-md-1 col-remove-item d-none">';
                            add_rows += '<div class="form-group">';
                            add_rows += '</br>';
                            add_rows +=
                                '<button class="btn remove_items" style="display: flex;justify-content: center;"><i class="fa fa-trash pe-1" style="color:red"></i></button>';
                            add_rows += '</div>';
                            add_rows += '</div>';

                            add_rows += '</div>'

                            $(wrapper).append(add_rows);

                            if ($('#show_items > .row').length > 1) {
                                $('#show_items > .row').each(function() {
                                    $(this).find('.col-remove-item')
                                        .removeClass('d-none');
                                })
                            } else {
                                $('#show_items > .row').find('.col-remove-item')
                                    .removeClass('d-none').addClass(
                                        'd-none');
                            }

                        })
                    }

                    if (data.data.deductions.length > 0) {
                        data.data.deductions.map((item2) => {
                            let wrapper = $('#show_deduction_items');
                            add_rows = '';
                            add_rows += '<div class="row mb-3">';
                            add_rows += '<div class="col-8">';
                            add_rows += '<div class="form-group w-100">';
                            add_rows +=
                                '<label class="formGroupExampleInput2">Deduction Type</label>';

                            add_rows +=
                                '<select class="form-control profile_deduction_type" id="profile_deduction_type" name="profile_deduction_type">';
                            add_rows += '<option value=' + item2.id +
                                '>' + item2
                                .profile_deduction_types.deduction_type
                                .deduction_name + '</option> ';
                            add_rows += '</select>';

                            add_rows += '</div>';
                            add_rows += '</div>';
                            add_rows += '<div class="col-4">';
                            add_rows += '<div class="form-group ">';
                            add_rows +=
                                '<label class="formGroupExampleInput2">Deduction Amount (Php)</label>';
                            add_rows +=
                                '<input type="text" value="' + PHP(item2.amount)
                                .format() +
                                '" style="text-align:right;" id="deduction_amount" name="deduction_amount" class="form-control multi2 deduction_amount" />';
                            add_rows += '</div>';
                            add_rows += '</div>';
                            add_rows += '</div>';

                            $(wrapper).append(add_rows);
                            return '';
                            // console.log("asdas", item2.profile_deduction_types);
                        })
                    } else {

                    }
                    // getResults_Converted();
                    displayResults();
                    Additems_total();
                    subtotal();
                    DeductionItems_total();

                    $('#grand_total').val(PHP(data.data.grand_total_amount).format());
                }
            }).catch(function(error) {
                console.log("ERROR", error);
            })
        }

    })

    function show_invoice() {
        let url = window.location.pathname;
        let urlSplit = url.split('/');
        if (urlSplit.length == 4) {
            let invoice_id = urlSplit[3];
            // console.log("invoice_id", invoice_id);
            apiUrl
            axios
                .get(apiUrl + '/api/admin/editInvoice/' + invoice_id, {
                    headers: {
                        Authorization: token,
                    },
                }).then(function(response) {
                    let data = response.data;
                    if (data.success) {
                        const month = ["January", "February", "March", "April", "May", "June",
                            "July",
                            "August", "September", "October", "November", "December"
                        ];
                        var newdate = new Date(data.data.created_at);
                        var mm = month[newdate.getMonth()];
                        var dd = newdate.getDate();
                        var yy = newdate.getFullYear();

                        $('#fullname').html(data.data.profile.user.first_name + " " + data.data
                            .profile.user
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
                            let balance_due = parseFloat(data.data.sub_total ? data.data.sub_total :
                                    0) +
                                parseFloat(data.data
                                    .discount_total ? data.data
                                    .discount_total : 0);
                            let converted_amount = parseFloat(data.data.converted_amount ? data.data
                                .converted_amount : 0);
                            $('#balance_due').html((balance_due)
                                .toLocaleString('en-US', {
                                    style: 'currency',
                                    currency: 'USD'
                                }));
                            data.data.invoice_items.map((item) => {
                                let tr = '<tr>';
                                tr += '<td class="scope">' + item.item_description + '</td>'
                                tr += '<td class="scope" style="text-align:end">' + item
                                    .quantity +
                                    '</td>'
                                tr += '<td class="scope" style="text-align:end">' + item
                                    .rate
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

                            let grand_total_amount = parseFloat(data.data.grand_total_amount ? data
                                .data
                                .grand_total_amount : 0);
                            // console.log("SUCCESS", PHP(data.data.grand_total_amount).format());

                            $('#grand_total_amount').html(grand_total_amount.toLocaleString(
                                'en-US', {
                                    style: 'currency',
                                    currency: 'PHP'
                                }));

                            if (data.data.deductions.length > 0) {
                                data.data.deductions.map((item) => {
                                    let deduction_amount = parseFloat(item
                                        .profile_deduction_types
                                        .amount ? item.profile_deduction_types.amount :
                                        0);
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

                        } else {
                            $("#table_invoiceItems tbody").append(
                                '<tr><td colspan="4" class="text-center">No data</td></tr>');
                        }
                    }
                }).catch(function(error) {
                    console.log("ERROR", error);
                });
        }

    }
})
</script>
@endsection