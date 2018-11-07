<?php
namespace App\Test\TestCase\Controller;

use App\Controller\VehiculesController;
use Cake\TestSuite\IntegrationTestCase;
use Cake\Routing\Router;

/**
 * App\Controller\VehiculesController Test Case
 */
class VehiculesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.vehicules',
        'app.users',
        'app.customers',
        'app.lessons',
        'app.files',
        'app.lessons_files',
        'app.lessons_vehicules'
    ];
    
    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->configRequest([
            'headers' => ['Accept' => 'application/json']
        ]);

        $this->post(Router::url(
                        ['controller' => 'vehicules',
                            'action' => 'addVehicule',
                            '_ext' => 'json'
                ]), ['make' => 'Mazda', 'model' => '3', 'plate' => '000000', 'user_id' => 1]);

        $this->assertResponseOk();
        $expected = [
            'response' => ['result' => 'success'],
        ];
        $expected = json_encode($expected, JSON_PRETTY_PRINT);
        $this->assertEquals($expected, $this->_response->body());
    }

     /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->configRequest([
            'headers' => ['Accept' => 'application/json']
        ]);

        $this->post(Router::url(
                        ['controller' => 'vehicules',
                            'action' => 'editAjax',
                            '_ext' => 'json',
                            1
                ]), ['make' => 'Kawasaki', 'model' => 'Ninja', 'plate' => '156842', 'user_id' => 1]);

        $this->assertResponseOk();
        $expected = [
            'response' => ['result' => 'success'],
        ];
        $expected = json_encode($expected, JSON_PRETTY_PRINT);
        $this->assertEquals($expected, $this->_response->body());
    }

    /**
     * test get() method
     *
     * @return void
     */
    public function testGet() {
        $this->configRequest([
            'headers' => [
                'Accept' => 'application/json'
            ]
        ]);

        $this->post(Router::url(
                        ['controller' => 'vehicules',
                            'action' => 'getVehicule',
                            '_ext' => 'json',
                            1
                ])
        );
        $this->assertResponseOk();

        $expected = [
            'vehicules' => ['id' => 1,'make' => 'Mazda', 'model' => '3', 'plate' => '000000','user_id' => 1]
        ];
        $expected = json_encode($expected, JSON_PRETTY_PRINT);
        $this->assertEquals($expected, $this->_response->body());

        // get completed to-do's
        $this->post(Router::url(
                        ['controller' => 'vehicules',
                            'action' => 'getVehicule',
                            '_ext' => 'json',
                            2
                ])
        );
        $this->assertResponseOk();

        $expected = [
            'vehicules' => 
                [
                    'id' => 2,
                    'make' => 'honda',
                    'model' => 'civic',
                    'plate' => '123145',
                    'user_id' => 1
                ]
            
        ];
        $expected = json_encode($expected, JSON_PRETTY_PRINT);
        $this->assertEquals($expected, $this->_response->body());
    }
    
    public function testDelete()
    {
        $this->configRequest([
            'headers' => ['Accept' => 'application/json']
        ]);

        $this->post(Router::url(
                        ['controller' => 'vehicules',
                            'action' => 'deleteAjax',
                            '_ext' => 'json'
                ]), ['id' => '1']);

        $this->assertResponseOk();
        $expected = [
            'response' => ['result' => 'success'],
        ];
        $expected = json_encode($expected, JSON_PRETTY_PRINT);
        $this->assertEquals($expected, $this->_response->body());
        
        
        
    }
}
