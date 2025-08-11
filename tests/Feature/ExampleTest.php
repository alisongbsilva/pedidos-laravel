<?php

test('the application redirects to pedidos page', function () {
    $response = $this->get('/');

    $response->assertRedirect(route('pedidos.index'));
});
