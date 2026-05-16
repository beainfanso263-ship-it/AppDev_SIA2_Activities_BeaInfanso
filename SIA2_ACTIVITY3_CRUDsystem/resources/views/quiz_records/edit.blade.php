<!DOCTYPE html>
<html>
<head>
    <title>Edit Record</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow-lg border-0 rounded-4 mx-auto" style="max-width: 600px;">

        <div class="card-header bg-warning rounded-top-4">
            <h2>Edit Quiz Record</h2>
        </div>

        <div class="card-body">

            <form action="{{ route('quiz_records.update', $record->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Student Name</label>
                    <input type="text"
                           name="student_name"
                           class="form-control"
                           value="{{ $record->student_name }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Subject</label>
                    <input type="text"
                           name="subject"
                           class="form-control"
                           value="{{ $record->subject }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Quiz 1</label>
                    <input type="number"
                           name="quiz1"
                           class="form-control"
                           value="{{ $record->quiz1 }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Quiz 2</label>
                    <input type="number"
                           name="quiz2"
                           class="form-control"
                           value="{{ $record->quiz2 }}">
                </div>

                <button type="submit" class="btn btn-warning w-100 fw-bold">
                    Update Record
</html>