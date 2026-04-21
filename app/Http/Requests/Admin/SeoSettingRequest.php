<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SeoSettingRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Add your admin auth check here, e.g.:
        // return auth()->user()?->isAdmin() ?? false;
        return true;
    }

    public function rules(): array
    {
       $id = $this->route('seo')?->id;

        return [
            'route_name'          => "required|string|max:150|unique:seo_settings,route_name,{$id}",
            'page_label'          => 'required|string|max:150',

            // Core SEO
            'title'               => 'nullable|string|max:70',
            'description'         => 'nullable|string|max:165',
            'keywords'            => 'nullable|string|max:500',
            'canonical_url'       => 'nullable|url|max:500',
            'robots'              => 'required|in:index, follow,noindex, follow,index, nofollow,noindex, nofollow',

            // Open Graph
            'og_title'            => 'nullable|string|max:95',
            'og_description'      => 'nullable|string|max:200',
            'og_image'            => 'nullable|string|max:500',
            'og_type'             => 'required|in:website,article,product',

            // Twitter
            'twitter_card'        => 'required|string|max:30',
            'twitter_title'       => 'nullable|string|max:70',
            'twitter_description' => 'nullable|string|max:200',
            'twitter_image'       => 'nullable|string|max:500',
            'twitter_site'        => 'nullable|string|max:50',

            // Extras
            'published_at'        => 'nullable|date',
            'custom_head_tags'    => 'nullable|string|max:5000',
            'is_active'           => 'sometimes|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'title.max'       => 'Title should be under 70 characters for best SEO results.',
            'description.max' => 'Description should be under 165 characters for best SEO results.',
            'route_name.unique' => 'SEO settings for this route already exist. Edit the existing entry instead.',
        ];
    }

    protected function prepareForValidation(): void
    {
        // Checkbox comes as null when unchecked
        $this->merge([
            'is_active' => $this->boolean('is_active'),
        ]);
    }
}
