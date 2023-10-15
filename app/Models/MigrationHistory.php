<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MigrationHistory extends Model
{
    /**
     * モデルに関連付けるテーブル
     */
    protected $table = 'migrations';

    /**
     * 主キー
     */
    protected $primaryKey = 'id';

    /**
     * バッチ単位で取得
     */
    public static function getBatch()
    {
        return self::groupBy('batch')->get();
    }
}
