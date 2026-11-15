<?php

namespace Database\Seeders;

use App\Models\FacultyRoster;
use Illuminate\Database\Seeder;

class FacultyRosterSeeder extends Seeder
{
    public function run(): void
    {
        $faculty = [
            ['faculty_id' => 'FAC-0101', 'name' => 'Jerrah Mae Llaguno',   'email' => 'jerrah@ccdi.edu.ph'],
            ['faculty_id' => 'FAC-0102', 'name' => 'Jamaica Malana',       'email' => 'jamaica@ccdi.edu.ph'],
            ['faculty_id' => 'FAC-0103', 'name' => 'Shern Keith Pasadilla', 'email' => 'shern@ccdi.edu.ph'],
            ['faculty_id' => 'FAC-0104', 'name' => 'Ivan Manrique',        'email' => 'ivan@ccdi.edu.ph'],
            ['faculty_id' => 'FAC-0105', 'name' => 'Jay Millena',          'email' => 'jay@ccdi.edu.ph'],
            ['faculty_id' => 'FAC-0106', 'name' => 'Christian Bernarte',   'email' => 'christian@ccdi.edu.ph'],
            ['faculty_id' => 'FAC-0107', 'name' => 'Roanne Cea',           'email' => 'roanne@ccdi.edu.ph'],
            ['faculty_id' => 'FAC-0108', 'name' => 'Ynna Daria',           'email' => 'ynna@ccdi.edu.ph'],
            ['faculty_id' => 'FAC-0109', 'name' => 'Louie Aringay',        'email' => 'louie@ccdi.edu.ph'],
            ['faculty_id' => 'FAC-0110', 'name' => 'Joey Bachiller',       'email' => 'joey@ccdi.edu.ph'],
        ];

        foreach ($faculty as $f) {
            FacultyRoster::updateOrCreate(
                ['faculty_id' => $f['faculty_id']],
                $f
            );
        }
    }
}