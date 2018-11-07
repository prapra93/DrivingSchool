<?php
use Migrations\AbstractSeed;

/**
 * Vehicules seed.
 */
class VehiculesSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => '2',
                'make' => 'Toyota',
                'model' => 'yaris',
                'plate' => 'R78 H87',
                'created' => '2017-10-01 04:34:22',
                'modified' => '2017-10-01 04:34:22',
                'user_id' => NULL,
                'subcategory_id' => NULL,
            ],
            [
                'id' => '3',
                'make' => 'Nissan',
                'model' => 'Versa',
                'plate' => 'T69 HG6',
                'created' => '2017-10-01 04:35:56',
                'modified' => '2017-10-01 04:35:56',
                'user_id' => NULL,
                'subcategory_id' => NULL,
            ],
            [
                'id' => '4',
                'make' => 'Honda',
                'model' => 'Fit',
                'plate' => 'HF7 HUO',
                'created' => '2017-10-01 04:36:24',
                'modified' => '2017-10-01 04:36:24',
                'user_id' => NULL,
                'subcategory_id' => NULL,
            ],
            [
                'id' => '5',
                'make' => 'Hyundai',
                'model' => 'Accent',
                'plate' => 'HG6 D45',
                'created' => '2017-10-01 04:37:43',
                'modified' => '2017-10-01 04:37:43',
                'user_id' => NULL,
                'subcategory_id' => NULL,
            ],
            [
                'id' => '7',
                'make' => 'Mazda',
                'model' => '3 Hatchback',
                'plate' => 'E77 897',
                'created' => '2017-10-02 19:24:09',
                'modified' => '2017-10-02 19:24:09',
                'user_id' => NULL,
                'subcategory_id' => NULL,
            ],
            [
                'id' => '11',
                'make' => 'Kawasaki',
                'model' => 'Ninja',
                'plate' => 'TES123',
                'created' => '11/14/17, 6:47 AM',
                'modified' => '11/14/17, 6:47 AM',
                'user_id' => '21',
                'subcategory_id' => NULL,
            ],
        ];

        $table = $this->table('vehicules');
        $table->insert($data)->save();
    }
}
