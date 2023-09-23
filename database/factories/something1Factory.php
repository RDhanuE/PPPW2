<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class something1Factory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_sesuatu' => $this -> faker -> name(),
            'nilai_sesuatu' => $this -> faker -> numberBetween(),
            'tanggal_sesuatu' => $this -> faker -> date(),
            'harga_sesuatu' => $this -> faker -> numberBetween(10000, 200000),
        ];
    }
}
