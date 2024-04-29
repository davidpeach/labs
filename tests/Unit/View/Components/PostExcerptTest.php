<?php

test('the site header will correctly render my name', function () {
    $this->get('/')->assertOk();
});
