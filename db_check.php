<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

$count = \App\Models\Project::count();
echo "Total Projects: " . $count . "\n";
foreach (\App\Models\Project::all() as $p) {
    echo "ID: " . $p->id . " | Title: " . $p->title . " | Slug: " . $p->slug . " | Featured: " . ($p->is_featured ? 'Yes' : 'No') . "\n";
}
