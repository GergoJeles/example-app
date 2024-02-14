<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('home_office_requests', function (Blueprint $table) {
            $table->foreignId('supervisor_id')->constrained('supervisors')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('home_office_requests', function (Blueprint $table) {
            $table->dropConstrainedForeignId('supervisor_id');
        });
    }
};
