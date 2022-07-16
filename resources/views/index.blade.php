<!DOCTYPE html>
<html lang="en">
<?php //print_r($Company); die;?>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD App Laravel 8 & Ajax</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css' />
  <link rel='stylesheet'
    href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css' />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.css" />

</head>
{{-- add new employee modal start --}}
<div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Employee</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="POST" id="add_employee_form" enctype="multipart/form-data">
        @csrf
        <div class="modal-body p-4 bg-light">
          <div class="row">
            <div class="col-lg">
              <label for="fname">First Name</label>
              <input type="text" name="fname" class="form-control" placeholder="First Name" required>
            </div>
            <div class="col-lg">
              <label for="lname">Last Name</label>
              <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
            </div>
          </div>
          <div class="my-2">
            <label for="email">E-mail</label>
            <input type="email" name="email" class="form-control" placeholder="E-mail" required>
          </div>
          <div class="my-2">
            <label for="phone">Phone</label>
            <input type="tel" name="contact" class="form-control" placeholder="Phone" required>
          </div>
          <div class="my-2">
            <label for="post">Company</label>
            <select  name="company_id" id="company_id">
                <option>Select Company</option>
                @foreach ($Company as $key => $value)
                <option value="{{ $key }}" > 
                {{ $value }} 
                </option>
                @endforeach    
              </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="add_employee_btn" class="btn btn-primary">Add Employee</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- add new employee modal end --}}

</head>
{{-- add new employee modal start --}}
<div class="modal fade" id="addCompanyModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Company</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="POST" id="add_company_form" enctype="multipart/form-data">
        @csrf
        <div class="modal-body p-4 bg-light">
          <div class="row">
            <div class="col-lg">
              <label for="name"> Name</label>
              <input type="text" name="name" class="form-control" placeholder="Name" required>
            </div>
          </div>
          <div class="my-2">
            <label for="email">E-mail</label>
            <input type="email" name="email" class="form-control" placeholder="E-mail" required>
          </div>
          <div class="my-2">
            <label for="email">Website</label>
            <input type="text" name="website" class="form-control" placeholder="Website" required>
          </div>
          <div class="my-2">
            <label for="phone">Phone</label>
            <input type="tel" name="contact" class="form-control" placeholder="Phone" required>
          </div>
          <div class="my-2">
            <label for="post">Address</label>
            <input type="text" name="address" class="form-control" placeholder="Address" required>
          </div>
          <div class="my-2">
            <label for="avatar">Select Logo</label>
            <input type="file" name="logo" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="add_company_btn" class="btn btn-primary">Add Company</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- add new employee modal end --}}


{{-- edit employee modal start --}}
<div class="modal fade" id="editEmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Employee</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="POST" id="edit_employee_form" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="emp_id" id="emp_id">
        <div class="modal-body p-4 bg-light">
          <div class="row">
            <div class="col-lg">
              <label for="fname">First Name</label>
              <input type="text" name="fname" id="fname" class="form-control" placeholder="First Name" required>
            </div>
            <div class="col-lg">
              <label for="lname">Last Name</label>
              <input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name" required>
            </div>
          </div>
          <div class="my-2">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="E-mail" required>
          </div>
          <div class="my-2">
            <label for="phone">Phone</label>
            <input type="tel" name="contact" id="contact" class="form-control" placeholder="Phone" required>
          </div>
          <div class="my-2">
            <label for="post">Company</label>
              <select  name="company_id" id="company_id">
                <option>Select Company</option>
                @foreach ($Company as $key => $value)
                <option value="{{ $key }}" > 
                {{ $value }} 
                </option>
                @endforeach    
              </select>
          </div>
          
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="edit_employee_btn" class="btn btn-success">Update Employee</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- edit employee modal end --}}

{{-- edit Company modal start --}}
<div class="modal fade" id="editCompanyModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Company</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="POST" id="edit_comp_form" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="comp_id" id="comp_id">
        <input type="hidden" name="comp_avatar" id="comp_avatar">
        <div class="modal-body p-4 bg-light">
          <div class="row">
            <div class="col-lg">
              <label for="name"> Name</label>
              <input type="text" name="comapny_name" id="comapny_name" class="form-control" placeholder=" Name" required>
            </div>
            <div class="col-lg">
              <label for="lname">Website</label>
              <input type="text" name="company_website" id="company_website" class="form-control" placeholder="Website Name" required>
            </div>
          </div>
          <div class="my-2">
            <label for="email">E-mail</label>
            <input type="email" name="company_email" id="company_email" class="form-control" placeholder="E-mail" required>
          </div>
          <div class="my-2">
            <label for="phone">Phone</label>
            <input type="tel" name="company_contact" id="company_contact" class="form-control" placeholder="Contact" required>
          </div>
          <div class="my-2">
            <label for="post">Post</label>
            <input type="text" name="company_address" id="company_address" class="form-control" placeholder="Addrress" required>
          </div>
          <div class="my-2">
            <label for="logo">Select Avatar</label>
            <input type="file" name="company_" class="form-control">
          </div>
          <div class="mt-2" id="logo">

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="edit_company_btn" class="btn btn-success">Update Company</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- edit company modal end --}}


