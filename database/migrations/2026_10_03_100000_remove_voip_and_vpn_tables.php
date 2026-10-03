<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class RemoveVoipAndVpnTables extends Migration
{
    /**
     * Remove the retired feature tables from existing installations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('voip_dialer_orders');
        Schema::dropIfExists('voip_hosting_domain_orders');
        Schema::dropIfExists('vpn_package_orders');
        Schema::dropIfExists('voip_dialers');
        Schema::dropIfExists('voip_hosting_domains');
        Schema::dropIfExists('vpn_packages');
    }

    /**
     * This retired feature is intentionally not recreated on rollback.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
