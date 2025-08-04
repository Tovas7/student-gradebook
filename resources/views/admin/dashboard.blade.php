<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-bold text-lg mb-4">Create New Instructor</h3>
                    <form method="POST" action="{{ route('admin.instructors.store') }}">
                        @csrf
                        <div class="mt-4">
                            <label for="name" class="block font-medium text-sm text-gray-700">Name</label>
                            <input type="text" name="name" id="name" required autofocus class="form-input rounded-md shadow-sm mt-1 block w-full" />
                        </div>
                        <div class="mt-4">
                            <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
                            <input type="email" name="email" id="email" required class="form-input rounded-md shadow-sm mt-1 block w-full" />
                        </div>
                        <div class="mt-4">
                            <label for="password" class="block font-medium text-sm text-gray-700">Password</label>
                            <input type="password" name="password" id="password" required class="form-input rounded-md shadow-sm mt-1 block w-full" />
                        </div>
                        <div class="mt-4">
                            <label for="password_confirmation" class="block font-medium text-sm text-gray-700">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" required class="form-input rounded-md shadow-sm mt-1 block w-full" />
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create Instructor</button>
                        </div>
                    </form>

                    <h3 class="font-bold text-lg mb-4 mt-8">Create New Course</h3>
                    <form method="POST" action="{{ route('admin.courses.store') }}">
                        @csrf
                        <div class="mt-4">
                            <label for="course_name" class="block font-medium text-sm text-gray-700">Course Name</label>
                            <input type="text" name="name" id="course_name" required class="form-input rounded-md shadow-sm mt-1 block w-full" />
                        </div>
                        <div class="mt-4">
                            <label for="course_code" class="block font-medium text-sm text-gray-700">Course Code</label>
                            <input type="text" name="code" id="course_code" required class="form-input rounded-md shadow-sm mt-1 block w-full" />
                        </div>
                        <div class="mt-4">
                            <label for="credits" class="block font-medium text-sm text-gray-700">Credits</label>
                            <input type="number" name="credits" id="credits" required class="form-input rounded-md shadow-sm mt-1 block w-full" min="1" max="6" />
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create Course</button>
                        </div>
                    </form>

                    <h3 class="font-bold text-lg mb-4 mt-8">Assign Course to Instructor</h3>
                    <form method="POST" action="{{ route('admin.courses.assign') }}">
                        @csrf
                        <div class="mt-4">
                            <label for="course_id" class="block font-medium text-sm text-gray-700">Course</label>
                            <select name="course_id" id="course_id" required class="form-select rounded-md shadow-sm mt-1 block w-full">
                                <option value="">Select a Course</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->name }} ({{ $course->code }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-4">
                            <label for="instructor_id" class="block font-medium text-sm text-gray-700">Instructor</label>
                            <select name="instructor_id" id="instructor_id" required class="form-select rounded-md shadow-sm mt-1 block w-full">
                                <option value="">Select an Instructor</option>
                                @foreach($instructors as $instructor)
                                    <option value="{{ $instructor->id }}">{{ $instructor->name }} ({{ $instructor->email }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Assign Course</button>
                        </div>
                    </form>

                    <h3 class="font-bold text-lg mb-4 mt-8">All Courses</h3>
                    <div class="bg-white rounded-md overflow-hidden shadow-sm">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Course Name</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Code</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Credits</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Instructor</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($courses as $course)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $course->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $course->code }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $course->credits }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $course->instructor->name ?? 'Unassigned' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>