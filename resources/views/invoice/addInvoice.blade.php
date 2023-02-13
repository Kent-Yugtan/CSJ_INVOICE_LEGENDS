@extends('layouts.master')
@section('content-dashboard')



  
<div class="container-fluid pt-0">
    <h1 class="mt-0"></h1>
    <ol class="breadcrumb mb-3"></ol>
    
        <form id="invoice_items">
            @csrf
            <div class="row px-4 pb-4" id="header">
                <div class="col-md-6 px-2 w-75">
                    <div class="card shadow p-2 mb-5 bg-white rounded">
                        <div class="my-3 mx-3">
                            <h3> Add Invoice </h3>
                        </div>
                        <div class="row px-4 pb-4" id="header">
                            <div class="col-12 mb-3">
                                <input id="profile_id" name="profile_id" type="text" hidden>
                                <div class="form-group w-50">
                                    <label class="formGroupExampleInput2">Profile</label>
                                    <input id="invoice_no" style="font-weight: bold;border:none;background-color:white"
                                        disabled name="invoice_no" type="text" class="form-control">
                                </div>
                            </div>

                            <div class="col-12 mb-3">
                                <div class="row">
                                    <div class="col">
                                        <div class=" form-group">
                                            <label class=" formGroupExampleInput2">Description</label>
                                            <input id="invoice_description" name="invoice_description" type="text"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12" id="show_items">
                                <!-- FOR TABLE INVOICE DESCRIPTION DISPLAY -->
                            </div>

                            
                                
                                  
                            <div class="row mb-4">
                                <div class="col-sm-8"></div>
                                <div class="col-sm-4"><button class="btn btn-secondary"
                                    style="width:100%;color:white; background-color: #CF8029;"
                                    id="add_item">Add
                                    Item</button></div>
                              </div>
                               
                            <div class="col-12 mb-3">
                                <div class="row">
                                    <div class="col"
                                        style="display: flex;flex-direction: column-reverse;align-items: center;">
                                        <div class="form-group">
                                            <label class="formGroupExampleInput2">Discount Type</label>
                                            <br>
                                            <input class="form-check-input" type="radio" name="discount_type"
                                                id="discount_type" value="fixed">
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
                                            <label class="formGroupExampleInput2 label_discount_amount">Discount
                                                Amount ($)</label>
                                            <input type="number" step="any" style="text-align:right;"
                                                name="discount_amount" id="discount_amount" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="formGroupExampleInput2 label_discount_total">Discount
                                                Total ($)</label>
                                            <input type="text" disabled
                                                style="text-align:right; border:0px;background-color:white;"
                                                onkeypress="return onlyNumberKey(event)" name="discount_total"
                                                id="discount_total" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mb-3">
                                <div class="row">
                                    <div class="col-12 my-3" style="justify-content:end;display:flex">
                                        <div class="form-group">
                                            <!-- border-style:none -->
                                            <label>Subtotal ($): <label>
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
                                            <label class="formGroupExampleInput2">Dollar Amount ($)</label>
                                            <input type="text" id="dollar_amount"
                                                style="font-weight: bold;border:none; text-align:right;background-color:white"
                                                class="form-control dollar_amount" disabled />

                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label class="formGroupExampleInput2">Peso Rate (Php)</label>
                                            <input type="text"
                                                style="font-weight: bold;border:none; text-align:right;background-color:white"
                                                onkeypress="return onlyNumberKey(event)" id="peso_rate"
                                                class="form-control" disabled />
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="formGroupExampleInput2" for="form3Example2">Converted
                                                Amount</label>
                                            <input type="text"
                                                style="font-weight: bold;border:none; text-align:right;background-color:white"
                                                onkeypress="return onlyNumberKey(event)" id="converted_amount"
                                                class="form-control converted_amount" disabled />
                                        </div>
                                    </div>
                                </div>
                            </div>

                           


                            <div class="row">
                                <div class="col">
                                 <h3> Deductions </h3>
                                </div>
                                <div class="col-6">
                                 
                                </div>
                                <div class="col">
                                  
                                </div>
                              </div>
                              <div class="row">
                                <div class="col">
                                  
                                </div>
                                <div class="col-5"style="text-align:end">
                                  <h5> Grand Total <h5>
                                </div>
                                <div class="col">
                                  
                                </div>
                              </div>

                            <div class="col-12" id="show_deduction_items">

                    
                            </div>

                            <!-- <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="form-group w-100">
                                        <label class="formGroupExampleInput2">Deduction Type</label>
                                        <input type="text" id="deduction_type" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group ">
                                        <label class="formGroupExampleInput2">Deduction Amount</label>
                                        <input type="Number" onkeypress="return onlyNumberKey(event)" id="deduction_amount" class="form-control" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mb-3">
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
                                        <input type="Number" onkeypress="return onlyNumberKey(event)" id="deduction_amount" class="form-control" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col-8 mb-3">
                                    <div class="form-group w-100">
                                        <label class="formGroupExampleInput2">Deduction Type</label>
                                        <input type="text" id="deduction_type" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-4 mb-3">
                                    <div class="form-group">
                                        <label class="formGroupExampleInput2">Deduction Amount</label>
                                        <input type="Number" onkeypress="return onlyNumberKey(event)" id="deduction_amount" class="form-control" />

                                    </div>
                                </div>
                            </div>
                        </div> -->

                            <div class="col-12 mb-3">
                                <div class="row">
                                    <div class="col-8"></div>
                                    <div class="col-4 text-center mb-3">
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mb-3">
                                <div class="row">
                                    <div class="col-8" style="text-align:right;">
                                        <label style="vertical-align: -webkit-baseline-middle">Total: <label>
                                    </div>
                                    <div class="col-4 mb-3" style="justify-content:end;display:flex">
                                        <!-- border-style:none -->
                                        <input type="text" id="grand_total" class="form-control no-outline"
                                            style="text-align:right;border:0;background-color:white;" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mb-3">
                                <div class="row">
                                    <div class="col-12 form-control">
                                        <label for="floatingTextarea">Comments</label>
                                        <textarea class="form-control" placeholder="Leave a comment here" id="notes"
                                            name="notes"></textarea>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                
                <div class="row-md-6 w-25 px-2">
                    <div class="card-responsive-md shadow p-2  bg-white rounded " style="width: 100%; height:120px">              
                                <div class="pb-3">
                                    <button type="submit" class="btn btn-secondary w-100"
                                        style="color:White; background-color:#CF8029;">Save</button>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-secondary w-100"
                                        style=" color:#CF8029; background-color:white; "
                                        data-bs-dismiss="modal">Close</button></div>
                </div>
            </div>
        </form
