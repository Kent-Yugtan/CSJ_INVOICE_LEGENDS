@extends('layouts.master')
@section('content-dashboard')
<div class="container-fluid px-4" id="loader_load">
  <h1 class="mt-0">Email Configuration</h1>
  <ol class="breadcrumb mb-3"></ol>
  <div class="row">

    <div class="col-sm-12 col-md-12 col-lg-5 px-2">
      <div class="card shadow p-2 mb-5 bg-white rounded" style="width: 100%; height:100%;">
        <div class="card-header">Create Email</div>
        <div class="row px-4 pb-4" id="header">
          <form id="emailconfigs_store" class="row g-3 needs-validation" novalidate>
            @csrf
            <div class="form-floating mb-3">
              <input id="fullname" name="fullname" type="text" class="form-control" placeholder="Fullname">
              <label for="fullname" style=" color: #A4A6B3;">Complete Name</label>
            </div>
            <div class="form-floating mb-3">
              <input id="email_address" name="email_address" type="email" class="form-control"
                placeholder="Email Address">
              <label for="email_address" style=" color: #A4A6B3;">Email Address</label>
            </div>

            <div class="form-floating mb-3">
              <input id="title" name="email_address" type="email" class="form-control" placeholder="Title">
              <label for="title" style=" color: #A4A6B3;">Title</label>
            </div>

            <div class="form-floating mb-3">
              <select class="form-select" id="status">
                <option selected disabled value="">Please Select Status</option>
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
              </select>
              <label for="status" style=" color: #A4A6B3;">Status</label>
            </div>


            <div class="col mb-3">
              <button type="button" style="width:100%; height:50px;color:white; background-color: #A4A6B3;"
                class="btn">Close</button>
            </div>

            <div class="col mb-3">
              <button type="submit" style="width:100%; height:50px;color:white; background-color: #CF8029;"
                class="btn">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="col-sm-12 col-md-12 col-lg-7 px-2">
      <div class="card shadow bg-white rounded " style="height: 100%;width:100% ">
        <div class="card-body table-responsive ">
          <div class="row mt-3">
            <div class="col">
              <div class="w-100">
                <input id="search" type="text" class="form-control form-check-inline" placeholder="Search">
              </div>
            </div>
            <div class="col">
              <button type="submit" class="btn w-100" style="color:white; background-color: #CF8029;width:30%"
                id="button_search">Search</button>
            </div>
          </div>
          <table style="color: #A4A6B3;" class="table table-hover table-responsive" id="table_emailconfigs">
            <thead class="responsive">
              <th>Complete Name</th>
              <th>Email Address</th>
              <th>Title</th>
              <th>Status</th>
              <th style="text-align:center;">Action</th>
            </thead>
            <tbody>


            </tbody>
          </table>
        </div>
        <div class="mx-3 table-responsive" style="display: flex; justify-content: space-between;">
          <div class="page_showing" id="tbl_showing"></div>
          <ul class="pagination pagination-sm" id="tbl_pagination"></ul>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-dialog">
        <div class="modal-content ">
          <div class="modal-body ">
            <div class="row">
              <h5> Update Email Configuration </h5>
              <form id="emailconfigs_update">
                @csrf
                <input type="text" id="emailconfig_id" hidden>

                <div class="form-floating form-group mb-3">
                  <input id="edit_fullname" type="text" class="form-control" placeholder="Complate Name">
                  <label for="edit_fullname">Complete Name</label>
                </div>

                <div class="form-floating form-group mb-3">
                  <input id="edit_email_address" type="text" class="form-control" placeholder="Email Address">
                  <label for="edit_email_address">Email Address</label>
                </div>

                <div class="form-floating form-group mb-3">
                  <input id="edit_title" type="text" class="form-control" placeholder="Title">
                  <label for="edit_title" style="color: #A4A6B3;">Title</label>
                </div>


                <div class="form-floating form-group mb-3">
                  <select class="form-select" id="edit_status">
                    <option selected disabled value="">Please Select Status</option>
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                  </select>
                  <label for="edit_status" style=" color: #A4A6B3;">Status</label>
                </div>

                <div class="row mt-3">
                  <div class="col mt-3">
                    <button type="button" class="btn btn-secondary w-100"
                      style=" color:#CF8029; background-color:white; " data-bs-dismiss="modal">Close</button>
                  </div>
                  <div class="col mt-3">
                    <button type="submit" class="btn btn-secondary w-100"
                      style="color:White; background-color:#CF8029; " data-bs-dismiss="modal">Update</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

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
<!-- <button type="button" class="btn btn-primary" id="showtoast">Show Toast</button> -->
<div class="spanner">
  <div class="loader"></div>
