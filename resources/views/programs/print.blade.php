<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Program PDF</title>

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


    {{-- Program Information Table --}}
    <table>

        <tr>
            <td class="label">Program ID</td>
            <td>{{ $program->id }}</td>
        </tr>

        <tr>
            <td class="label">Name</td>
            <td>{{ $program->name }}</td>
        </tr>

        <tr>
            <td class="label">Program Code</td>
            <td>{{ $program->program_code }}</td>
        </tr>

        <tr>
            <td class="label">Duration</td>
            <td>{{ $program->duration }}</td>
        </tr>

    </table>


    {{-- Footer --}}
    {!! html()->div()->class('footer')->open() !!}

        {!! html()->element('p', 'Learning Management System') !!}

        {!! html()->element('p', 'Program Record Report') !!}

    {!! html()->div()->close() !!}

</body>

</html>