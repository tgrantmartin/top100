<?php

namespace Tests\Feature;

use Tests\TestCase;

class Top100Test extends TestCase
{

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        foreach (range(1,5) as $n) {
            $rand = rand(1,100);
            $response = $this->call('GET', "/api/v2/top_albums/$rand");

            fwrite(STDERR, print_r($rand, TRUE));
            fwrite(STDERR, print_r($response->getStatusCode(), TRUE));

            $response->assertStatus(200);

            $this->assertEquals($rand, count(json_decode($response->getContent())));
        }
    }

}
