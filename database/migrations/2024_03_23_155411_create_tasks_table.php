<?php

use App\Enums\TaskStatusEnum;
use App\Models\Product;
use App\Models\User;
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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('product_id');
            $table->uuid()->unique();
            $table->string('code')->unique();
            $table->string('name');
            $table->string('start_date');
            $table->string('end_date');
            $table->text('instructions');
            $table->string('task_link')->nullable();
            $table->integer('commission');
            $table->integer('quota');
            $table->boolean('is_published')->default(false);
            $table->string('status', 20)->default(TaskStatusEnum::PENDING);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
