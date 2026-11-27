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

    {{-- Header --}}
    {!! html()->div()->class('header')->open() !!}

        {!! html()->element('h2', 'Student Information Report') !!}

        {!! html()->element('p', 'Learning Management System') !!}

    {!! html()->div()->close() !!}

    {{-- Student Image --}}
    {!! html()->div()
        ->attribute('style', 'text-align:center;')
        ->open() !!}

        @if($student->path && file_exists(public_path('storage/'.$student->path)))
            <img src="{{ public_path('storage/'.$student->path) }}"
                 class="image"
                 alt="Student Image">
        @endif

    {!! html()->div()->close() !!}

    {{-- Student Information Table --}}
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

    {{-- Footer --}}
    {!! html()->div()->class('footer')->open() !!}

        {!! html()->element('p', 'Learning Management System') !!}

        {!! html()->element('p', 'Student Record Report') !!}

    {!! html()->div()->close() !!}

</body>
</html>