<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Treatments>
 */
class TreatmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $specs = (['Immunology', 'Family medicine', 'Neurology', 'Pathology', 'Ophthalmology', 'Genetics', 'Surgery', 'Urology' ]);
        $meds = (['aptiom', 'aspirin', 'atenolol', 'claritin', 'nysatin', 'niacin', 'genotropin', 'glucosamine]', 'ultram', 'fluimicil']);
        return [
            'name' => $this->faker->buildingNumber(),
            'type' => $this->faker->randomElement($specs),
            'byWho_type' => 'Doctor',
            'byWho_id' => '0',
            'problem' => $this->faker->word(),
            'medicine' => $this->faker->randomElement($meds),
            'period' => $this->faker->numberBetween(0,100), //days
            'cost' => $this->faker->numberBetween(0,250), //lei
            'begin_date' => $this->faker->dateTime(),
        ];
    }
}
