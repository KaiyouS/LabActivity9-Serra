@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="space-y-6">

        <!-- Page Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
            <h1 class="text-2xl font-bold text-gray-800">{{ $title }}</h1>
            <span class="text-sm text-gray-500">Davao City</span>
        </div>

        <!-- Alert Banner (Requirement 5) -->
        @if ($alerts->count() > 0)
            <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded text-sm text-red-700">
                Action Required: There are {{ $alerts->count() }} overdue vaccination schedule(s) needing immediate follow-up.
            </div>
        @elseif ($schedules->count() === 0)
            <div class="bg-yellow-50 border-l-4 border-yellow-500 p-4 rounded text-sm text-yellow-700">
                Notice: Schedule records are currently empty.
            </div>
        @else
            <div class="bg-green-50 border-l-4 border-green-500 p-4 rounded text-sm text-green-700">
                All clear: No overdue vaccinations at this time.
            </div>
        @endif

        <!-- 4 Stats Cards: 1 column on mobile, 4 columns on medium+ screens (Requirement 9) -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            @foreach ($stats as $stat)
                <x-stat-card :title="$stat['label']" :value="$stat['value']" />
            @endforeach
        </div>

        <!-- Schedule Table Panel (Requirement 6 & 8) -->
        <x-panel title="Resident Vaccination Schedules">
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
                                {{-- Standard UI/UX Status Badges --}}
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
