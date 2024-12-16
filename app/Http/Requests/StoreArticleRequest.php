<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
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
      'title' => 'required|string|max:255',
      'content' => 'required|string',
      'src_type.*' => 'required|in:file,url',
      'media_type.*' => 'required|in:img,vid',
      'media_file.*' => 'nullable|file|mimes:jpeg,png,jpg,mp4,mov|max:20480', // Allow images/videos up to 20MB
      'media_url.*' => 'nullable|url', // Validate YouTube or other URLs
    ];
  }
}
