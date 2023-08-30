<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Game;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->softDeletes();
            $table->string(Game::CAMPO_NAME);
            $table->string(Game::CAMPO_DESCRIPTION);
            $table->float(Game::CAMPO_PRICE);
            $table->date(Game::CAMPO_RELEASE_DATE);
            $table->unsignedBigInteger(Game::CAMPO_USER_ID)->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Game::TABELA_GAMES);
    }
};
