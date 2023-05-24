<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        //画像データがある場合は、そのURLをない場合はnullをセット
        if (!isset($this->thumbnails->name)) {
            $name = null;
        } else {
            $name = asset('/storage/article_images/' . $this->thumbnails->name);
        }
        return [
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body,
            'created_at' => $this->created_at,
            'thumbnail' => $name,
        ];
    }
}
