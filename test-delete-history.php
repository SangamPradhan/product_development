<?php

require 'vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

try {
    $count = DB::table('chat_histories')->count();
    echo "Before: $count rows.\n";
    
    DB::table('chat_histories')->truncate();
    
    $countAfter = DB::table('chat_histories')->count();
    echo "After: $countAfter rows.\n";
} catch (\Exception $e) {
    echo "ERROR: " . $e->getMessage();
}
