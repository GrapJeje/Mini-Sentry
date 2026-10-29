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
        if (! $this->shouldRun()) return;

        Schema::create('mini_sentry_exceptions', function (Blueprint $table) {
            $table->id();
            $table->string('exception_type');
            $table->string('exception_message');
            $table->string('exception_file');
            $table->string('exception_line');

            $table->unique(['exception_type', 'exception_message', 'exception_file', 'exception_line']);
        });

        Schema::create('mini_sentry_exceptions_usage', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exception_id')->constrained('mini_sentry_exceptions');
            $table->timestamp('created_at')->useCurrent();
            $table->integer('duration');
            $table->integer('database_duration')->nullable();
            $table->integer('cpu_time')->nullable();
            $table->integer('memory_usage')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mini_sentry_exceptions_usage');
        Schema::dropIfExists('mini_sentry_exceptions');
    }
};
