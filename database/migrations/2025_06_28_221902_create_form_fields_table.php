<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('form_fields', function (Blueprint $table) {
            $table->id();
            $table->foreignId('google_form_id')->constrained()->onDelete('cascade');
            $table->string('field_name');
            $table->string('field_id'); // Google Form field ID
            $table->enum('value_type', ['fixed', 'random', 'list']); // Tipe nilai
            $table->text('value_data'); // JSON untuk menyimpan nilai
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('form_fields');
    }
};
