<?php

namespace App;

use CodeIgniter\Test\FeatureTestCase;

class RoutingTest extends FeatureTestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function tearDown(): void
    {
        parent::tearDown();
    }

    public function test_should_see_homepage() {
        $result = $this->call('get', '/');
        $result->assertOK();
    }

    public function test_should_see_signup() {
        $result = $this->call('get', '/signup');
        $result->assertOK();
    }

    public function test_should_see_login() {
        $result = $this->call('get', '/login');
        $result->assertOK();
    }

    public function test_should_redirect_to_login_when_not_loggedIn() {
        $urls = ['/profile', '/profile/edit'];

        foreach($urls as $url) {
            $result = $this->call('get', $url);
            $result->assertRedirect();

            $url = $result->getRedirectUrl();
            $this->assertEquals(site_url('/login'), $url);
        }
    }

    public function test_should_see_logout_when_loggedIn() {
        $sessions = [
            'isLoggedIn' => true
        ];

        $result = $this->withSession($sessions)->call('get', '/profile');
        $result->assertSee('logout');
    }

    // Can't test logout due to session_destroy() Error
    // public function test_should_redirect_after_logout() {
    //     $result = $this->withSession(['isLoggedIn' => true])->call('get', '/logout');
    //     $result->assertRedirect();
    // }
}