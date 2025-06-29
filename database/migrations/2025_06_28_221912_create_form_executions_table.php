<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('form_executions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('google_form_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->integer('total_responses');
            $table->integer('completed_responses')->default(0);
            $table->integer('failed_responses')->default(0);
            $table->enum('status', ['pending', 'running', 'completed', 'failed'])->default('pending');
            $table->integer('delay_seconds')->default(5); // Delay antar request
            $table->timestamp('started_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('form_executions');
    }
};
