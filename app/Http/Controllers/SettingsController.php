<?php

namespace App\Http\Controllers;

use App\Models\Button;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $button = Button::where('id', $id)->select('title', 'color', 'hyperlink')->first();
        $settings = [
            'title' => $button->title,
            'hyperlink' => $button->hyperlink,
            'color' => $button->color,
        ];
        return view('settings.index', compact('settings'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'hyperlink' => 'required|string|max:255',
            'color' => 'required|string|max:7',
        ], [
            'title.required' => 'The title field is required.',
            'title.max' => 'The title may not be greater than 255 characters.',
            'hyperlink.required' => 'The hyperlink field is required.',
            'hyperlink.max' => 'The hyperlink may not be greater than 255 characters.',
            'color.required' => 'The color field is required.',
            'color.max' => 'The color may not be greater than 7 characters.',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $validatedData = $validator->validated();

        // Find the specific button by ID
        $button = Button::findOrFail($id);

        // Update the button with the validated data
        $button->update([
            'title' => $validatedData['title'],
            'hyperlink' => $validatedData['hyperlink'],
            'color' => $validatedData['color'],
        ]);

        return redirect()->route('dashboard')->with('status', 'Settings updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
