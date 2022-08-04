<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Good;
use App\Models\Region;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_tags', function (Blueprint $table) {
            $table->id();
            $table->integer("price_purchase");
            $table->integer("price_selling");
            $table->integer("price_discount");
            $table->foreignIdFor(Good::class);
            $table->foreignIdFor(Region::class);
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
        Schema::dropIfExists('price_tags');
    }
};
