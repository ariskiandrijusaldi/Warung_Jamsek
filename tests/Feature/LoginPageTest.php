<?php

namespace Tests\Feature;

use Tests\TestCase;

class LoginPageTest extends TestCase
{
    public function test_stitch_login_screen_displays_the_login_form(): void
    {
        $this->get('/projects/8230564487354830094/screens/e902a252899c40b888d316482f9b52e7')
            ->assertOk()
            ->assertSee('Masuk sebagai Kasir')
            ->assertSee('Masuk ke POS');
    }

    public function test_cashier_can_submit_the_demo_login_form(): void
    {
        $this->post('/login', [
            'name' => 'Rani',
            'pin' => '1234',
        ])->assertRedirect('/pos');
    }
}
