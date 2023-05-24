<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Thumbnail extends Model
{
    use HasFactory;
    use SoftDeletes;
    //当該ﾓﾃﾞﾙｸﾗｽとthumbnailsﾃｰﾌﾞﾙを紐づける。命名規則に基づくため、なくても可
    protected $table = 'thumbnails';
    protected $primaryKey = 'id';  //主キーの設定。デフォルトはidのため、省略可

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

}
