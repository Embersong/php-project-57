<?php

namespace App\Http\Controllers;

use App\Models\Label;
use Illuminate\Http\Request;

class LabelController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Label::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $labels = Label::paginate(15);

        return view('label.index', [
            'labels' => $labels
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $label = new Label();
        return view('label.create', [
            'label' => $label
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => 'required|unique:labels|max:255',
                'description' => 'max:500'
            ],
            [
                'name.unique' => __('validation.label.unique')
            ]
        );

        Label::create($validated);

        flash(__('flashes.labels.store.success'))->success();

        return redirect()->route('labels.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Label $label)
    {
        return view('label.edit', [
            'label' => $label
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Label $label)
    {
        $validated = $request->validate(
            [
                'name' => 'required|unique:labels|max:255' . $label->id,
                'description' => 'max:500'
            ],
            [
                'name.unique' => __('validation.label.unique')
            ]
        );

        $label->fill($validated);
        $label->save();

        flash(__('flashes.labels.updated'))->success();
        return redirect()->route('labels.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Label $label)
    {
        if ($label->tasks()->exists()) {
            flash(__('flashes.labels.delete.error'))->error();
            return back();
        }

        $label->delete();

        flash(__('flashes.labels.deleted'))->success();
        return redirect()->route('labels.index');
    }
}
