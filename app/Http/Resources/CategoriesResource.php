<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\SubCategoryResource;

class Categories extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return $this->resource ? [
            'category_id' => $this->id,
            'category_name' => $this->category_name,
            'created_at' => $this->created_at,
            'image_path' => $this->image_path,
            'sub_categories' => $this->resource ? $this->resource->map(function ($item) {
                return new SubCategoryResource($item);
            }) : null,
        ] : null;
    }
}
