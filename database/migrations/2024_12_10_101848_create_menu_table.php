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
        Schema::create('menu', function (Blueprint $table) {
            $table->id();
            $table->string('name',1000);
            $table->string('link',1000)->nullable();
            $table->string('type',1000);
            $table->enum('position',['mainmenu','footermenu'])->default('mainmenu');
            $table->unsignedInteger('table_id')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->unsignedInteger('parent_id')->default(0);
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('updated_by')->nullable();
            $table->softDeletes('deleted_at');
            $table->unsignedInteger('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu');
    }
};