</div>

<div style="position: fixed; top: 60px; right: 20px;">
    <div class="toast toast1 toast-bootstrap" role=" alert" aria-live="assertive" aria-atomic="true">
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


<script type="text/javascript">
let total_deduction_amount = 0
let x = 1;
$(document).ready(function() {
    const api = "https://api.exchangerate-api.com/v4/latest/USD";

    display_item_rows();

    let toast1 = $('.toast1');
    toast1.toast({
        delay: 3000,
        animation: true
    });

    $('.close').on('click', function(e) {
        e.preventDefault();
        toast1.toast('hide');
    })

    $("#error_msg").hide();
    $("#success_msg").hide();

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
                $('#discount_total').val('0.00');

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

    $('#discount_amount').on('keyup', function() {
        subtotal();
    })

    $('#discount_amount').focusout(function() {
        if ($('#discount_amount').val() == "") {
            $('#discount_amount').val('0.00');
        }
    })

    function subtotal() {
        let discount_type = $("input[id='discount_type']:checked").val();
        let discount_amount = $('#discount_amount').val();
        let discount_total = $('#discount_total').val();
        let subtotal = $('#subtotal').val();
        var sum = 0;

        $('#show_items .amount').each(function() {
            sum += Number($(this).val());
        });

        if (discount_type == 'fixed') {
            $('#discount_total').val((parseFloat(discount_amount ? discount_amount : 0) * 1).toFixed(2));
            $('#subtotal').val((sum - $('#discount_total').val()).toFixed(2));
            $('#dollar_amount').val($('#subtotal').val());
            DeductionItems_total()
        } else if (discount_type == 'percentage') {
            $('#discount_total').val(((parseFloat(discount_amount ? discount_amount : 0) / 100) * parseFloat(
                sum)).toFixed(2));
            $('#subtotal').val((parseFloat(sum) - $('#discount_total').val()).toFixed(2));
            $('#dollar_amount').val($('#subtotal').val());
            DeductionItems_total()
        }
        getResults_Converted();

    }

    // FUNCTION FOR DISPLAY RESULTS AND CONVERTED AMOUNT
    function getResults_Converted() {
        fetch(`${api}`)
            .then(currency => {
                return currency.json();
            }).then(displayResults);
    }

    // FUNCTION FOR DISPLAY RESULTS AND CONVERTED AMOUNT
    function displayResults(currency) {
        let dollar_amount = $("#dollar_amount").val();
        let peso_rate = 0;
        let converted_amount = 0;
        let fromRate = currency.rates['USD'];
        let toRate = currency.rates['PHP'];
        peso_rate = (toRate / fromRate).toFixed(2);
        converted_amount = ((toRate / fromRate) * dollar_amount).toFixed(2);
        $('#peso_rate').val(parseFloat(peso_rate).toFixed(2));
        $('#converted_amount').val(parseFloat(converted_amount).toFixed(2));
        // $('#grand_total').val((converted_amount - total_deduction_amount).toFixed(
        //     2));
    }

    // FUNCTION FOR KEYUP CLASS DEDUCTIONS FOR DEDUCTIONS
    $('#show_deduction_items').on("keyup", ".multi2", function() {
        let grand_total = 0;
        let parent = $(this).closest('.row');
        let deduction_amount = parent.find('.deduction_amount').val() ? parent.find(
                '.deduction_amount')
            .val() : 0;
        // grand_total = parseFloat($('#converted_amount').val()) - parseFloat(deduction_amount);
        // $('#grand_total').val(grand_total.toFixed(2));
        DeductionItems_total();

    });

    // FUNCTION FOR KEYUP CLASS MULTI INPUTS FOR ADD ITEMS
    $('#show_items').on("keyup", ".multi", function() {
        let sub_total = 0;
        let parent = $(this).closest('.row');
        let quantity = parent.find('.quantity').val() ? parent.find('.quantity').val() : 0;
        let rate = parent.find('.rate').val() ? parent.find('.rate').val() : 0;
        sub_total = parseFloat(quantity) * parseFloat(rate);
        parent.find('.amount').val(parseFloat(sub_total).toFixed(2));
        getResults_Converted();
        Additems_total();
        subtotal();
        DeductionItems_total();
    });

    // FUNCTION FOR DISPLAYING SUBTOTAL AMOUNT AND DOLLAR AMOUNT
    function Additems_total() {
        var sum = 0;
        let converted_amount = 0;
        $('#show_items .amount').each(function() {
            sum += Number($(this).val());
        });
        $('#subtotal').val(parseFloat(sum).toFixed(2));
        $('#dollar_amount').val(parseFloat(sum).toFixed(2));

    }

    // FUNCTION FOR CALCUTAION DEDUCTIONS
    function DeductionItems_total() {
        var sum = 0;
        let converted_amount = 0;
        let dollar_amount = 0;
        let converted_amount_input = 0;
        let peso_rate = 0;
        $('#show_deduction_items .deduction_amount').each(function() {
            sum += Number($(this).val());
        })

        $('#show_items .amount').each(function() {
            converted_amount += Number($(this).val());
        });

        dollar_amount = $('#dollar_amount').val();
        peso_rate = $('#peso_rate').val();
        converted_amount_input = (parseFloat(dollar_amount) * parseFloat(peso_rate));
        $('#grand_total').val((parseFloat(converted_amount_input) - parseFloat(sum)).toFixed(2));
    }

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
        getResults_Converted();
        Additems_total();
        subtotal();
        DeductionItems_total();
        x--;
    });

    // FUNCTION CLICK FOR DISPLAY INVOICE ITEM ROWS
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
            '<input type="number" step="any" name="quantity" id="quantity" style="text-align:right;" class="form-control multi quantity" />';
        add_rows += '</div>';
        add_rows += ' </div>';

        add_rows += '<div class="col-md-2 mb-3">';
        add_rows += '<div class="form-group">';
        add_rows += '<label class="formGroupExampleInput2" for="form3Example2">Rate</label>';
        add_rows +=
            '<input type="number" step="any" name="rate" id="rate" style="text-align:right;" class="form-control multi rate" />';
        add_rows += '</div>';
        add_rows += '</div>';

        add_rows += '<div class="col-md-3 mb-3">';
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

});

