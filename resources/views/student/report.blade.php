<!DOCTYPE html>
<html>
<head>
    <title>Grade Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .student-info {
            margin-bottom: 20px;
        }
        .student-info p {
            margin: 5px 0;
            font-size: 16px;
        }
        .grades-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .grades-table th, .grades-table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        .grades-table th {
            background-color: #f2f2f2;
        }
        .gpa {
            font-size: 18px;
            font-weight: bold;
            text-align: right;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Student Grade Report</h1>
    </div>

    <div class="student-info">
        <p><strong>Student Name:</strong> {{ $student->name }}</p>
        <p><strong>Student ID:</strong> {{ $student->id }}</p>
        <p><strong>Email:</strong> {{ $student->email }}</p>
    </div>

    <table class="grades-table">
        <thead>
            <tr>
                <th>Course Name</th>
                <th>Course Code</th>
                <th>Credits</th>
                <th>Score</th>
                <th>Letter Grade</th>
            </tr>
        </thead>
        <tbody>
            @foreach($grades as $grade)
                <tr>
                    <td>{{ $grade->course->name }}</td>
                    <td>{{ $grade->course->code }}</td>
                    <td>{{ $grade->course->credits }}</td>
                    <td>{{ $grade->score ?? 'N/A' }}</td>
                    <td>{{ $grade->score !== null ? $grade->calculateLetterGrade() : 'N/A' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="gpa">
        Cumulative GPA: {{ $gpa }}
    </div>

</body>
</html>