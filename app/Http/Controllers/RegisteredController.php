<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Registered;
use Illuminate\Http\Request;

class RegisteredController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Registered $registered)
    {
        $courses = Course::all();
        return view('static.registered.create', compact('courses', 'registered'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Registered $registered)
    {
        $data = $this->getValidationFactory();
        $registered->create($data);
        return redirect(route('reg.create'))->with('message', '');
    }

    public function search(Registered $registereds, Request $request)
    {
        $q = $_GET['r'];
        $registereds = Registered::where('name', 'LIKE', '%' . $q . '%')->get();
        if (count($registereds) > 0) {
            return view('control_panel.registered.search')->withDetails($registereds)->withQuery($q);
        } else {
            return view('control_panel.registered.search')->withMessage('No Details found. Try to search again !');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Registered $registered)
    {
        $registereds = Registered::all();
        $courses = Course::all();
        return view('control_panel.registered.show', compact('registereds', 'courses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Registered $registered)
    {
        $courses = Course::all();
        return view('control_panel.registered.edit', compact('registered', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Registered $registered)
    {
        $data = $this->getValidationFactory();
        $registered->update($data);
        return redirect(route('reg.show'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Registered $registered)
    {
        $registered->delete();
        return redirect(route('reg.show'));
    }

    protected function getValidationFactory()
    {
        return \request()->validate([
            'name' => 'required',
            'city' => 'required',
            'phone' => 'required|min:12|max:12',
            'course_id' => 'required',
            'notes' => 'sometimes',
        ]);
    }
}
