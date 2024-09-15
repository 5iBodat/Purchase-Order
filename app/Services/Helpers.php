<?php

namespace App\Services;

class Helpers
{
    public static function generatePoNumber($number, $format)
    {
        // Get the current month and year
        $month = date('m'); // Returns '01' through '12'
        $year = date('Y');  // Returns '2024', for example
        $increment = (int)$number + 1;
        $newNumber = str_pad($increment, 4, 0, STR_PAD_LEFT);
        // Format the code
        $po_number = str_replace(
            ['{NOMOR}', '{BULAN}', '{TAHUN}'],
            [$newNumber, $month, $year],
            $format
        );
        return $po_number;
    }

    public static function formatDate($dateObj)
    {
        $day = str_pad($dateObj->format('d'), 2, '0', STR_PAD_LEFT);
        $month = str_pad($dateObj->format('m'), 2, '0', STR_PAD_LEFT);
        $year = $dateObj->format('Y');
        return [
            "day" => $day,
            "month" => $month,
            "year" => $year,
        ];
    }

    public static function generateRef($code_no, $name, $type)
    {
        // Get the current year
        $year = date('Y');

        // Get the current month and convert it to a Roman numeral
        $month = date('n');
        $romanMonths = [
            1 => 'I',
            2 => 'II',
            3 => 'III',
            4 => 'IV',
            5 => 'V',
            6 => 'VI',
            7 => 'VII',
            8 => 'VIII',
            9 => 'IX',
            10 => 'X',
            11 => 'XI',
            12 => 'XII'
        ];
        $romanMonth = $romanMonths[$month];

        // Get the current quarter (P1, P2, P3, P4)
        $quarter = 'P' . ceil($month / 3);

        // Format the code
        $formattedCode = sprintf('%s-%s-%s-%s-%s-%s', $code_no, $name, $type, $romanMonth, $quarter, $year);

        return $formattedCode;
    }
}
