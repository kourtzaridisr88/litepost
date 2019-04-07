<?php

namespace Litepost\Http\Controllers\Admin;

use Litepost\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Litepost\Models\Field;

class FieldsController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $postTypeId = $request->input('postType');

        $fields = Field::where('post_type_id', $postTypeId)->get();

        return view('litepost::pages.fields.index', [
            'view' => 'index',
            'fields' => $fields,
            'postTypeId' => $postTypeId
        ]);
    }

    /**
     * Show the form form createing new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $postTypeId = $request->input('postType');

        return view('litepost::pages.fields.create', [
            'view' => 'create',
            'postTypeId' => $postTypeId
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
            'post_type_id' => 'required',
            'label' => 'required',
            'name' => 'required',
            'type' => 'required'
        ]);

        Field::createField($request->all());

        return redirect()->route('litepost.fields', [
            'postType' => $request->input('post_type_id')
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $field = Field::find($id);

        return view('litepost::pages.fields.edit', [
            'view' => 'edit',
            'postTypeId' => $request->input('post_type_id'),
            'field' => $field
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
            'post_type_id' => 'required',
            'label' => 'required',
            'name' => 'required',
            'type' => 'required'
        ]);

        $field = Field::find($id);

        $field->post_type_id = $request->input('post_type_id');
        $field->label = $request->input('label');
        $field->name = $request->input('name');
        $field->type = $request->input('type');

        $field->save();

        return redirect()->route('litepost.fields', [
            'postType' => $request->input('post_type_id')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $field = Field::findOrFail($id);

        $field->delete();

        return redirect()->route('litepost.fields', [
            'postType' => $request->input('post_type_id')
        ]);

    }
}
