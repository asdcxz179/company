<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberPointsRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_points_record', function (Blueprint $table) {
            $table->id();
            $table->uuid('user_id');
            $table->unsignedTinyInteger('type');
            $table->string('cost_type');
            $table->decimal('before_point',16,2);
            $table->decimal('after_point',16,2);
            $table->decimal('cost',16,2);
            $table->text('remark')->nullable();
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
        Schema::dropIfExists('member_points_record');
    }
}
