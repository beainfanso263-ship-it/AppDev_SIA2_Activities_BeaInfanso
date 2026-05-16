<!DOCTYPE html>
<html>

<head>

    <title>Student Quiz Record System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background-color:#f4f6f9;
        }

        .main-card{
            border-radius:20px;
            overflow:hidden;
        }

        .table th{
            background:#0d6efd;
            color:white;
        }

        .btn{
            border-radius:10px;
        }

        .title-text{
            font-weight:bold;
            letter-spacing:1px;
        }

        .student-image{
            width:70px;
            height:70px;
            object-fit:cover;
            border-radius:10px;
        }

    </style>

</head>

<body>

<div class="container mt-5">

    <div class="card shadow-lg border-0 main-card">

        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center p-4">

            <h2 class="title-text">
                Student Quiz Record System
            </h2>

            <a href="{{ route('quiz_records.create') }}"
               class="btn btn-light fw-bold">

                + Add Record

            </a>

        </div>

        <div class="card-body">

            <form method="GET"
                  action="{{ route('quiz_records.index') }}">

                <div class="row mb-3">

                    <div class="col-md-10">

                        <input type="text"
                               name="search"
                               class="form-control"
                               placeholder="Search student or subject">

                    </div>

                   <div class="col-md-2">
    <button type="submit"
            class="btn btn-primary w-100">
        Search
    </button>
</div>

<div class="col-md-2 mt-2 mt-md-0">
    <a href="{{ route('quiz_records.index') }}"
       class="btn btn-dark w-100">
        View All
    </a>
</div>

                </div>

            </form>

            <table class="table table-bordered table-hover text-center align-middle">

                <thead>

                    <tr>

                        <th>ID</th>
                        <th>Image</th>
                        <th>Student Name</th>
                        <th>Subject</th>
                        <th>Quiz 1</th>
                        <th>Quiz 2</th>
                        <th>Total</th>
                        <th>Remarks</th>
                        <th width="250">Actions</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($records as $record)

                    <tr>

                        <td>{{ $record->id }}</td>

                        <td>

                            @if($record->image)

                                <img src="{{ asset('images/' . $record->image) }}"
                                     class="student-image">

                            @else

                                <span class="text-muted">
                                    No Image
                                </span>

                            @endif

                        </td>

                        <td>{{ $record->student_name }}</td>

                        <td>{{ $record->subject }}</td>

                        <td>{{ $record->quiz1 }}</td>

                        <td>{{ $record->quiz2 }}</td>

                        <td>

                            <span class="badge bg-dark fs-6">
                                {{ $record->total }}
                            </span>

                        </td>

                        <td>

                            @if($record->remarks == 'Passed')

                                <span class="badge bg-success p-2">
                                    Passed
                                </span>

                            @else

                                <span class="badge bg-danger p-2">
                                    Failed
                                </span>

                            @endif

                        </td>

                        <td>

                            <a href="{{ route('quiz_records.show', $record->id) }}"
                               class="btn btn-info btn-sm text-white">

                                View

                            </a>

                            <a href="{{ route('quiz_records.edit', $record->id) }}"
                               class="btn btn-warning btn-sm">

                                Edit

                            </a>

                            <form action="{{ route('quiz_records.destroy', $record->id) }}"
                                  method="POST"
                                  style="display:inline;">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm">

                                    Delete

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="9">

                            <div class="alert alert-secondary m-0">

                                No records found.

                            </div>

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>
<div class="mt-3 d-flex justify-content-center">
    {{ $records->onEachSide(1)->links('pagination::bootstrap-5') }}
</div>

        </div>

    </div>

</div>

</body>

</html>