</div>
<script type="text/javascript">
$(document).ready(function() {

  $(window).on('load', function() {
    $('html,body').animate({
      scrollTop: $('#loader_load').offset().top
    }, 'slow');
    $('div.spanner').addClass('show');

    setTimeout(function() {
      $('div.spanner').removeClass('show');
      show_data();
    }, 2000)
  })

  let toast1 = $('.toast1');

  $('#editModal').on('hide.bs.modal', function() {
    $('div.spanner').addClass("show");
    setTimeout(function() {
      $('div.spanner').removeClass("show");
      show_data();
    }, 2000)
  })


  $('#button_search').on('click', function() {
    let search = $('#search').val();
    show_data({
      search
    });
  })
  toast1.toast({
    delay: 5000,
    animation: true
  });

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

  // SHOW DATA
  function show_data(filters) {
    let filter = {
      page_size: 5,
      page: 1,
      ...filters,
    }
    $('#table_emailconfigs tbody').empty();
    axios.get(`${apiUrl}/api/emailconfigs/show_data?${new URLSearchParams(filter)}`, {
        headers: {
          Authorization: token,
        },
      })
      .then(function(response) {
        let data = response.data;
        console.log("SUCCES", data);
        if (data.success) {
          if (data.data.data.length > 0) {
            data.data.data.map((item) => {
              let tr = '<tr>';
              tr += '<td>' + item.fullname + '</td>';
              tr += '<td>' + item
                .email_address +
                '</td>';
              tr += '<td>' + item
                .title +
                '</td>';
              tr += '<td>' + item
                .status +
                '</td>';
              tr +=
                '<td class="text-center"> <button value=' + item.id +
                ' class="editButton btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editModal" ><i class="fa-sharp fa-solid fa-eye"></i></button><button value=' +
                item.id +
                ' class="deleteButton btn btn-outline-danger ms-3" data-bs-toggle="modal" data-bs-target="#deleteModal" ><i class="fa-solid fa-trash view-hover-delete"></i></button> </td>';
              tr += '</tr>';
              $("#table_emailconfigs tbody").append(tr);

              return ''
            })

            $('#tbl_pagination').empty();
            data.data.links.map(item => {
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
                return results !== null ? results[1] || 0 : 0;
              };

              let search = $('#search').val();
              show_data({
                search,
                page: $.urlParam('page')
              });
            })

            let table_emailconfigs =
              `Showing ${data.data.from} to ${data.data.to} of ${data.data.total} entries`;
            $('#tbl_showing').html(table_emailconfigs);
          } else {
            $("#table_emailconfigs tbody").append(
              '<tr><td colspan="6" class="text-center">No data</td></tr>');
          }
        }
      })
      .catch(function(error) {
        console.log("catch error", error);
      });

  }
  // CLICK TO EDIT BUTTON
  $(document).on('click', '.editButton', function(e) {
    e.preventDefault();
    let id = $(this).val();
    $('#emailconfig_id').val(id);

    axios
      .get(apiUrl + '/api/emailconfigs/show_edit/' + id, {
        headers: {
          Authorization: token,
        },
      })
      .then(function(response) {
        let data = response.data;
        console.log("SUCCESS", data.data);
        if (data.success) {

          $('#edit_fullname').val(data.data.fullname);
          $('#edit_email_address').val(data.data.email_address);
          $('#edit_title').val(data.data.title);
          $('#edit_status').val(data.data.status);

        } else {
          console.log("ERROR");
        }

      }).catch(function(error) {
        console.log("ERROR", error);
      });
  })

  // CLICK TO STORE DATA
  $('#emailconfigs_store').submit(function(e) {
    e.preventDefault();

    let fullname = $('#fullname').val();
    let email_address = $('#email_address').val();
    let title = $('#title').val();
    let status = $('#status').val();

    let data = {
      fullname: fullname,
      email_address: email_address,
      title: title,
      status: status,
    }
    axios
      .post(apiUrl + '/api/emailconfigs_store', data, {
        headers: {
          Authorization: token,
        },
      }).then(function(response) {
        let data = response.data;
        if (data.success) {
          // console.log('success', data);
          $('#emailconfigs_store').trigger('reset'); // reset the form
          $('div.spanner').addClass('show');

          setTimeout(function() {
            $('div.spanner').removeClass('show');
            $('.toast1 .toast-title').html('Email Configuration');
            $('.toast1 .toast-body').html(response.data.message);
            toast1.toast('show');
            show_data();
          }, 2000)
        }

      }).catch(function(error) {
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

  // CLICK TO UPDATE DATA
  $('#emailconfigs_update').submit(function(e) {
    e.preventDefault();

    let update_id = $('#emailconfig_id').val();
    let edit_fullname = $('#edit_fullname').val();
    let edit_email_address = $('#edit_email_address').val();
    let edit_title = $('#edit_title').val();
    let edit_status = $('#edit_status').val();


    let data = {
      id: update_id,
      fullname: edit_fullname,
      email_address: edit_email_address,
      title: edit_title,
      status: edit_status,
    }

    axios
      .post(apiUrl + '/api/emailconfigs_store', data, {
        headers: {
          Authorization: token,
        },
      }).then(function(response) {
        let data = response.data;
        if (data.success) {
          // console.log('success', data);
          $('div.spanner').addClass('show');
          setTimeout(function() {
            $('div.spanner').removeClass('show');
            $('.toast1 .toast-title').html('Email Configuration');
            $('.toast1 .toast-body').html(response.data.message);
            toast1.toast('show');
          }, 2000)

        }

      }).catch(function(error) {
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

  });

  function capitalize(s) {
    if (typeof s !== 'string') return "";
    return s.charAt(0).toUpperCase() + s.slice(1);
  }

})
</script>
@endsection