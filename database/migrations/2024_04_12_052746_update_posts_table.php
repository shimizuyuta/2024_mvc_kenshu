<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // imageカラムを削除
            $table->dropColumn('image');
            
            // descriptionカラムの名前をcontentに変更
            $table->renameColumn('description', 'content');

            // typeカラムを追加（enumタイプ）
            $table->enum('type', ['本番環境', '開発環境', 'デモ環境'])->default('開発環境');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // 変更をロールバックする処理
            $table->string('image')->nullable();
            $table->renameColumn('content', 'description');
            $table->dropColumn('type');
        });
    }
};
