@extends('layouts.master')
@section('content-dashboard')
<div class="container-fluid px-4 pb-4" id="loader_load">
  <h1 class="mt-0">Deductions</h1>
  <ol class="breadcrumb mb-3"></ol>
  <div class="row mt-5">
    <div class="col-md-8 px-2">
      <button class="btn w-50" style="color:white; background-color: #CF8029; margin-top:5px" data-bs-toggle="modal" data-bs-target="#addModal" type="submit" id="button-addon2">
        <i class="fa fa-plus pe-1"></i>
        Add Deduction Type
      </button>
      <div class="row mt-3 w-75">
        <div class="col">
          <div class="w-100">
            <input id="search" type="text" class="form-control form-check-inline" placeholder="Search">
          </div>
        </div>
        <div class="col">
          <button type="button" class="btn w-100" style=" color:white; background-color: #CF8029;width:30%" id="button_search">Search</button>
        </div>
      </div>

      <div class="card shadow mt-3 bg-white rounded w-75 h-100">
        <div class="card-body table-responsive ">
          <table style="color: #A4A6B3;" class="table " id="table_deduction">
            <thead>
              <th>Deduction Name</th>
              <th>Amount</th>
              <th class=" text-center">Action</th>

            </thead>
            <tbody></tbody>
          </table>
        </div>
        <div class="mx-3 table-responsive" style="display: flex; justify-content: space-between;">
          <div class="page_showing" id="tbl_showing"></div>
          <ul class="pagination pagination-sm" id="tbl_pagination"></ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- START MODAL ADD -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-dialog">
      <div class="modal-content ">
        <div class="modal-body ">
          <div class="row">
            <h5> Create Deduction Type </h5>
            <form id="deductiontype_store">
              @csrf
              <div class="form-group mt-3">
                <label for="formGroupExampleInput">Deduction Name</label>
                <input id="deduction_name" type="text" class="form-control" placeholder="Deduction Name">
              </div>

              <div class="form-group">
                <label for="formGroupExampleInput">Amount</label>
                <input id="deduction_amount" type="text" class="form-control" placeholder="Amount">

                <div class="row mt-3">
                  <div class="col">
                    <button type="button" class="btn btn-secondary w-100" style=" color:#CF8029; background-color:white; " data-bs-dismiss="modal">Close</button>
                  </div>
                  <div class="col">
                    <button type="submit" class="btn btn-secondary w-100" style="color:White; background-color:#CF8029; ">Save</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END MODAL ADD -->

<!-- START MODAL EDIT -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-dialog">
      <div class="modal-content ">
        <div class="modal-body ">
          <div class="row">
            <h5> Update Deduction Type </h5>
            <form id="deductiontype_update">
              @csrf
              <input type="text" id="deduction_id" hidden>

              <div class="form-group mt-3">
                <label for="formGroupExampleInput">Deduction Name</label>
                <input id="edit_deduction_name" type="text" class="form-control" placeholder="Deduction Name">
              </div>

              <div class="form-group">
                <label for="formGroupExampleInput">Amount</label>
                <input id="edit_deduction_amount" type="text" class="form-control" placeholder="Amount">

                <div class="row mt-3">
                  <div class="col">
                    <button type="button" class="btn btn-secondary w-100" style=" color:#CF8029; background-color:white; " data-bs-dismiss="modal">Close</button>
                  </div>
                  <div class="col">
                    <button type="submit" class="btn btn-secondary w-100" style="color:White; background-color:#CF8029; ">Update</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- END MODAL EDIT -->
<div style="position: fixed; top: 60px; right: 20px;">
  <div class="toast toast1 toast-bootstrap" role="alert" aria-live="assertive" aria-atomic="true">
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

