<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Models\Usersinfo;
use App\Models\Upload;
use DB;

class ReportController extends Controller
{
    public function index()
    {
        $fileTypes = Upload::select('type', DB::raw('count(*) as count'))
            ->groupBy('type')
            ->get();

        $userRegistrations = Usersinfo::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, count(*) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $birthYears = Usersinfo::selectRaw('YEAR(birthday) as year, count(*) as count')
            ->groupBy('year')
            ->orderBy('year')
            ->get();

        $fileUploads = Upload::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, count(*) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $userRegistrationYears = Usersinfo::selectRaw('YEAR(created_at) as year')
            ->distinct()
            ->orderBy('year')
            ->pluck('year');
        $fileUploadYears = Upload::selectRaw('YEAR(created_at) as year')
            ->distinct()
            ->orderBy('year')
            ->pluck('year');
        $months = [
            '01' => 'January', '02' => 'February', '03' => 'March', '04' => 'April',
            '05' => 'May', '06' => 'June', '07' => 'July', '08' => 'August',
            '09' => 'September', '10' => 'October', '11' => 'November', '12' => 'December',
        ];
        // Prepare daily data for user registrations
        $userRegDayData = [];
        foreach ($userRegistrationYears as $year) {
            foreach (array_keys($months) as $month) {
                $daysInMonth = cal_days_in_month(CAL_GREGORIAN, (int)$month, (int)$year);
                $userRegDayData[$year][$month] = array_fill(0, $daysInMonth, 0);
            }
        }
        $userRegRaw = Usersinfo::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, DAY(created_at) as day, count(*) as total')
            ->groupBy('year', 'month', 'day')
            ->get();
        foreach ($userRegRaw as $row) {
            $m = str_pad($row->month, 2, '0', STR_PAD_LEFT);
            $userRegDayData[$row->year][$m][$row->day - 1] = $row->total;
        }
        // Prepare daily data for file uploads
        $fileUploadDayData = [];
        foreach ($fileUploadYears as $year) {
            foreach (array_keys($months) as $month) {
                $daysInMonth = cal_days_in_month(CAL_GREGORIAN, (int)$month, (int)$year);
                $fileUploadDayData[$year][$month] = array_fill(0, $daysInMonth, 0);
            }
        }
        $fileUploadRaw = Upload::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, DAY(created_at) as day, count(*) as total')
            ->groupBy('year', 'month', 'day')
            ->get();
        foreach ($fileUploadRaw as $row) {
            $m = str_pad($row->month, 2, '0', STR_PAD_LEFT);
            $fileUploadDayData[$row->year][$m][$row->day - 1] = $row->total;
        }
        return view('reports', compact(
            'fileTypes', 'userRegistrations', 'birthYears', 'fileUploads',
            'userRegistrationYears', 'fileUploadYears', 'months',
            'userRegDayData', 'fileUploadDayData'
        ));
    }
}


