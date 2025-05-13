<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EventImage extends Model
{
  protected $fillable = [
    'event_id',
    'image_path',
    'sort_order'
  ];

  // 關聯到活動
  public function event()
  {
    return $this->belongsTo(Event::class);
  }
}
