
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Student PDF</title>

    <style>
       
        .header {
            text-align: center;
            border-bottom: 2px solid #333;
            padding-bottom: 15px;
            margin-bottom: 25px;
        }

        h2 {
            color: #1e40af;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            border: 1px solid #ccc;
            padding: 12px;
        }

        .label {
            background: #f1f5f9;
            font-weight: bold;
            width: 35%;
        }

        .image {
            width: 110px;
            height: 110px;
            border-radius: 50%;
            margin-bottom: 20px;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 11px;
        }
    </style>
</head>

<body>

    <div class="header">
        <h2>Student Information Report</h2>
        <p>Learning Management System</p>
    </div>

    <div style="text-align:center;">
        @if($student->path && file_exists(public_path('storage/'.$student->path)))
            <img src="{{ public_path('storage/'.$student->path) }}"
                 class="image">
        @endif
    </div>

    <table>
        <tr>
            <td class="label">Student ID</td>
            <td>{{ $student->id }}</td>
        </tr>

        <tr>
            <td class="label">LMS Account</td>
            <td>{{ $student->lms_account }}</td>
        </tr>

        <tr>
            <td class="label">Full Name</td>
            <td>{{ $student->name }}</td>
        </tr>

        <tr>
            <td class="label">Email</td>
            <td>{{ $student->email }}</td>
        </tr>

        <tr>
            <td class="label">CNIC</td>
            <td>{{ $student->cnic }}</td>
        </tr>
    </table>

    <div class="footer">
        <p>Learning Management System</p>
        <p>Student Record Report</p>
    </div>

</body>
</html>
