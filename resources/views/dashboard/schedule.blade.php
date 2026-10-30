@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="space-y-6">

        <!-- Page Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">{{ $title }}</h1>
                <p class="text-sm text-gray-500">Barangay Matina Crossing Health Center &bull; Davao City</p>
            </div>
            <a href="/dashboard" class="inline-flex items-center text-sm font-medium text-blue-600 hover:text-blue-800">
                &larr; Back to Dashboard
            </a>
        </div>

        <!-- Schedule Table Panel (Requirement 6 & 8) -->
        <x-panel title="Complete Schedule Masterlist">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm border-collapse">
                    <thead>
                    <tr class="border-b border-gray-200 text-gray-500">
                        <th class="py-3 px-4 font-semibold">#</th>
                        <th class="py-3 px-4 font-semibold">Patient Name</th>
                        <th class="py-3 px-4 font-semibold">Purok</th>
                        <th class="py-3 px-4 font-semibold">Vaccine</th>
                        <th class="py-3 px-4 font-semibold">Dose</th>
                        <th class="py-3 px-4 font-semibold">Date</th>
                        <th class="py-3 px-4 font-semibold">Status</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                    @forelse ($schedules as $schedule)
                        <tr class="{{ $loop->odd ? 'bg-gray-50' : 'bg-white' }}">
                            <td class="py-3 px-4 text-gray-400">{{ $loop->iteration }}</td>
                            <td class="py-3 px-4 font-medium text-gray-900">{{ $schedule->patient_name }}</td>
                            <td class="py-3 px-4 text-gray-600">{{ $schedule->purok }}</td>
                            <td class="py-3 px-4 font-medium text-blue-600">{{ $schedule->vaccine }}</td>
                            <td class="py-3 px-4 text-gray-600">{{ $schedule->dose }}</td>
                            <td class="py-3 px-4 text-gray-600">{{ $schedule->scheduled_at->format('M d, Y') }}</td>
                            <td class="py-3 px-4">
                                @if ($schedule->status === 'Done')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800">
                                        Done
                                    </span>
                                @elseif ($schedule->status === 'Scheduled')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        Scheduled
                                    </span>
                                @endif

                                {{-- Requirement 5: Using @unless to display the Overdue badge --}}
                                @unless ($schedule->status !== 'Overdue')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                        Overdue
                                    </span>
                                @endunless
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-4 text-center text-gray-500">
                                No schedules yet.
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </x-panel>

    </div>
@endsection
