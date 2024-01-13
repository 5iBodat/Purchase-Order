<?php

namespace App\Services;

use App\Models\SchoolClass;
use App\Models\SchoolMajor;
use App\Models\Student;
use App\Models\User;
use App\Repositories\CashTransactionRepository;
use App\Repositories\StudentRepository;

class ChartGenerator
{
    public function __construct(
        private StudentRepository $studentRepository,
        private CashTransactionRepository $cashTransactionRepository
    ) {
    }

    /**
     * Generate chart data for various statistical charts.
     *
     * @return array An associative array containing chart data.
     */
    public function generateCharts(): array
    {
        $studentWithMajors = SchoolMajor::select('name', 'abbreviation')->withCount('students')->get();
        $cashTransactionAmountPerYear = $this->cashTransactionRepository->getTotalAmountsPerYear();
        $cashTransactionCountPerYear = $this->cashTransactionRepository->getCountsPerYear();

        return [
            'counter' => [
                'student' => Student::count(),
                'schoolClass' => SchoolClass::count(),
                'schoolMajor' => SchoolMajor::count(),
                'administrator' => User::count(),
            ],
            'pieChart' => [
                'studentGender' => [
                    'series' => [
                        $this->studentRepository->countStudentGender()['male'],
                        $this->studentRepository->countStudentGender()['female']
                    ],
                    'labels' => ['Laki-laki', 'Perempuan']
                ],
                'studentMajor' => [
                    'series' => $studentWithMajors->pluck('students_count'),
                    'labels' => $studentWithMajors->map(function ($studentMajor) {
                        return "$studentMajor->name ($studentMajor->abbreviation)";
                    })
                ]
            ],
            'lineChart' => [
                'cashTransactionAmountPerYear' => [
                    'series' => $cashTransactionAmountPerYear->pluck('amount'),
                    'categories' => $cashTransactionAmountPerYear->pluck('year')
                ],
                'cashTransactionCountPerYear' => [
                    'series' => $cashTransactionCountPerYear->pluck('count'),
                    'categories' => $cashTransactionCountPerYear->pluck('year')
                ],
            ]
        ];
    }
}
