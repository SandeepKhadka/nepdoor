<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('category')->nullable();
            $table->unsignedBigInteger('package_id')->nullable();
            $table->string('billing_id');
            $table->text('message')->nullable();
            $table->enum('status',['Active', 'Inactive'])->default('Inactive');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            // $table->foreign('cat_id')->references('id')->on('package_categories')->onDelete('set null');
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('set null');
            // $table->foreign('billing_id')->references('id')->on('billings')->onDelete('set null');
            $table->timestamp('start_date')->useCurrent();
            $table->date('end_date');
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
        Schema::dropIfExists('subscriptions');
    }
};