// ONLY NUMBERS FOR NUMBER INPUTS
function onlyNumberKey(evt) {
    // Only ASCII character in that range allowed
    var ASCIICode = (evt.which) ? evt.which : evt.keyCode
    if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
        return false;
    return true;
}

// GET INVOICE NUMBER

// CHECK IF THE USER HAVE THE PROFILE
check_profile();

function check_profile() {
    let toast1 = $('.toast1');
    axios
        .get(apiUrl + '/api/invoice/createinvoice', {
            headers: {
                Authorization: token,
            }
        }).then(function(response) {
            let data = response.data;
            // console.log("response", data);

            if (!data.success) {

                $('.whole_row').addClass('d-none');
                $('.toast1 .toast-title').html('Invoices');
                $('.toast1 .toast-body').html(data.message);
                toast1.toast('show');

            } else {
                let deduction_count = data.data.profile_deduction_types.length;
                if (deduction_count > 0) {
                    data.data.profile_deduction_types.map((item) => {
                        let wrapper = $('#show_deduction_items');
                        add_rows = '';
                        add_rows += '<div class="row mb-3">';
                        add_rows += '<div class="col-8">';
                        add_rows += '<div class="form-group w-100">';
                        add_rows += '<label class="formGroupExampleInput2">Deduction Type</label>';

                        add_rows +=
                            '<select class="form-control deduction_type" id="deduction_type" name="deduction_type">';
                        add_rows += '<option value=' + item.deduction_type.id + '>' + item.deduction_type
                            .deduction_name + '</option> ';
                        add_rows += '</select>';

                        // add_rows += '<input type="text" id="deduction_type" value="' + item
                        //     .deduction_type.deduction_name + '" class="form-control" disabled />';

                        add_rows += '</div>';
                        add_rows += '</div>';
                        add_rows += '<div class="col-4">';
                        add_rows += '<div class="form-group ">';
                        add_rows += '<label class="formGroupExampleInput2">Deduction Amount</label>';
                        add_rows +=
                            '<input type="Number" value="' + item
                            .deduction_type.deduction_amount +
                            '" onkeypress="return onlyNumberKey(event)" style="text-align:right;" id="deduction_amount" name="deduction_amount" class="form-control multi2 deduction_amount" />';
                        add_rows += '</div>';
                        add_rows += '</div>';
                        add_rows += '</div>';

                        $(wrapper).append(add_rows);
                        return '';
                    })
                    $('.whole_row').removeClass('d-none');
                    $('#profile_id').val(data.data.id);
                    $('#invoice_no').val(data.invoice_no);

                    // console.log("deduction_count", deduction_count);
                }
            }

        }).catch(function(error) {
            console.log("error", error);
        });




    $('#invoice_items').on('submit', function(e) {
        let toast1 = $('.toast1');
        e.preventDefault();

        // CONDITION IF THERE IS BLANK ROW
        $('#show_items .row1').each(function() {
            let parent = $(this).closest('.row1');
            let row_item = $(this).parent();
            let item_rate = $(this).find('.rate').val();
            let item_qty = $(this).find('.quantity').val();

            if (item_rate == "" && item_qty == "") {

                // console.log("row_item", parent);

                if ($('#show_items > .row').length === 1) {
                    $('#show_items > .row').find('.col-remove-item').removeClass('d-none')
                        .addClass(
                            'd-none');
                } else {
                    $(parent).remove();
                }
            }
            x--;
        });

        let profile_id = $('#profile_id').val();
        let invoice_no = $('#invoice_no').val();
        // INVOICE TABLE
        let invoice_description = $('#invoice_description').val();
        let invoice_subtotal = $('#subtotal').val();
        let invoice_converted_amount = $('#converted_amount').val();
        let invoice_discount_type = $('#discount_type:checked').val();
        let invoice_discount_amount = $('#discount_amount').val();
        let invoice_discount_total = $('#discount_total').val();
        let invoice_total_amount = $('#grand_total').val();
        let invoice_notes = $('#notes').val();

        // INVOICE ITEMS TABLE
        let invoiceItem = [];
        $('#show_items .row').each(function() {
            let item_description = $(this).find('.item_description').val();
            let item_rate = $(this).find('.rate').val();
            let item_qty = $(this).find('.quantity').val();
            let item_total_amount = $(this).find('.amount').val();

            invoiceItem.push({
                item_description,
                item_rate,
                item_qty,
                item_total_amount,
            })
        });

        // DEDUCTIONS TABLE
        let Deductions = [];
        $('#show_deduction_items .row').each(function() {
            let profile_deduction_type_id = $(this).find('.deduction_type').val();
            let deduction_amount = $(this).find('.deduction_amount').val();

            Deductions.push({
                profile_deduction_type_id,
                deduction_amount,
            })

        });

        let data = {
            profile_id: profile_id,
            invoice_no: invoice_no,
            description: invoice_description,
            sub_total: invoice_subtotal,
            converted_amount: invoice_converted_amount,
            discount_type: invoice_discount_type,
            discount_amount: invoice_discount_amount,
            discount_total: invoice_discount_total,
            grand_total_amount: invoice_total_amount,
            notes: invoice_notes,
            invoiceItem,
            Deductions,
        }
        console.log("Deductions", Deductions);

        // axios.
        // post(apiUrl + "/api/createinvoice", data, {
        //     headers: {
        //         Authorization: token
        //     },
        // }).then(function(response) {
        //     let data = response.data;
        //     if (data.success) {

        //         $('.toast1 .toast-title').html('Create Invoices');
        //         $('.toast1 .toast-body').html(response.data.message);
        //         toast1.toast('show');
        //         refresh();
        //     }
        // }).catch(function(error) {
        //     if (error.response.data.errors) {
        //         let errors = error.response.data.errors;
        //         let fieldnames = Object.keys(errors);

        //         Object.values(errors).map((item, index) => {
        //             fieldname = fieldnames[0].split('_');
        //             fieldname.map((item2, index2) => {
        //                 fieldname['key'] = capitalize(item2);
        //                 return ""
        //             });
        //             fieldname = fieldname.join(" ");

        //             $('.toast1 .toast-title').html(fieldname);
        //             $('.toast1 .toast-body').html(Object.values(errors)[0].join(
        //                 "\n\r"));
        //         })
        //         toast1.toast('show');
        //     }
        // });

        // function refresh() {
        //     setTimeout(function() {
        //         location.reload()
        //     }, 3000);
        // }

    });

    function capitalize(s) {
        if (typeof s !== 'string') return "";
        return s.charAt(0).toUpperCase() + s.slice(1);
    }
}
</script>

@endsection