<?php

namespace Litepost\Http\Controllers\Admin;

use Litepost\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Litepost\Models\Language;

class LanguagesController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $langs = Language::paginate(15);

        return view('litepost::pages.languages.index', [
            'langs' => $langs
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:languages',
            'code' => 'required|unique:languages'
        ]);

        $lang = Language::findOrFail($id);

        $lang->name = $request->input('name');
        $lang->code = $request->input('code');

        $lang->save();

        return redirect()->route('litepost.languages');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lang = Language::findOrFail($id);
        $view = 'edit';

        return view('litepost::pages.post-types.create', [
            'lang' => $lang,
            'view' => $view
        ]);
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
        $request->validate([
            'name' => 'required|unique:languages',
            'code' => 'required|unique:languages'
        ]);

        $lang = Language::findOrFail($id);

        $lang->name = $request->input('name');
        $lang->code = $request->input('code');

        $lang->save();

        return redirect()->route('litepost.languages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lang = Language::findOrFail($id);

        $lang->delete();

        return redirect()->route('litepost.languages');

    }
}
