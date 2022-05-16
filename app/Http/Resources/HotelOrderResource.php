<?php

namespace App\Http\Resources;

use App\Models\OrderItem;
use Illuminate\Http\Resources\Json\JsonResource;

class HotelOrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id'=>$this->user_id,
            'status'=>$this->status,
            'created_at'=>$this->created_at,
            'total_price'=>$this->total_price,
            'order_items_count'=>$this->order_items_count,
            'hotel_order_items'=> (OrderItemResource::collection($this->hotel_order_items)),
        ];
    }
}
