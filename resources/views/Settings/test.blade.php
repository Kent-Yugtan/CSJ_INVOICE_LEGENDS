<script type="text/javascript">
$(document).ready(function() {
    show_data();

    $('#button-submit').on('click', function() {
        let search = $('#search').val();
        show_data({
            search
        });
    })

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

    function show_data(filters) {
        let filter = {
            page_size: 10,
            page: 1,
            ...filters,
        }
        $('#datatablesSimple tbody').empty();
        axios.get(`${apiUrl}/api/settings/show_data?${new URLSearchParams(filter)}`, {
                headers: {
                    Authorization: token,
                },
            })
            .then(function(res) {
                res = res.data;
                if (res.success) {
                    if (res.data.data.length > 0) {
                        res.data.data.map((item) => {
                            let tr = '<tr>';
                            tr += '<td style="width:40%;">' + item.invoice_no + '</td>';
                            tr += '<td style="width:5%;" class="text-end">' + item.desription +
                                '</td>';
                            tr += '<td style="width:40%;">' + item.item_description + '</td>';
                            tr += '<td style="width:40%;">' + item.quantitiy + '</td>';
                            .toFixed(2) +
                                '</td>';
                            tr +=
                                '<td style="width:45%;" class="text-center"> <button value=' + item
                                .id +
                                ' class="editButton btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#action1" >Edit</button> </td>';
                            tr += '</tr>';
                            $("#table_deduction tbody").append(tr);

                            return ''
                        })

                        $('#tbl_pagination').empty();
                        res.data.links.map(item => {
                            let li =
                                `<li class="page-item cursor-pointer ${item.active ? 'active':''}"><a class="page-link" data-url="${item.url}">${item.label}</a></li>`
                            $('#tbl_pagination').append(li)
                            return ""
                        })

                        $("#tbl_pagination .page-item .page-link").on('click', function() {
                            let url = $(this).data('url')
                            $.urlParam = function(name) {
                                var results = new RegExp("[?&]" + name + "=([^&#]*)").exec(
                                    url
                                );

                                return results !== null ? results[1] || 0 : false;
                            };

                            let search = $('#search').val();
                            show_data({
                                search,
                                page: $.urlParam('page')
                            });
                        })

                        let tbl_user_showing =
                            `Showing ${res.data.from} to ${res.data.to} of ${res.data.total} entries`;
                        $('#tbl_showing').html(tbl_user_showing);
                    } else {
                        $("#tbl_user tbody").append(
                            '<tr><td colspan="6" class="text-center">No data</td></tr>');
                    }
                }
            })
            .catch(function(error) {
                console.log("catch error", error);
            });

    }

    $('#CreateInvoice').submit(function(e) {
        e.preventDefault();

        let invoice_no = $("#invoice_no").val();
        let description = $("#description").val();

        let data = {
            invoice_no: invoice_no,
            description: description,
        };

        axios
            .post(apiUrl + "/api/savedeductiontype", data, {
                headers: {
                    Authorization: token,
                },
            })
            .then(function(response) {
                // console.log("then", response.data.success);
                let data = response.data;
                if (data.success) {
                    // console.log('success', data.data.message);
                    $('#invoice_no').val('');
                    $('#description').val('');

                    $('.toast1 .toast-title').html('Create Invoice');
                    $('.toast1 .toast-body').html(response.data.message);
                    toast1.toast('show');
                    show_data();
                }
            })
            .catch(function(error) {
                if (error.response.data.errors) {
                    let errors = error.response.data.errors;
                    let fieldnames = Object.keys(errors);
                    Object.values(errors).map((item, index) => {
                        fieldname = fieldnames[0].split('_');
                        fieldname.map((item2, index2) => {
                            fieldname['key'] = capitalize(item2);
                            return ""
                        });
                        fieldname = fieldname.join(" ");
                        $('.toast1 .toast-title').html(fieldname);
                        $('.toast1 .toast-body').html(Object.values(errors)[0].join(
                            "\n\r"));
                    })
                    toast1.toast('show');
                }
            });
    })

    $(document).on('click', '.editButton', function(e) {
        e.preventDefault();
        let id = $(this).val();
        $('#createinvoice1').val(id);

        axios
            .get(apiUrl + '/api/settings/show_edit/' + id, {
                headers: {
                    Authorization: token,
                },
            })
            .then(function(response) {
                let data = response.data;
                console.log("SUCCESS", data.data);
                if (data.success) {

                    $('#invoice_no').val(data.data.deduction_name);
                    $('#description').val(data.data.deduction_amount);

                } else {
                    console.log("ERROR");
                }

            }).catch(function(error) {
                console.log("ERROR", error);
            });
    })

    $('#action1').submit(function(e) {
        e.preventDefault();

        let edit_invoice_no = $('#edit_invoice_no').val();
        let edit_description = $("#edit_deduction_name").val();
        let deduction_amount = $("#edit_deduction_amount").val();

        let data = {
            id: deduction_id,
            deduction_name: deduction_name,
            deduction_amount: deduction_amount,
        };

        axios
            .post(apiUrl + "/api/savedeductiontype", data, {
                headers: {
                    Authorization: token,
                },
            })
            .then(function(response) {
                // console.log("then", response.data.success);
                let data = response.data;
                if (data.success) {

                    $('#edit_invoice_no').val('');
                    $('#edit_description').val('');

                    $('.toast1 .toast-title').html('Deduction Types');
                    $('.toast1 .toast-body').html(response.data.message);
                    toast1.toast('show');
                    show_data();
                    console.log('success', data.data);
                }
            })
            .catch(function(error) {
                if (error.response.data.errors) {
                    let errors = error.response.data.errors;
                    console.log("error", errors);
                    let fieldnames = Object.keys(errors);
                    Object.values(errors).map((item, index) => {
                        fieldname = fieldnames[0].split('_');
                        fieldname.map((item2, index2) => {
                            fieldname['key'] = capitalize(item2);
                            return ""
                        });
                        fieldname = fieldname.join(" ");
                        $('.toast1 .toast-title').html(fieldname);
                        $('.toast1 .toast-body').html(Object.values(errors)[0].join(
                            "\n\r"));
                    })
                    toast1.toast('show');
                }
            });
    })
});

function capitalize(s) {
    if (typeof s !== 'string') return "";
    return s.charAt(0).toUpperCase() + s.slice(1);
}
</script>