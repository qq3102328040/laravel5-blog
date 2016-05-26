<?php

namespace App\Http\Controllers\Admin;

use App\Content;
use App\Http\Requests\ContentRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Meta;
use Illuminate\Support\Facades\Auth;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        dd(User::find(1)->hasManyContent);
//        dd(Content::where('cid', 1)->first()->belongsToUser);
        $contents = Content::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.content.index', compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = Meta::category()->get();
        return view('admin.content.create', compact('categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContentRequest $request)
    {
        Content::create($request->postFillData());
        return redirect()->route('admin.content.index');
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
        $content = Content::where(['cid' => $id])->first();
        $cotegorys = Meta::category()->get();
        return view('admin.content.edit', compact('content', 'categorys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContentRequest $request, $id)
    {
        $content = Content::where(['cid' => $id])->first();
        $content->update($request->postFillData());
        return redirect()->route('admin.content.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
