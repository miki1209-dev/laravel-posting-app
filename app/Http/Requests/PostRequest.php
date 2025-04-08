<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 */
	public function authorize(): bool
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
	 */
	public function rules(): array
	{
		return [
			'title' => 'required|max:40',
			'content' => 'required|max:200'
		];
	}

	public function message(): array
	{
		return [
			'title.required' => ':attributeは必須です。',
			'title.max' => ':attributeは40文字以内で入力してください。',
			'content.required' => ':attributeは必須です',
			'content.max' => ':attributeは200文字以内で入力してください。'
		];
	}

	public function attributes(): array
	{
		return [
			'title' => 'タイトル',
			'content' => '内容'
		];
	}
}
