<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HostelApplication>
 */
class HostelApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = $this->faker->randomElement(['pending', 'under_review', 'approved', 'rejected']);

        return [
            'application_number' => \App\Models\HostelApplication::generateApplicationNumber(),
            'status' => $status,
            'academic_year' => '2026/2027',
            'amount_paid' => $this->faker->randomElement(['45000', '100000']),
            'full_name' => $this->faker->name(),
            'student_id' => null, // Will be set in Seeder
            'intake' => 'July 2026',
            'program' => 'BSc',
            'department' => 'Computer Science',
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'date_of_birth' => $this->faker->dateTimeBetween('-25 years', '-18 years')->format('Y-m-d'),
            'phone_number' => '0' . $this->faker->numberBetween(7000000000, 9999999999),
            'email' => $this->faker->unique()->safeEmail(),
            'home_address' => $this->faker->address(),
            'nationality' => 'Nigerian',
            'state_of_origin' => 'Lagos',
            'local_government' => 'Ikeja',
            'parent_full_name' => $this->faker->name(),
            'parent_relationship' => 'Parent',
            'parent_phone' => '0' . $this->faker->numberBetween(7000000000, 9999999999),
            'parent_email' => $this->faker->safeEmail(),
            'parent_address' => $this->faker->address(),
            'parent_occupation' => 'Business',
            'hostelfee_receipt' => 'receipts/dummy.jpg',
            'rejection_reason' => $status === 'rejected' ? 'Invalid payment proof provided.' : null,
            'admin_notes' => $status === 'approved' ? 'Payment verified, proceed to assign.' : null,
            'reviewed_at' => in_array($status, ['approved', 'rejected']) ? now() : null,
            'blood_group' => $this->faker->randomElement(['A+', 'B+', 'O+', 'AB+', 'O-']),
            'genotype' => $this->faker->randomElement(['AA', 'AS', 'SS', 'AC']),
            'medical_conditions' => null,
            'allergies' => null,
            'medications' => null,
            'emergency_contact_name' => $this->faker->name(),
            'emergency_contact_phone' => '0' . $this->faker->numberBetween(7000000000, 9999999999),
            'emergency_contact_relationship' => 'Uncle',
            'emergency_contact_address' => $this->faker->address(),
            'declaration_name' => $this->faker->name(),
            'applicant_signature' => 'signature.png',
            'applicant_date' => now()->format('Y-m-d'),
            'guardian_signature' => 'signature.png',
            'guardian_date' => now()->format('Y-m-d'),
            'passport_photo' => null,
            'applicationform_receipt' => 'receipts/app_dummy.jpg',
            'medical_report' => null,
            'birth_certificate' => null,
            'admission_letter' => null,
        ];
    }
}
