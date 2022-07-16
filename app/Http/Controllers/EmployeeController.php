<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Employee;
use App\Models\Company;

class EmployeeController extends Controller {

	// set index page view
	public function index() {
		$Company = Company::pluck('name', 'id');
		//print_r($Company);die;
		return view('index',compact('Company'));
	}

	// handle fetch all eamployees ajax request
	public function fetchAll() {
        //echo 'ssss';die;
    
		$emps = Employee::join('companies', 'employees.company_id', '=', 'companies.id')
		->get(['employees.*', 'companies.name as company_name']);
		$output = '';
		if ($emps->count() > 0) {
			$output .= '<table class="table table-striped table-sm text-center align-middle">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>E-mail</th>
                <th>Phone</th>
				<th>Company</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
			foreach ($emps as $emp) {
				$output .= '<tr>
                <td>' . $emp->id . '</td>
                <td>' . $emp->first_name . ' ' . $emp->last_name . '</td>
                <td>' . $emp->email . '</td>
                <td>' . $emp->contact . '</td>
				<td>' . $emp->company_name . '</td>
                <td>
                  <a href="#" id="' . $emp->id . '" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editEmployeeModal"><i class="bi-pencil-square h4"></i></a>

                  <a href="#" id="' . $emp->id . '" class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i></a>
                </td>
              </tr>';
			}
			$output .= '</tbody></table>';
			echo $output;
		} else {
			echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
		}
	}

	// handle insert a new employee ajax request
	public function store(Request $request) {
        // /echo 'ssss'; die;
		$empData = ['first_name' => $request->fname, 'last_name' => $request->lname, 'email' => $request->email, 'contact' => $request->contact, 'company_id' => $request->company_id];
		Employee::create($empData);
		return response()->json([
			'status' => 200,
		]);
	}

	// handle edit an employee ajax request
	public function edit(Request $request) {
		$id = $request->id;
		$emp = Employee::find($id);
		return response()->json($emp);
	}

	// handle update an employee ajax request
	public function update(Request $request) {
		$emp = Employee::find($request->emp_id);
		$empData = ['first_name' => $request->fname, 'last_name' => $request->lname, 'email' => $request->email, 'contact' => $request->contact, 'company_id' => $request->company_id];
		//print_r($empData);
		$emp->update($empData);
		return response()->json([
			'status' => 200,
		]);
	}

	// handle delete an employee ajax request
	public function delete(Request $request) {
		$id = $request->id;
		$emp = Employee::find($id);
		Employee::destroy($id);
		
	}
}
