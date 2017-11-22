<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    public function authorize()
    {
    return true;

    } 
   
    public function rules()
    {
        $id = $this->article;
        return [
        'title' => 'required|unique:articles,title|max:255',
        'content' => 'required|unique:articles,content|min:50',
          'image' => 'required|image|mimes:jpg,jpeg,png|max:2048'        
      ];
    }

    public function messages()
    {
        return [
        'title.required' => 'Title is required, at least fill a
        character',
        'title.unique' => 'Title must unique, take another title'   
        ];
    }       
}

