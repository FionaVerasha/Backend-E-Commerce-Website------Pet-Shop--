<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

try {
    echo "Columns in users:\n";
    print_r(Schema::getColumnListing('users'));

    echo "Dropping products table if exists...\n";
    DB::statement('SET FOREIGN_KEY_CHECKS=0');
    Schema::dropIfExists('products');
    DB::statement('SET FOREIGN_KEY_CHECKS=1');
    echo "Done.\n";

    echo "Migrations table:\n";
    $m = DB::table('migrations')->get();
    foreach ($m as $r) {
        echo " - " . $r->migration . " (batch " . $r->batch . ")\n";
    }

    echo "\nTables in DB:\n";
    $tables = DB::select('SHOW TABLES');
    foreach ($tables as $t) {
        echo " - " . array_values((array) $t)[0] . "\n";
    }

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
