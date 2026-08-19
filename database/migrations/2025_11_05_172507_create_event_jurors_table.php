<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('event_jurors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained('events')->onDelete('cascade');
            $table->foreignId('juror_user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
            
            $table->unique(['event_id', 'juror_user_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('event_jurors');
    }
};