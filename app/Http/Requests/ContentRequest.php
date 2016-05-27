<?php

namespace App\Http\Requests;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Requests\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ContentRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'text' => 'required'
        ];
    }

    public function postFillCreateData(){
        return [
            'title' => $this->title,
            'text' => $this->text,
            'category' => $this->category,
            'tag' => $this->tag,
            'author' => Auth::id(),
            'last_edit_time' => Carbon::now(),
        ];
    }

    public function postFillCategoryData(){
        return $this->category;
    }

    public function postFillTagData(){
        return [
            'tag' => $this->tag,
        ];
    }
}
