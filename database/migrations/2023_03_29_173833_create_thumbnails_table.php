<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThumbnailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('thumbnails')) {
            // テーブルが存在していればリターン
            return;
        }
        Schema::create('thumbnails', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->foreignId('article_id')->constrained('articles')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thumbnails');
    }
}
