<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMandatoryDisclosuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mandatory_disclosures', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->text('dled_md_format')->nullable()->default(null);
            $table->text('bed_md_format')->nullable()->default(null);
            $table->text('balance_sheet')->nullable()->default(null);
            $table->text('income_and_expenditure')->nullable()->default(null);
            $table->text('receipt_payment')->nullable()->default(null);
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
        Schema::dropIfExists('mandatory_disclosures');
    }
}
