<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Job
{
    public static function jobs(): array
    {
        return [
            [
                'id' => '1',
                'title' => 'Teacher',
                'salary' => '£40,000',
                'jobDescription' => 'Works with kids',
            ],
            [
                'id' => '2',
                'title' => 'Programmer',
                'salary' => '£100,000',
                'jobDescription' => 'Programming yeh!',
            ],
            [
                'id' => '3',
                'title' => 'Brain Surgeon',
                'salary' => '£200,000',
                'jobDescription' => 'Brain stuff yeh!',
            ],

        ];
    }

    public static function find($id): array
    {
        return Arr::first(self::jobs(), fn($job) => $job['id'] == $id);
    }

}
