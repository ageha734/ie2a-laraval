<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory;

    use SoftDeletes;    //論理削除を行う場合は追加する。
    //当該ﾓﾃﾞﾙｸﾗｽとarticlesﾃｰﾌﾞﾙを紐づける。命名規則に基づくため、なくても可
    protected $table = 'articles';
    protected $primaryKey = 'id';

	// Thumbnailテーブルとの関連付け（1対多）
    public function thumbnails()
    {
        return $this->hasMany(Thumbnail::class);
    }

    // Thumbnailテーブルとの関連付け（1対1）
    public function thumbnail()
    {
        return $this->hasOne(Thumbnail::class)->latestOfMany();
    }

    //Articleレコードを論路削除した際に、該当Thumbnailレコードも削除する
    public static function boot()
    {
        parent::boot();

        static::deleted(function ($article) {
            $article->thumbnails()->delete();
        });
    }

}
