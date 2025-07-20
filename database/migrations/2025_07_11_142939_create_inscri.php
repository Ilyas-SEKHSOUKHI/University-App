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
        Schema::create('inscri', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string("cne");
            $table->string("cin");
            $table->string("date_naiss");
            $table->string("adresse");
            $table->string('photo')->nullable();
            $table->string("genre");
            $table->string("f_f_name");
            $table->string("m_f_name");
            $table->string("f_profession");
            $table->string("m_profession");
            $table->string("f_tel");
            $table->string("m_tel");
            $table->string("telephone");
            $table->string("bac_serie");
            $table->string("bac_mention");
            $table->string("niveau_actuel");
            $table->string("modules_valides");
            $table->string("bac_town");
            $table->string("motif");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscri');
    }
};
