<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    	// handle fetch all eamployees ajax request
	public function fetchAll() {
		$compData = Company::all();
		$output = '';
		if ($compData->count() > 0) {
			$output .= '<table class="table table-striped table-sm text-center align-middle">
            <thead>
              <tr>
                <th>ID</th>
                <th>Logo</th>
                <th>Name</th>
                <th>E-mail</th>
                <th>Address</th>
                <th>Contact</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
			foreach ($compData as $comp) {
				$output .= '<tr>
                <td>' . $comp->id . '</td>
                <td><img src="storage/images/' . $comp->logo . '" width="50" class="img-thumbnail rounded-circle"></td>
                <td>' . $comp->name . '</td>
                <td>' . $comp->email . '</td>
                <td>' . $comp->address . '</td>
                <td>' . $comp->contcat . '</td>
                <td>
                  <a href="#" id="' . $comp->id . '" class="text-success mx-1 companyeditIcon" data-bs-toggle="modal" data-bs-target="#editCompanyModal"><i class="bi-pencil-square h4"></i></a>

                  <a href="#" id="' . $comp->id . '" class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i></a>
                </td>
              </tr>';
			}
			$output .= '</tbody></table>';
			echo $output;
		} else {
			echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
		}
	}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $file = $request->file('logo');
		$fileName = time() . '.' . $file->getClientOriginalExtension();
		$file->storeAs('public/images', $fileName);

		$compData = ['name' => $request->name, 'email' => $request->email, 'contact' => $request->contact, 'address' => $request->address, 'logo' => $fileName, 'website' => $request->website];
		Company::create($compData);
		return response()->json([
			'status' => 200,
		]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
        $id = $request->id;
		$comp = Company::find($id);
		return response()->json($comp);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function comp_update(Request $request)
    {
        //
        $fileName = '';
        echo $request->comp_id;die;
		$comp = Company::find($request->comp_id);
		if ($request->hasFile('logo')) {
			$file = $request->file('logo');
			$fileName = time() . '.' . $file->getClientOriginalExtension();
			$file->storeAs('public/images', $fileName);
			if ($emcompp->logo) {
				Storage::delete('public/images/' . $comp->avatar);
			}
		} else {
			$fileName = $request->comp_logo;
		}echo '<pre>';
print_r($request->name);die;
		$compData = ['name' => $request->name, 'website' => $request->website, 'email' => $request->email, 'contact' => $request->contact, 'address' => $request->address, 'logo' => $fileName];

		$comp->update($compData);
		return response()->json([
			'status' => 200,
		]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
