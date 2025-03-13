<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('npt_post', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('topic_id')->nullable();
            $table->string('title', 1000);
            $table->string('slug', 1000);
            $table->mediumtext('detail');
            $table->string('image', 1000);
            $table->enum('type', ['post', 'page']);
            $table->text('description')->nullable();
            $table->timestamps();//created_at, updated_at
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('updated_by');
            $table->unsignedTinyInteger('status')->default(2);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('npt_post');
    }
};