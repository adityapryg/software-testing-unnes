<?php

pest()->extend(Tests\TestCase::class);

/**
 * Req 1 - Input Umur
 * Acceptence:
 * 1. Test input umur antara 20 sampai 50
 * 2. Test input umur kurang dari 20
 * 3. Test input umur lebih dari 50
 * 4. Test input bilangan tidak utuh
 * 5. Test input karakter selain angka
 */

it('success to access input age page', function () {
    //akses halaman input-age
    $response = $this->get('/input-age');
    //coba cek jika halaman berhasil diakses
    $response->assertStatus(200);
});

it('success to input age between 20 to 50', function () {
    $response = $this->post('/input-age', [
        'age' => 40
    ]);

    $response->assertStatus(200);
    expect($response->json('message'))->toBe('Age successfully submitted!');
    expect($response->json('data.age'))->toBe(40);
});
