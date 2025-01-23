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
        //
        Schema::table('items', function (Blueprint $table) {
            //
            $table->renameColumn('sub_category','number_of_rooms')->default('1');
            $table->renameColumn('suitable_purposes','number_of_washrooms')->default('1');
            $table->renameColumn('feature','number_of_balconies')->default('1');

            $table->integer('number_of_rooms')->change();
            $table->integer('number_of_washrooms')->change();
            $table->integer('number_of_balconies')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
