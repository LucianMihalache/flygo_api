<?php

use App\Models\Source\Direction;
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
        Schema::create('crosswords', function (Blueprint $table) {
            $table->id();
            $table->string('answer');
            $table->string('clue');
            $table->string('length');
            $table->timestamp('date')->index();
            $table->enum('direction', [Direction::Across->value, Direction::Down->value]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crosswords');
    }
};
