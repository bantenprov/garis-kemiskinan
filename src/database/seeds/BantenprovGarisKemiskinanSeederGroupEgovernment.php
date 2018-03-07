<?php

/* Require */
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

/* Models */
use Bantenprov\GarisKemiskinan\Models\Bantenprov\GarisKemiskinan\GarisKemiskinan;

class BantenprovGarisKemiskinanSeederGarisKemiskinan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
	public function run()
	{
        Model::unguard();

        $garis_kemiskinans = (object) [
            (object) [
                'label' => 'G2G',
                'description' => 'Goverment to Goverment',
            ],
            (object) [
                'label' => 'G2E',
                'description' => 'Goverment to Employee',
            ],
            (object) [
                'label' => 'G2C',
                'description' => 'Goverment to Citizen',
            ],
            (object) [
                'label' => 'G2B',
                'description' => 'Goverment to Business',
            ],
        ];

        foreach ($garis_kemiskinans as $garis_kemiskinan) {
            $model = GarisKemiskinan::updateOrCreate(
                [
                    'label' => $garis_kemiskinan->label,
                ],
                [
                    'description' => $garis_kemiskinan->description,
                ]
            );
            $model->save();
        }
	}
}
