<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Meta;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $categorys = Meta::orderBy('created_at', 'desc')->paginate(10);
        $categorys = Meta::category()->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.category.index', compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category = $request->postFillData();
        Meta::create($category);
        return redirect(route('admin.category.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorys = Meta::category()->orderBy('created_at', 'desc')->paginate(10);
        $data = Meta::category()->where(['mid' => $id])->first();
        return view('admin.category.edit')->with([
            'categorys' => $categorys,
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        Meta::category()->where(['mid' => $id])->first()->update($request->postFillData());
        return redirect(route('admin.category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Meta::category()->where(['mid' => $id])->delete());
        return redirect(route('admin.category.index'));
    }
}
