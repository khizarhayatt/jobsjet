<?php

namespace App\Http\Controllers;
use Exception;
use Illuminate\Support\Facades\Validator;
use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

           try {
            $keyword = $request->input('keyword');

            // Query the industry table based on the keyword
            $query = Language::orderBy('id', 'ASC');

            if (!empty($keyword)) {
                $query->where('name', 'like', '%' . $keyword . '%');

            }

            $data['languages'] = $query->paginate(7);

            return view('admin.languages.list', $data);

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
                'name' => 'required',

            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $industry = Language::create([
                'name' => $request->name,

            ]);
            return redirect()->route('language.index')->with('success', 'Language has been created');

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
    public function edit(Request $request, Language $industry)
    {

        try {

            $data['language'] = Language::where('id', $request->id)->first();
            if (!empty($data['language'])) {
                return view('admin.languages.edit', $data);
            }
            return redirect()->route("language.index")->with('error', 'Language  not found!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Language $industry)
    {

        $single_industry = Language::where('id', $request->id)->first();

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

                ]);

                if ($update > 0) {
                    return redirect()->route("language.index")->with('success', 'Language has been update');
                }
                return redirect()->back()->with('error', 'failed to update this Language');
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
        $industry = Language::find($id);

        if (!$industry) {
            return redirect()->route('language.index')->with('error', 'Language not found');
        }
        // Delete the $industry

        try {

            $industry->delete();
            return redirect()->route('language.index')->with('success', 'Language  deleted successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}