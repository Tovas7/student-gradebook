<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Grades for ' . $course->name) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('instructor.grades.update', $course) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Student</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Score (0-100)</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Letter Grade</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($grades as $grade)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $grade->student->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <input type="hidden" name="grades[{{ $loop->index }}][id]" value="{{ $grade->id }}">
                                        <input type="number" name="grades[{{ $loop->index }}][score]" value="{{ $grade->score }}" class="form-input rounded-md shadow-sm" min="0" max="100">
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $grade->score !== null ? $grade->calculateLetterGrade() : 'N/A' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Grades</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>