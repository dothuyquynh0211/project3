<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateOverallReportViews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE VIEW report_warehouses AS 
        SELECT products.*,(sum_import.quantity_import - sum_invoice.quantity_invoice ) AS product_inventory , sum_invoice.quantity_invoice ,sum_import.quantity_import 
        FROM (
            SELECT sum(quantity) AS quantity_invoice , id_product FROM `invoice_details` GROUP BY id_product
            ) AS sum_invoice
        JOIN(
            SELECT sum(quantity) AS quantity_import , id_product FROM `import_details` GROUP BY id_product
            ) AS sum_import ON sum_invoice.id_product = sum_import.id_product 
        JOIN products ON sum_import.id_product = products.id " 
           
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('overall_report_views');
    }
}