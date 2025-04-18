<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function(Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->date('end_date');
            $table->integer("status");
            $table->float("value");
            $table->timestamps();

            $table->unsignedBigInteger('client_id')->nullable();
            $table->foreign("client_id")->references('id')->on('clients')->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('expenses', function (Blueprint $table) {
            if (Schema::hasTable('expenses') && Schema::hasColumn('expenses', 'project_id')) {
                $table->dropForeign(['project_id']); // Only drop if it exists
            }
        });
        Schema::table('receipts', function (Blueprint $table) {
            if (Schema::hasTable('receipts') && Schema::hasColumn('receipts', 'project_id')) {
                $table->dropForeign(['project_id']); // Only drop if it exists
            }
        });

        Schema::dropIfExists('projects');
    }
};
