<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enquiries', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id');  
            $table->string('services');  
            $table->string('from_id');  
            $table->string('to_id');
            $table->date('timeframe');
            $table->integer('status')->default(0);  
            $table->integer('reference_no');  
            $table->integer('country_id');  
            $table->integer('region_id');
            $table->string('subject');  
            $table->string('body'); 
            $table->string('sender_type');
            $table->integer('isVerified');   
            $table->integer('Is_Drafted');  
            $table->integer('Is_Limitted');  
            $table->integer('Is_External');    
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
        Schema::dropIfExists('enquiries');
    }
}
