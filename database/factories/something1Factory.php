<?php

namespace Database\Factories;

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
            'tanggal_sesuatu' => $this -> faker -> date()
        ];
    }
}
