<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProfileTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            // preferences
            $table->integer('indexed');
            $table->integer('mailOn');
            // personal info
            $table->string('location')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('language1')->nullable();
            $table->string('language2')->nullable();
            $table->string('language3')->nullable();
            $table->string('language4')->nullable();
            $table->string('language5')->nullable();
            $table->text('about')->nullable();
            // application info
            $table->text('experiences')->nullable();
            $table->text('interests')->nullable();
            $table->text('looking_to_do')->nullable();
            $table->text('skills')->nullable();
            $table->text('legal')->nullable();
            $table->text('prices')->nullable();
            $table->string('website')->nullable();
            $table->string('skype')->nullable();
            $table->string('facebook')->nullable();
            $table->string('phone_number')->nullable();
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
        Schema::drop('profiles');
    }
}

