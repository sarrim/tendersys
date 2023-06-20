<?php

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
        Schema::create('business_profiles', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('business_name');
            $table->string('email_address')->nullable();
            $table->string('contact_person');
            $table->string('contact_number');
            $table->string('business_city')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('business_address');
            $table->string('business_latitude')->nullable();
            $table->string('business_longitude')->nullable();
            $table->tinyInteger('business_status')->default(2);
            $table->string('business_profile')->nullable();
            $table->string('business_logo')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('business_profiles');
    }
};
