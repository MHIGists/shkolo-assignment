<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $settings = [
            'hyperlink' => $user->hyperlink,
            'color' => $user->color,
        ];
        return view('settings.index', compact('settings'));
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
        //
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
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'hyperlink' => 'required|string|max:255',
            'color' => 'required|string|max:7',
        ], [
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

        $user = auth()->user();

        $user->hyperlink = $validatedData['hyperlink'];
        $user->color = $validatedData['color'];

        $user->save();

        return redirect()->route('settings.index')->with('status', 'Settings updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
