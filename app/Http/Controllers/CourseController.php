<?php

namespace App\Http\Controllers;

use App\Models\Classification;
use App\Models\Course;
use Illuminate\Http\Request;


class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $courses1 = Course::where('classification_id', $request->query('classification_id', 1))->get();
        $courses2 = Course::where('classification_id', $request->query('classification_id', 2))->get();
        $courses3 = Course::where('classification_id', $request->query('classification_id', 3))->get();
        return view('static.course.index', compact('courses1', 'courses2', 'courses3'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Course $course)
    {
        $classifications = Classification::all();
        return view('control_panel.courses.create', compact('course', 'classifications'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Course $course)
    {
        $course->load('classification.courses');
        $data = $this->getValidation();
        $course = auth()->user()->courses()->create($data);
        $this->storeImage($course);
        return redirect(route('course.create'))->with('message', '');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Course $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('static.course.details', compact('course'));
    }

    function list()
    {
        $courses = Course::all();
        $classifications = Classification::all();
        return view('control_panel.courses.list', compact('courses', 'classifications'));
    }

    public function search(Course $courses, Request $request)
    {
        $q = $_GET['q'];
        $courses = Course::where('name', 'LIKE', '%' . $q . '%')->orWhere('couch_name', 'LIKE', '%' . $q . '%')->get();
        if (count($courses) > 0) {
            return view('static.course.search')->withDetails($courses)->withQuery($q);
        } else {
            return view('static.course.search')->withMessage('No Details found. Try to search again !');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Course $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $classifications = Classification::all();
        return view('control_panel.courses.edit', compact('course', 'classifications'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Course $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $data = $this->getValidation();

        $course->update($data);

        $this->storeImage($course);
        return redirect(route('course.list'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Course $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect(route('course.list'));
    }

    protected function getValidation()
    {
        return \request()->validate([
            'name' => 'required',
            'couch_name' => 'required',
            'summary' => 'required',
            'details' => 'required',
            'active' => 'required',
            'classification_id' => 'required',
            'image' => 'sometimes|file|image|max:20000',
        ]);
    }

    private function storeImage(Course $course)
    {
        if (\request()->hasFile('image')) {
            $course->update([
                'image' => \request()->image->store('photos', 'public'),
            ]);
            /*$image=Image::make(public_path('storage/'.$customer->image))->fit(300,300);
        $image->save();*/

        }

    }
}
