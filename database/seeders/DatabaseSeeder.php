<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(StaticOptionSeeder::class);
        $this->call(WebsiteClientSeeder::class);
        $this->call(WebsiteGraphicSeeder::class);
        $this->call(WebsiteBannerSeeder::class);
        $this->call(BulkSmsSeeder::class);
        $this->call(HostingPackageSeeder::class);
        $this->call(BlogSeeder::class);
        $this->call(GallerySeeder::class);
        $this->call(FaqSeeder::class);
        $this->call(RoleAndPermissionSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(TestimonialSeeder::class);
        $this->call(HomeContentSeeder::class);
        $this->call(WebDesignSeeder::class);
        $this->call(WebDesignPackageSeeder::class);
        $this->call(SoftwareCompanyDemoSeeder::class);
    }
}