<body class="bg-light">
  <div class="container">
    <div class="row my-5">
      <div class="col-lg-12">
        <div class="card shadow">
          <div class="card-header bg-danger d-flex justify-content-between align-items-center">
            <h3 class="text-light">Manage Employees</h3>
            <button class="btn btn-light"  id="show_company_btn" >Show Company</button>
                <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addCompanyModal"><i
                class="bi-plus-circle me-2"></i>Add New Company</button>    
            <button class="btn btn-light"  id="show_employee_btn" >Show Employee</button>
            <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addEmployeeModal"><i
                class="bi-plus-circle me-2"></i>Add New Employee</button>
          </div>
          <div class="card-body" id="show_all_employees">
            <h1 class="text-center text-secondary my-5">Loading...</h1>
          </div>
          <div class="card-body" id="show_all_company">
            <h1 class="text-center text-secondary my-5">Loading...</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js'></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    $(function() {
      $("#show_all_employees").hide();
      $("#show_all_company").hide();
      // add new employee ajax request
      $("#add_employee_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#add_employee_btn").text('Adding...');
        console.log('{{ route('emp/store') }}');
        $.ajax({
          url: '{{ route('emp/store') }}',
          method: 'post',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {
            if (response.status == 200) {
              Swal.fire(
                'Added!',
                'Employee Added Successfully!',
                'success'
              )
              fetchAllEmployees();
            }
            $("#add_employee_btn").text('Add Employee');
            $("#add_employee_form")[0].reset();
            $("#addEmployeeModal").modal('hide');
          }
        });
      });

      // edit employee ajax request
      $(document).on('click', '.editIcon', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        $.ajax({
          url: '{{ route('emp/edit') }}',
          method: 'get',
          data: {
            id: id,
            _token: '{{ csrf_token() }}'
          },
          success: function(response) {
            $("#fname").val(response.first_name);
            $("#lname").val(response.last_name);
            $("#email").val(response.email);
            $("#contact").val(response.contact);
            $("#company_id").val(response.company_id);
            $("#emp_id").val(response.id);
            
          }
        });
      });

      // update employee ajax request
      $("#edit_employee_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        console.log(fd);
        $("#edit_employee_btn").text('Updating...');
        $.ajax({
          url: '{{ route('emp/update') }}',
          method: 'post',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {
            if (response.status == 200) {
              Swal.fire(
                'Updated!',
                'Employee Updated Successfully!',
                'success'
              )
              fetchAllEmployees();
            }
            $("#edit_employee_btn").text('Update Employee');
            $("#edit_employee_form")[0].reset();
            $("#editEmployeeModal").modal('hide');
          }
        });
      });

      // delete employee ajax request
      $(document).on('click', '.deleteIcon', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        let csrf = '{{ csrf_token() }}';
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: '{{ route('emp/delete') }}',
              method: 'delete',
              data: {
                id: id,
                _token: csrf
              },
              success: function(response) {
                console.log(response);
                Swal.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                )
                fetchAllEmployees();
              }
            });
          }
        })
      });
        // display all company ajax request
      $(document).on('click', '#show_company_btn', function(e) {
        e.preventDefault();
        fetchAllCompany();
        $("#show_all_company").show();
        $("#show_all_employees").hide();
      });
      // fetch all employees ajax request
      //fetchAllEmployees();

      function fetchAllEmployees() {
        $.ajax({
          url: '{{ route('emp/fetchAll') }}',
          method: 'get',
          success: function(response) {
            $("#show_all_employees").html(response);
            $("table").DataTable({
              order: [0, 'desc']
            });
          }
        });
      }

       // fetch all companies ajax request
     //  fetchAllCompany();

      function fetchAllCompany() {
        $.ajax({
          url: '{{ route('fetchAll') }}',
          method: 'get',
          success: function(response) {
            $("#show_all_company").html(response);
            $("table").DataTable({
              order: [0, 'desc']
            });
          }
        });
      }

      // add new Company ajax request
      $("#add_company_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#add_company_btn").text('Adding...');
        $.ajax({
          url: '{{ route('store') }}',
          method: 'post',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {
            if (response.status == 200) {
              Swal.fire(
                'Added!',
                'Company Added Successfully!',
                'success'
              )
              fetchAllCompany();
            }
            $("#add_company_btn").text('Add Company');
            $("#add_company_form")[0].reset();
            $("#addCompanyModal").modal('hide');
          }
        });
      });
    // display all company ajax request
    $(document).on('click', '#show_employee_btn', function(e) {
        e.preventDefault();
        fetchAllEmployees();
        $("#show_all_employees").show();
        $("#show_all_company").hide();
      });

      // edit employee ajax request
      $(document).on('click', '.companyeditIcon', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        $.ajax({
          url: '{{ route('edit') }}',
          method: 'get',
          data: {
            id: id,
            _token: '{{ csrf_token() }}'
          },
          success: function(response) {
            $("#comapny_name").val(response.name);
            $("#company_email").val(response.email);
            $("#company_contact").val(response.contact);
            $("#company_address").val(response.address);
            $("#company_website").val(response.website);
            $("#company_logo").html(
              `<img src="storage/images/${response.logo}" width="100" class="img-fluid img-thumbnail">`);
            $("#comp_id").val(response.id);
            $("#comp_logo").val(response.logo);
          }
        });
      }); 

      // update employee ajax request
      $("#edit_comp_form").submit(function(e) {
        e.preventDefault();
        var form = document.getElementById('edit_comp_form');
        var formData = new FormData($('#edit_comp_form')[0]);
        formData.append('file', document.getElementById("logo"));
        console.log($("#company_website").val());
        console.log(formData);
        $("#edit_company_btn").text('Updating...');
        $.ajax({
          url: '{{ route('comp_update') }}',
          method: 'post',
          data: fd1,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {
            if (response.status == 200) {
              Swal.fire(
                'Updated!',
                'Company Updated Successfully!',
                'success'
              )
              fetchAllCompany();
            }
            $("#edit_company_btn").text('Update Company');
            $("#edit_company_form")[0].reset();
            $("#editCompanyModal").modal('hide');
          }
        });
      });

    });
  </script>
</body>

</html>