<?php

use App\Models\PassportKey;
use Illuminate\Database\Seeder;

class PassportKeySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $passport = new PassportKey;
        $passport->name = 'Jobportal API Personal Access Client';
        $passport->secret = 'aNpIzmh03oLuX9eqGf2gkxHlgKtSTtUC2aokInCV';
        $passport->redirect = 'https://chillwisper.test.com';
        $passport->personal_access_client = 1;
        $passport->password_client = 0;
        $passport->revoked = 0;
        $passport->save();
        $passport = new PassportKey;
        $passport->name = 'Jobportal API Password Grant Client';
        $passport->secret = 'niYp1q5ycMdSP9xB5y6Qsi5FxJLw6Zn40FCOrMvo';
        $passport->redirect = 'https://chillwisper.test.com';
        $passport->personal_access_client = 0;
        $passport->password_client = 1;
        $passport->revoked = 0;
        $passport->save();
    }
}
