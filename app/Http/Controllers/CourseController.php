<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::get();
        return view('courses.index', compact('courses',));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'code' => 'required',
            'name' => 'required',
            'semester' => 'required|numeric',
            'time' => 'required',
        ]);

        if ($request->is_lab_required == true) {
            $request->is_lab_required = true;
        } else {
            $request->is_lab_required = false;
        }

        $request->majors = json_encode($request->majors);

        Course::create([
            'code' => $request->code,
            'name' => $request->name,
            'semester' => $request->semester,
            'is_lab_required' => $request->is_lab_required,
            'majors' => $request->majors,
            'time' => $request->time,
        ]);

        return redirect()->route('courses.index')->with('success', 'Berhasil menambahkan mata kuliah');
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
    public function edit($id)
    {
        $course = Course::where('id', $id)->firstOrFail();
        $majors = array();
        foreach (json_decode($course->majors) as $major) {
            $majors[$major] = $major;
        }
        return view('courses.edit', ['course' => $course, 'majors' => $majors]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'code' => 'required',
            'name' => 'required',
            'semester' => 'required|numeric',
            'time' => 'required',
        ]);

        if ($request->is_lab_required == true) {
            $request->is_lab_required = true;
        } else {
            $request->is_lab_required = false;
        }

        $request->majors = json_encode($request->majors);

        $course = Course::where('id', $id)->firstOrFail();

        $course->update([
            'code' => $request->code,
            'name' => $request->name,
            'semester' => $request->semester,
            'is_lab_required' => $request->is_lab_required,
            'majors' => $request->majors,
            'time' => $request->time,
        ]);

        return redirect()->route('courses.index')->with('success', 'Berhasil memperbarui mata kuliah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::where('id', $id)->firstOrFail();
        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Berhasil meghapus mata kuliah');
    }
}
