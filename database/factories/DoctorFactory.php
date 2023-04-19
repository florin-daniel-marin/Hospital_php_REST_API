<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\Doctors;
use App\Models\Patient;
use App\Models\Patients;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctors>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $gender = $this->faker->randomElement(['male', 'female']);
        $specs = (['Immunology', 'Family medicine', 'Neurology', 'Pathology', 'Ophthalmology', 'Genetics', 'Surgery', 'Urology' ]);
        return [
            'name' => $this->faker->name($gender),
            'sex' => $gender,
            'spec' => $this->faker->randomElement($specs),
            'room' => $this->faker->buildingNumber(),
            'address' => $this->faker->address(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'dob' => $this->faker->dateTimeBetween('1950-01-01', '2000-12-31')->format('Y-m-d'),
        ];
    }
}
