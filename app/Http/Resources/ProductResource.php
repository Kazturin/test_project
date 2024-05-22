<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'article' => $this->article,
            'status' => $this->status,
            'data' => $this->when($this->data!==NULL, function(){
                $data='';
                foreach ($this->data as $item){
                    $data.=$item['key'] .': '. $item['value'].', ';
                }
                return rtrim($data, ', ');
            })
        ];
    }
}
