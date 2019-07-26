<?php

use Illuminate\Database\Seeder;

class PackagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\ContributionPackages::create([
        	'package' => 'BASIC',
        	'level' => 1,
            'amount' => 325
        ]);

        App\ContributionPackages::create([
        	'package' => 'STANDARD',
        	'level' => 1,
            'amount' => 3250
        ]);

        App\ContributionPackages::create([
        	'package' => 'Premium',
        	'level' => 1,
            'amount' => 6500
        ]);


        App\ContributionPackages::create([
        	'package' => 'BASIC',
        	'level' => 2,
            'amount' => 780
        ]);

        App\ContributionPackages::create([
        	'package' => 'STANDARD',
        	'level' => 2,
            'amount' => 7800
        ]);

        App\ContributionPackages::create([
        	'package' => 'Premium',
        	'level' => 2,
            'amount' => 15600
        ]);


        App\ContributionPackages::create([
        	'package' => 'BASIC',
        	'level' => 3,
            'amount' => 1625
        ]);

        App\ContributionPackages::create([
        	'package' => 'STANDARD',
        	'level' => 3,
            'amount' => 16250
        ]);

        App\ContributionPackages::create([
        	'package' => 'Premium',
        	'level' => 3,
            'amount' => 32500
        ]);


        App\ContributionPackages::create([
        	'package' => 'BASIC',
        	'level' => 4,
            'amount' => 3250
        ]);

        App\ContributionPackages::create([
        	'package' => 'STANDARD',
        	'level' => 4,
            'amount' => 32500
        ]);

        App\ContributionPackages::create([
        	'package' => 'Premium',
        	'level' => 4,
            'amount' => 65000
        ]);

        App\ContributionPackages::create([
        	'package' => 'BASIC',
        	'level' => 5,
            'amount' => 6500
        ]);

        App\ContributionPackages::create([
        	'package' => 'STANDARD',
        	'level' => 5,
            'amount' => 65000
        ]);

        App\ContributionPackages::create([
        	'package' => 'Premium',
        	'level' => 5,
            'amount' => 130000
        ]);


        App\ContributionPackages::create([
        	'package' => 'BASIC',
        	'level' => 6,
            'amount' => 13000   
        ]);

        App\ContributionPackages::create([
        	'package' => 'STANDARD',
        	'level' => 6,
            'amount' => 130000
        ]);

        App\ContributionPackages::create([
        	'package' => 'Premium',
        	'level' => 6,
            'amount' => 260000
        ]);


        App\ContributionPackages::create([
        	'package' => 'BASIC',
        	'level' => 7,
            'amount' => 26000
        ]);

        App\ContributionPackages::create([
        	'package' => 'STANDARD',
        	'level' => 7,
            'amount' => 260000
        ]);

        App\ContributionPackages::create([
        	'package' => 'Premium',
        	'level' => 7,
            'amount' => 520000
        ]);
    }
}
