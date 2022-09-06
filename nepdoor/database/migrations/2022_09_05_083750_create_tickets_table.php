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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('token_id');
            $table->unsignedBigInteger('subs_id')->nullable();
            $table->text('title');
            $table->enum('priority', ['Normal' , 'Urgent'])->default('Normal');
            $table->longtext('message');
            $table->enum('ticket_status', ['Opened' , 'Closed'])->default('Opened');
            $table->enum('status', ['Active' , 'Inactive'])->default('Active');
            $table->foreign('subs_id')->references('id')->on('subscriptions')->onDelete('set null');
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
        Schema::dropIfExists('tickets');
    }
};
