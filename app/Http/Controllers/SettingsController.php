<?php

namespace App\Http\Controllers;

use App\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Settings::all();

        return view('settings.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('settings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'currency_name' => 'required',
            'currency_symbol' => 'required',
            'shop_name' => 'required'
        ]);
        $setting = new Settings([
            'currency_name' => $request->get('currency_name'),
            'currency_symbol' => $request->get('currency_symbol'),
            'shop_name' => $request->get('shop_name')
        ]);
        $setting->save();

        return redirect('/settings')->with('success', 'Settings Created');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setting = Settings::find($id);
        return view('settings.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'currency_name' => 'required',
            'currency_symbol' => 'required',
            'shop_name' => 'required'
        ]);
        $setting = Settings::find($id);
        $setting->currency_name = $request->get('currency_name');
        $setting->currency_symbol = $request->get('currency_symbol');
        $setting->shop_name = $request->get('shop_name');
        $setting->save();
        return redirect('settings/' . $id . '/edit')->with('success', 'Updated settings successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $setting = Settings::find($id);
        $setting->delete;
        return redirect()->route('settings.index')->with('success', 'Deleted Sucessfully');
    }
}
