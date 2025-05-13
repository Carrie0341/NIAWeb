<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
  protected $fillable = [
    'title',
    'event_date',
    'content',
    'cover_image',
    'alliance_id',
    'is_active'
  ];

  protected $dates = [
    'event_date',
    'created_at',
    'updated_at'
  ];

  // 關聯到多張圖片
  public function images()
  {
    return $this->hasMany(EventImage::class)->orderBy('sort_order', 'asc');
  }

  // 關聯到聯盟
  public function alliance()
  {
    return $this->belongsTo(Alliance::class);
  }
}
