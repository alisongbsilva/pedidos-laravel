<?php

ExampleTest('the application returns a successful response', function () {
    $response = $this->get('/');

    $response->assertStatus(200) || $response->assertRedirect(route('pedidos.index'));
});
