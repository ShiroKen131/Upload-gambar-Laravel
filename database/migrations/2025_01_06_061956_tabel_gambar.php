<?php
// database/migrations/[timestamp]_create_gambars_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('gambars', function (Blueprint $table) {
            $table->id('id_gambar');
            $table->string('file_name', 255)->notNullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gambars');
    }
};