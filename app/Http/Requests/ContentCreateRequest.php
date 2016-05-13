<?php

namespace App\Http\Requests;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Requests\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ContentCreateRequest extends Request
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

    public function postFillData(){
        return [
            'title' => $this->title,
            'text' => $this->text,
            'author' => 1,
            'last_edit_time' => Carbon::now()->toDateTimeString(),
        ];
    }
}