<!-- Modal FOR DELETE -->
<div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <div class="row">
          <div class="col">
            <span>
              <img class="img-team" src="{{ URL('images/Delete.png')}}" style="width: 50%; padding:10px" />
            </span>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <span>
              <h3> Are you sure?</h3>
            </span>
          </div>
        </div>
        <div class="row pt-3 px-3">
          <div class="col">
            <span id="deductionType_id" hidden></span>
            <span class="text-muted"> Do you really want to delete these record? This process cannot be
              undone.</span>
          </div>
        </div>

        <div class="row pt-3 pb-3 px-3">
          <div class="col-6">
            <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Cancel</button>
          </div>
          <div class="col-6">
            <button type="button" id="deductionType_delete" class="btn btn-danger w-100">Delete</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="spanner">
  <div class="loader"></div>
</div>
<script type="text/javascript">
  const PHP = value => currency(value, {
    symbol: '',
    decimal: '.',
    separator: ','
  });
  $(document).ready(function() {


    $(window).on('load', function() {
      $('div.spanner').addClass('show');
      setTimeout(function() {
        $('div.spanner').removeClass('show');
        show_data();
      }, 2000);
    })


    $('#button_search').on('click', function() {
      $('html,body').animate({
        scrollTop: $('#loader_load').offset().top
      }, 'slow');
      $('div.spanner').addClass('show');
      setTimeout(function() {
        $('div.spanner').removeClass('show');
        let search = $('#search').val();
        show_data({
          search
        });
      }, 200);
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
        page_size: 5,
        page: 1,
        ...filters,
      }
      $('#table_deduction tbody').empty();
      axios.get(`${apiUrl}/api/settings/show_data?${new URLSearchParams(filter)}`, {
          headers: {
            Authorization: token,
          },
        })
        .then(function(res) {
          res = res.data;
          // console.log("RES123", res);
          if (res.success) {
            if (res.data.data.length > 0) {
              res.data.data.map((item) => {
                let tr = '<tr style="vertical-align: middle;">';
                tr += '<td class="td" >' + item.deduction_name +
                  '</td>';
                tr += '<td class="td text-end">' + Number(parseFloat(
                    item
                    .deduction_amount).toFixed(2)).toLocaleString(
                    'en', {
                      minimumFractionDigits: 2
                    }) +
                  '</td>';
                tr +=
                  '<td  class="text-center"> <button value=' +
                  item.id +
                  ' class="editButton btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editModal" ><i class="fa-solid fa-pen-to-square view-hover"></i></button><button value=' +
                  item.id +
                  ' class="deleteButton btn btn-outline-danger ms-3" data-bs-toggle="modal" data-bs-target="#deleteModal" ><i class="fa-solid fa-trash view-hover-delete"></i></button> </td>';
                tr += '</tr>';
                $("#table_deduction tbody").append(tr);

                return ''
              })

              $('#tbl_pagination').empty();
              res.data.links.map(item => {
                let li =
                  `<li class="page-item cursor-pointer ${item.active ? 'active':''}"><a class="page-link" data-url="${item.url}">${item.label}</a></li>`
                $('#tbl_pagination').append(li);
                return '';
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
              $("#table_deduction tbody").append(
                '<tr><td colspan="6" class="text-center">No data</td></tr>');
            }
          }
        })
        .catch(function(error) {
          console.log("catch error", error);
        });

    }

    $("#addModal").on('hide.bs.modal', function() {
      // window.location.reload();
      // // show_data();
      $("div.spanner").addClass("show");
      setTimeout(function() {
        $("div.spanner").removeClass("show");
        show_data();
      }, 2000)
    });

    $("#editModal").on('hide.bs.modal', function() {
      // window.location.reload();
      // // show_data();
      $("div.spanner").addClass("show");
      setTimeout(function() {
        $("div.spanner").removeClass("show");
        show_data();
      }, 2000)
    });


    $('#deductiontype_store').submit(function(e) {
      e.preventDefault();

      let deduction_name = $("#deduction_name").val();
      let deduction_amount = $("#deduction_amount").val();

      let data = {
        deduction_name: deduction_name,
        deduction_amount: deduction_amount,
      };
      console.log("DATA", data);

      axios
        .post(apiUrl + "/api/savedeductiontype", data, {
          headers: {
            Authorization: token,
          },
        })
        .then(function(response) {
          let data = response.data;
          if (data.success) {
            // console.log('success', data.data.message);
            $('#addModal').modal('hide');
            $('html,body').animate({
              scrollTop: $('#loader_load').offset().top
            }, 'slow');
            $('#deduction_name').val('');
            $('#deduction_amount').val('');
            $('div.spanner').addClass('show');
            setTimeout(function() {
              $('div.spanner').removeClass('show');
              $('.toast1 .toast-title').html('Deduction Types');
              $('.toast1 .toast-body').html(response.data.message);
              toast1.toast('show');
              // show_data();
            }, 2000)
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

    $('#deduction_amount').focusout(function() {
      if ($(this).val().length > 0) {

        let amount = $(this).val();
        $('#deduction_amount').val(PHP(amount).format());
      }
    })

    $(document).on('click', '.editButton', function(e) {
      e.preventDefault();
      let id = $(this).val();
      $('#deduction_id').val(id);

      axios
        .get(apiUrl + '/api/settings/show_edit/' + id, {
          headers: {
            Authorization: token,
          },
        })
        .then(function(response) {
          let data = response.data;
          // console.log("SUCCESS", data.data);
          if (data.success) {

            $('#edit_deduction_name').val(data.data.deduction_name);
            $('#edit_deduction_amount').val(data.data.deduction_amount);

          } else {
            console.log("ERROR");
          }

        }).catch(function(error) {
          console.log("ERROR", error);
        });
    })

    $('#deductiontype_update').submit(function(e) {
      e.preventDefault();
      let deduction_id = $('#deduction_id').val();
      let deduction_name = $("#edit_deduction_name").val();
      let deduction_amount = $("#edit_deduction_amount").val();

      let data = {
        id: deduction_id,
        deduction_name: deduction_name,
        deduction_amount: parseFloat(deduction_amount).toFixed(2),
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
            $('#editModal').modal('hide');
            $('html,body').animate({
              scrollTop: $('#loader_load').offset().top
            }, 'slow');
            $('#edit_deduction_name').val('');
            $('#edit_deduction_amount').val('');
            $('div.spanner').addClass('show');
            setTimeout(function() {
              $('div.spanner').removeClass('show');
              $('.toast1 .toast-title').html('Deduction Types');
              $('.toast1 .toast-body').html(response.data.message);
              toast1.toast('show');
              show_data();
            }, 2000)
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


    function capitalize(s) {
      if (typeof s !== 'string') return "";
      return s.charAt(0).toUpperCase() + s.slice(1);
    }

    $(document).on('click', '#table_deduction .deleteButton', function(
      e) {
      e.preventDefault();
      let row = $(this).closest("td");
      let deductionType_id = row.find(".deleteButton").val();
      $("#deductionType_id").html(deductionType_id);
    })

    $('#deductionType_delete').on('click', function(e) {
      e.preventDefault();

      let deductionType_id = $('#deductionType_id').html();
      axios.post(apiUrl + '/api/deleteDeductionType/' + deductionType_id, {
        headers: {
          Authorization: token,
        },
      }).then(function(response) {
        let data = response.data
        if (data.success) {
          $('#deleteModal').modal('hide');
          $('html,body').animate({
            scrollTop: $('#loader_load').offset().top
          }, 'smooth');
          $('div.spanner').addClass('show');
          setTimeout(function() {
            $('div.spanner').removeClass('show');
            $('.toast1 .toast-title').html('Invoice Configuration');
            $('.toast1 .toast-body').html(response.data.message);
            toast1.toast('show');
            show_data();
          }, 2000);
        }
      }).catch(function(error) {
        console.log("ERROR", error);
      });
    });
  });
</script>
@endsection