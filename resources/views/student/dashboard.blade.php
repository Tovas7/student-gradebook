<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Student Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="font-bold text-lg">My Grades</h3>
                    <a href="{{ route('student.report') }}" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">
                        Generate Grade Report
                    </a>
                </div>
                <p class="text-xl font-bold mb-4">Cumulative GPA: {{ $gpa }}</p>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Course</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Score</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Letter Grade</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($grades as $grade)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $grade->course->name }} ({{ $grade->course->code }})</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $grade->score ?? 'N/A' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $grade->score !== null ? $grade->calculateLetterGrade() : 'N/A' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>