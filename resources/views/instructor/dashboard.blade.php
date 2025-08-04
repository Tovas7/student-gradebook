<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Instructor Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="font-bold text-lg mb-4">My Assigned Courses</h3>
                <ul class="list-disc ml-6">
                    @foreach($courses as $course)
                        <li>
                            <a href="{{ route('instructor.grades.show', $course) }}" class="text-blue-600 hover:underline">
                                {{ $course->name }} ({{ $course->code }})
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>