<?php

namespace App\Http\Controllers;

use App\Http\Requests\SectionRequest;
use App\Http\Requests\SectionUpdateRequest;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = Section::all();
        return view('sections.index',compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SectionRequest $request)
    {
        Section::create([
            'name'          => $request->name,
            'description'   => $request->description,
            'created_by'    => Auth::user()->name
        ]);
        session()->flash('success', 'تم اضافة القسم بنجاح');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Section $section)
    {
        $id = $request->id;

        $this->validate($request, [

            'name' => 'required|max:255|unique:sections,name,'.$id,
        ],[

            'name.required' =>'يرجي ادخال اسم القسم',
            'name.unique' =>'اسم القسم مسجل مسبقا',

        ]);

        $section->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        session()->flash('success', 'تم تعديل القسم بنجاح');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $section = Section::findOrFail($request->id);
        $section->delete();
        session()->flash('success', 'تم حذف القسم بنجاح');
        return redirect()->back();
    }
}
