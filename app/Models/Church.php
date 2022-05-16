<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Church extends Model
{
    use HasFactory;

    protected $fillable = ['id','name','address','details','available_time','available_day','visitors_count','area_space',
        'phone_number','map'];
    protected $appends = ['church_image'];
    protected $casts = [

    ];


    public function media(){
        return $this->morphOne(Media::class,'mediable');
    }

    public function getChurchImageAttribute(){
        return $this->media ? ($this->media->name? url('/storage/'.$this->media->name) : url('control_panel_styles\images\faces\face2.jpg')) : url('control_panel_styles\images\faces\face4.jpg');
    }
}
