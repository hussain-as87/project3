<?php

namespace App\Http\Controllers;

use App\Models\Classification;
use App\Models\Course;
use Illuminate\Http\Request;

class ClassificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request, Classification $classification)
    {
        $courses = Course::where('classification_id', $request->query('classification_id', $classification->id))->get();
        return view('static.classification.view', compact('classification', 'courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|
     * \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create(Classification $classification)
    {
        return view('control_panel.classification.create', compact('classification'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|
     * \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function store(Request $request, Classification $classification)
    {
        $data = $this->getValidationFactory();
        $classification = auth()->user()->classifications()->create($data);
        return redirect(route('class.create'))->with('message', '');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $classification = Classification::all();
        return view('control_panel.classification.show', compact('classification'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Classification $classification)
    {
        return view('control_panel.classification.edit', compact('classification'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classification $classification)
    {
        $data = $this->getValidationFactory();
        $classification->update($data);
        return redirect(route('class.show'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classification $classification)
    {
        $classification->delete();
        return redirect(route('class.show'));
    }

    protected function getValidationFactory()
    {
        return \request()->validate([
            'name' => 'required'
        ]);
    }
}
