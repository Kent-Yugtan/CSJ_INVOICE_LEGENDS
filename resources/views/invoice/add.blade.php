@extends('layouts.master')
@section('content-dashboard')

<div class="container-fluid pt-0">
    <h1 class="mt-0"></h1>
    <ol class="breadcrumb mb-3"></ol>
    <div class="row whole_row">
        <!-- <form id="invoice_items"> -->
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
                                <label class="formGroupExampleInput2">Invoice #</label>
                                <input id="invoice_no" style="font-weight: bold;border:none;background-color:white"
                                    disabled name="invoice_no" type="text" class="form-control">
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col">
                                    <div class=" form-group">
                                        <label class=" formGroupExampleInput2">Description</label>
                                        <input id="description" name="description" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="show_items">
                            <div class="col-12 mb-3">
                                <div class="row">
                                    <!-- FOR TABLE INVOICE DESCRIPTION DISPLAY -->
                                </div>
                            </div>
                        </div>

                        <div class="col-8 mb-3">

                        </div>
                        <div class="col-4 mb-3">
                            <div class="row">
                                <div class="col-4 md-2 w-100">
                                    <div class="form-group">
                                        </br>
                                        <button class="btn btn-secondary"
                                            style="width:100%;color:white; background-color: #CF8029;" id="add_item">Add
                                            Item</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group text-center">
                                        <label class="formGroupExampleInput2">Discount Type</label>
                                        <br>
                                        <input class="form-check-input" type="radio" name="discount_type"
                                            id="discount_type" value="fixed">
                                        <label class="discount_type formGroupExampleInput2">
                                            Fxd &nbsp; &nbsp;
                                        </label>
                                        <input class="discount_type form-check-input" type="radio" name="discount_type"
                                            id="discount_type" value="percentage">
                                        <label class="formGroupExampleInput2">
                                            %
                                        </label>
                                        <!-- <input type="text" id="discount_type" class="form-control" /> -->

                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group">
                                        <label class="formGroupExampleInput2">Discount Amount</label>
                                        <input type="text" style="text-align:right"
                                            onkeypress="return onlyNumberKey(event)" id="discount_amount"
                                            class="form-control" />
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label class="formGroupExampleInput2" for="form3Example2">Discount Total</label>
                                        <input type="text" style="text-align:right"
                                            onkeypress="return onlyNumberKey(event)" id="discount_total"
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
                                        <label>Subtotal: <label>
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
                                            onkeypress="return onlyNumberKey(event)" id="peso_rate" class="form-control"
                                            disabled />
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

                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col">
                                    <h3> DEDUCTIONS </h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mb-3">
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
                                        <input type="Number" onkeypress="return onlyNumberKey(event)"
                                            id="deduction_amount" class="form-control" />
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
                                        <input type="Number" onkeypress="return onlyNumberKey(event)"
                                            id="deduction_amount" class="form-control" />
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
                                        <input type="Number" onkeypress="return onlyNumberKey(event)"
                                            id="deduction_amount" class="form-control" />

                                    </div>
                                </div>
                            </div>
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
                                <div class="col mb-3" style="justify-content:end;display:flex">
                                    <!-- border-style:none -->
                                    <label>Total: <label>
                                            <input type="text" id="total" class="form-control no-outline">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-6 px-2 w-25">
                <div class="card shadow p-2 mb-5 bg-white rounded " style="width: 100%; height:35vh">
                    <!-- <div class="card-header">Profile Information</div> -->
                    <div class="row mt-3">
                        <div class="col g-5">
                            <div class="pb-3">
                                <button type="button" class="btn btn-secondary w-100"
                                    style="color:White; background-color:#CF8029;">Save</button>
                            </div>
                            <div>
                                <button type="button" class="btn btn-secondary w-100"
                                    style=" color:#CF8029; background-color:white; "
                                    data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- </form> -->
        </div>
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
    $(document).ready(function() {
        const api = "https://api.exchangerate-api.com/v4/latest/USD";
        let x = 1;
        let toast1 = $('.toast1');

        display_rows();

        toast1.toast({
            delay: 5000,
            animation: true
        });

        $('.close').on('click', function(e) {
            e.preventDefault();
            toast1.toast('hide');
        })

        $("#error_msg").hide();
        $("#success_msg").hide();

        $('.close').on('click', function(e) {
            e.preventDefault();
            toast1.toast('hide');
        })



        $('input[type=radio][id=discount_type]').change(function() {
            if (this.value == 'fixed') {
                //write your logic here
                console.log("fixed");

            } else if (this.value == 'percentage') {
                //write your logic here
                console.log("percentage");
            }
        })

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
            $('#peso_rate').val(peso_rate);
            $('#converted_amount').val(converted_amount);
        }

        // FUNCTION FOR KEYUP CLASS MULTI INPUTS
        $('#show_items').on("keyup", ".multi", function() {
            let sub_total = 0;
            let parent = $(this).closest('.row');
            let quantity = parent.find('.quantity').val() ? parent.find('.quantity').val() :
                0;
            let rate = parent.find('.rate').val() ? parent.find('.rate').val() : 0;
            sub_total = parseFloat(quantity) * parseFloat(rate);
            parent.find('.amount').val(sub_total.toFixed(2));
            GrandTotal();
            getResults_Converted();
        });

        // FUNCTION FOR DISPLAYING SUBTOTAL AMOUNT AND DOLLAR AMOUNT
        function GrandTotal() {
            var sum = 0;
            $('#show_items .amount').each(function() {
                sum += Number($(this).val());
            });
            $('#subtotal').val(sum.toFixed(2));
            $('#dollar_amount').val(sum.toFixed(2));
        }

        // FUNCTION CLICK FOR REMOVING INVOICE ITEMS ROWS
        $(document).on('click', '.remove_items', function(e) {
            e.preventDefault();
            let parent = $(this).closest('.row');
            let sub_total = parent.find('.subtotal').val();
            let row_item = $(this).parent().parent().parent();
            console.log("subTOTAL", sub_total);
            $(row_item).remove();
            x--;
            GrandTotal();
            getResults_Converted();

            if ($('#show_items > .row').length === 1) {
                $('#show_items > .row').find('.col-remove-item').removeClass('d-none')
                    .addClass(
                        'd-none');
            }
        });

        // FUNCTION CLICK FOR DISPLAY INVOICE ITEM ROWS
        $("#add_item").click(function(e) {
            e.preventDefault();
            display_rows()
        });


        // INITIALIZE DISPLAY ROWS
        function display_rows() {
            let max_fields = 10;
            let wrapper = $('#show_items');
            add_rows = '';
            add_rows += '<div class="row">';

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
                '<input type="number" name="quantity" id="quantity" style="text-align:right;" class="form-control multi quantity" />';
            add_rows += '</div>';
            add_rows += ' </div>';

            add_rows += '<div class="col-md-2 mb-3">';
            add_rows += '<div class="form-group">';
            add_rows += '<label class="formGroupExampleInput2" for="form3Example2">Rate</label>';
            add_rows +=
                '<input type="text" name="rate" id="rate" style="text-align:right;" class="form-control multi rate" />';
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
    function check_profile() {
        let toast1 = $('.toast1');
        axios
            .get(apiUrl + '/api/invoice/createinvoice', {
                headers: {
                    Authorization: token,
                }
            }).then(function(response) {
                let data = response.data;
                console.log("response", data);

                if (!data.success) {
                    console.log("TRUE", data.success);

                    $('.whole_row').addClass('d-none');
                    $('.toast1 .toast-title').html('Invoices');
                    $('.toast1 .toast-body').html(data.message);
                    toast1.toast('show');

                } else {
                    $('.whole_row').removeClass('d-none');
                    $('#profile_id').val(data.data.id);
                    $('#invoice_no').val(data.invoice_no);
                }

            }).catch(function(error) {
                console.log("error", error);
            });
    }
    check_profile();
    </script>

    @endsection