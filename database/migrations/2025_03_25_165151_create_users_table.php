<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            // Basic Auth
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();

            // Profile Data
            $table->string('phone')->nullable();
            $table->string('avatar')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();

            // Ride-Specific Fields
            $table->enum('role', ['driver', 'passenger'])->default('passenger');
            $table->string('driver_license')->nullable(); // For drivers only
            $table->string('vehicle_type')->nullable();   // e.g., 'sedan', 'SUV'
            $table->string('vehicle_plate')->nullable();  // License plate

            // Location
            $table->decimal('current_lat', 10, 8)->nullable();
            $table->decimal('current_lng', 11, 8)->nullable();
            $table->boolean('is_online')->default(false); // For driver availability

            // Timestamps
            $table->timestamps();
            $table->softDeletes(); // For account deactivation
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
