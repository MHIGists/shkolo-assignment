<?php

namespace App\Http\Controllers;

use App\Models\Button;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $buttons = Button::where('owner_id', $user->id)->get();
        return view('settings.index', compact(['buttons']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //        $button = Button::where('id', $id)->select('id', 'title', 'color', 'hyperlink', 'owner_id')->first();
        //Either a new view specific for one button or remove this altogether
        $button = [
            'id' => 1,
            'title' => 'New Button',
            'color' => '#111111',
            'hyperlink' => '#',
            'owner_id' => auth()->user()->id,
            'insert' => true
        ];
        return view('settings.button-edit', compact('button'));
    }

    /**
     * Store a newly created resource in storage.
     * Almost the same as update... Could probably be re-written better
     */
    public function store(Request $request)
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

        //Check the href
        if (!Str::startsWith($validatedData['hyperlink'], ['https://', 'http://'])) {
            $validatedData['hyperlink'] = 'https://' . $validatedData['hyperlink'];
        }
        $validatedData['owner_id'] = auth()->user()->id;
        $button = new Button();
        $button->fill($validatedData);
        $button->save();
        return redirect()->route('dashboard')->with('status', 'Settings updated successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //Either a new view specific for one button or remove this altogether
        $button = Button::where('id', $id)->first();
        return view('settings.button-edit', compact('button'));
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

        //Chech the href
        if (!Str::startsWith($validatedData['hyperlink'], ['https://', 'http://'])) {
            $validatedData['hyperlink'] = 'https://' . $validatedData['hyperlink'];
        }

        // Update the button with the validated data
        $button->update([
            'title' => $validatedData['title'],
            'hyperlink' => $validatedData['hyperlink'],
            'color' => $validatedData['color'],
        ]);

        if ($request->routeIs('settings.update')) {
            return redirect()->route('dashboard')->with('status', 'Settings updated successfully!');
        } else {
            return redirect()->route('settings.index')->with('status', 'Settings updated successfully!');
        }

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $button = Button::where('id', $id)->first();
        $user = auth()->user();

        //Ensure there is such button and if it's owner is the currently authenticated user
        if ($button && $button->owner_id == $user->id) {
            Button::where('id', $id)->delete();
        }else{
            return redirect()->back()->with('error', 'Error deleting button!');
        }
        return redirect(route('dashboard'))->with('status'. 'Button deleted!');
    }
}
