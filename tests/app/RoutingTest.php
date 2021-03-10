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
        $result = $this->call('get', route_to('home'));
        $result->assertOK();
    }

    public function test_should_see_signup() {
        $result = $this->call('get', route_to('signup'));
        $result->assertOK();
    }

    public function test_should_see_login() {
        $result = $this->call('get', route_to('login'));
        $result->assertOK();
    }

    public function test_should_redirect_to_userProfile_when_loggedIn() {
        $urls = ['signup', 'login'];

        $sessions = [
            'isLoggedIn' => true
        ];

        foreach($urls as $url) {
            $result = $this->withSession($sessions)->call('get', route_to($url));

            $result->assertRedirect();

            $urlResult = $result->getRedirectUrl();
            $this->assertEquals(site_url(route_to('userProfile')), $urlResult);
        }
    }

    public function test_should_redirect_to_login_when_not_loggedIn() {
        $urls = ['userProfile', 'userProfileEdit'];

        foreach($urls as $url) {
            $result = $this->call('get', route_to($url));
            $result->assertRedirect();

            $urlResult = $result->getRedirectUrl();
            $this->assertEquals(site_url(route_to('login')), $urlResult);
        }
    }

    public function test_should_see_logout_when_loggedIn() {
        $sessions = [
            'isLoggedIn' => true
        ];

        $result = $this->withSession($sessions)->call('get', route_to('userProfile'));
        $result->assertSee('logout');
    }

    // Can't test logout due to session_destroy() Error
    // public function test_should_redirect_after_logout() {
    //     $result = $this->withSession(['isLoggedIn' => true])->call('get', '/logout');
    //     $result->assertRedirect();
    // }
}