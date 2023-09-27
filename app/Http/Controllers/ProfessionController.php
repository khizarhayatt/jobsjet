<?php

namespace App\Http\Controllers;
use Exception;
use Illuminate\Support\Facades\Validator;
use App\Models\Profession;
use Illuminate\Http\Request;

class ProfessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
         
           try {
            $keyword = $request->input('keyword');

            // Query the industry table based on the keyword
            $query = Profession::orderBy('id', 'ASC');

            if (!empty($keyword)) {
                $query->where('name', 'like', '%' . $keyword . '%')
                ->orwhere('description', 'like', '%' . $keyword . '%');
            }

            $data['professions'] = $query->paginate(7);

            return view('admin.professions.list', $data);
              
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
            $industry = Profession::create([
                'name' => $request->name,
                'description' => $request->description,
            ]);
            return redirect()->route('profession.index')->with('success', 'Profession has been created');

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
    public function edit(Request $request, Profession $industry)
    {
         
        try {

            $data['profession'] = Profession::where('id', $request->id)->first();
            if (!empty($data['profession'])) {
                return view('admin.professions.edit', $data);
            }
            return redirect()->route("profession.index")->with('error', 'Profession  not found!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profession $industry)
    {

        $single_industry = Profession::where('id', $request->id)->first();

        if (!empty($single_industry)) {
            $rules = [
                'name' => 'required',
                
            ];
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            try {
                $update =  $single_industry->update([
                    'name' => $request->name,
                    'description' => $request->description,
                ]);

                if ($update > 0) {
                    return redirect()->route("profession.index")->with('success', 'Profession has been update');
                }
                return redirect()->back()->with('error', 'failed to update this Profession');
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
        $industry = Profession::find($id);

        if (!$industry) {
            return redirect()->route('profession.index')->with('error', 'Profession not found');
        }
        // Delete the $industry

        try {

            $industry->delete();
            return redirect()->route('profession.index')->with('success', 'Profession  deleted successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}