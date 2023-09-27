<?php

namespace App\Http\Controllers;
use Exception;
use Illuminate\Support\Facades\Validator;
use App\Models\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
         
           try {
            $keyword = $request->input('keyword');

            // Query the industry table based on the keyword
            $query = Organization::orderBy('id', 'ASC');

            if (!empty($keyword)) {
                $query->where('name', 'like', '%' . $keyword . '%')
                ->orwhere('description', 'like', '%' . $keyword . '%');
            }

            $data['organizations'] = $query->paginate(7);

            return view('admin.organizations.list', $data);
              
           } 
          catch (Exception $e) {  return redirect()->back()->with('error', $e->getMessage()); }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        try {

            $rules = [
                'name' => 'required|min:5',
                
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $organization = Organization::create([
                'name' => $request->name,
                'description' => $request->description,
            ]);
            return redirect()->route('organization.index')->with('success', 'Industry has been created');

         } 
        catch (Exception $e) {  return redirect()->back()->with('error', $e->getMessage()); }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Organization $organization)
    {
         
        try {

            $data['organization'] = Organization::where('id', $request->id)->first();
            if (!empty($data['organization'])) {
                return view('admin.organizations.edit', $data);
            }
            return redirect()->route("organization.index")->with('error', 'Industry  not found!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Organization $organization)
    {

        $single_org = Organization::where('id', $request->id)->first();

        if (!empty($single_org)) {
            $rules = [
                'name' => 'required',
               
            ];
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            try {
                $update =  $single_org->update([
                    'name' => $request->name,
                    'description' => $request->description,
                ]);

                if ($update > 0) {
                    return redirect()->route("organization.index")->with('success', 'Industry has been update');
                }
                return redirect()->back()->with('error', 'failed to update this Role');
            } catch (Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the industry by its ID
        $organization = Organization::find($id);

        if (!$organization) {
            return redirect()->route('organization.index')->with('error', 'Industry not found');
        }
        // Delete the $organization

        try {

            $organization->delete();
            return redirect()->route('organization.index')->with('success', 'Industry  deleted successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}