<?php

namespace App\Http\Controllers\Admin;

use App\Content;
use App\Http\Requests\ContentRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Meta;
use App\Relationship;
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
        $categorys = $this->getCategory();
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
        $cid = Content::create($request->postFillCreateData())->cid;
        $this->storeCategory($cid, $request->postFillCategoryData());
        $this->storeTag($cid, $request->postFillTagData());
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
        $cid = $content->cid;
        $categorys = $this->getCategory();
        
        $relationshipsChecked = $this->relationshipsChecked($cid);
        $categorysChecked = $relationshipsChecked['categorys'];
        $tagsChecked = '';

        //处理tags, 分号隔开变成字符串
        foreach ($relationshipsChecked['tags'] as $tag) {
            $tagsChecked .= $tag->name.';';
        }
        $tagsChecked = trim($tagsChecked, ';');
        
        return view('admin.content.edit', compact('content', 'categorys', 'categorysChecked', 'tagsChecked'));
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
        $content->update($request->postFillCreateData());
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
    
    public function getCategory()
    {
        return Meta::category()->get();
    }

    public function storeCategory($cid, $categorys)
    {
        if($categorys){
            foreach ($categorys as $category){
                Relationship::create(['cid' => $cid, 'mid' => $category]);
            }
        }
    }

    public function storeTag($cid, $tags)
    {
        if($tags){
            foreach ($tags as $tag){
                $tagModel = Meta::tag()->where(['name' => $tag])->first();
                if($tagModel){
                    $mid = $tagModel->mid;
                    $tagModel->count++;
                    $tagModel->save();
                }else{
                    $mid = Meta::create([
                        'name' => $tag,
                        'type' => 'tag',
                        'count' => 1
                    ])->mid;
                }
                Relationship::create(['cid' =>$cid, 'mid' => $mid]);
            }
        }
    }

    public function relationshipsChecked($cid)
    {
        $categorys = [];
        $tags = [];
        $relationships = Relationship::where(['cid' => $cid])->get();
        foreach ($relationships as $relationship){
            if($relationship->meta->type == 'category'){
                $categorys[] = $relationship->meta;
            }elseif ($relationship->meta->type == 'tag'){
                $tags[] = $relationship->meta;
            }
        }
        return [
            'categorys' => $categorys,
            'tags' => $tags,
        ];
    }
    
}
