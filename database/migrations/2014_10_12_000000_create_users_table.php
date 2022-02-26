<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('email')->unique();            
            $table->enum('isteacher',[1,2])->default(1)->nullable();
            $table->string('realname')->nullable();
            $table->string('introduction')->nullable();
            $table->longtext('about')->nullable();
            $table->string('class_link')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('num_classes')->default(1)->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
