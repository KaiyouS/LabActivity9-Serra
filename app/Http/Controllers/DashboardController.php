<?php

namespace App\Http\Controllers;

use App\Models\Vaccination;

class DashboardController extends Controller
{
    /**
     * Display the main dashboard with statistics and alerts.
     */
    public function index()
    {
        $title = 'Bakuna Tracker – Purok Serra';

        $schedules = Vaccination::orderBy('scheduled_at')->get();

        // 4 stat counts as required by Requirement 1
        $stats = [
            ['label' => 'Total',     'value' => $schedules->count()],
            ['label' => 'Done',      'value' => $schedules->where('status', 'Done')->count()],
            ['label' => 'Scheduled', 'value' => $schedules->where('status', 'Scheduled')->count()],
            ['label' => 'Overdue',   'value' => $schedules->where('status', 'Overdue')->count()],
        ];

        // Alerts collection passed to the alert banner in Requirement 5
        $alerts = $schedules->where('status', 'Overdue');

        return view('dashboard.index', compact('title', 'stats', 'schedules', 'alerts'));
    }

    /**
     * Display the dedicated schedule list page (/schedule).
     */
    public function schedule()
    {
        $title = 'Vaccination Schedule – Purok Serra';

        $schedules = Vaccination::orderBy('scheduled_at')->get();

        return view('dashboard.schedule', compact('title', 'schedules'));
    }
}
