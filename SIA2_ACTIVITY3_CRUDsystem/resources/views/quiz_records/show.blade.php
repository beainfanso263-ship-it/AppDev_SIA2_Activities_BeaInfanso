<!DOCTYPE html>
<html>

<head>

    <title>View Record</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background:#f4f6f9;
        }

        .card{
            border-radius:20px;
            overflow:hidden;
        }

        .profile-image{
            width:150px;
            height:150px;
            object-fit:cover;
            border-radius:50%;
            border:5px solid white;
            box-shadow:0 4px 10px rgba(0,0,0,0.2);
        }

        .info-box{
            background:white;
            border-radius:15px;
            padding:15px;
            margin-bottom:15px;
            box-shadow:0 2px 5px rgba(0,0,0,0.05);
        }

    </style>

</head>

<body>

<div class="container py-5">

    <div class="card shadow-lg border-0 mx-auto" style="max-width:700px;">

        <div class="card-header bg-info text-white text-center p-4">

            <h2>
                Student Record Details
            </h2>

        </div>

        <div class="card-body p-4">

            <div class="text-center mb-4">

                @if($record->image)

                    <img src="{{ asset('images/' . $record->image) }}"
                         class="profile-image">

                @else

                    <img src="https://via.placeholder.com/150"
                         class="profile-image">

                @endif

            </div>

            <div class="info-box">

                <h5><strong>Student Name:</strong></h5>

                <p>{{ $record->student_name }}</p>

            </div>

            <div class="info-box">

                <h5><strong>Subject:</strong></h5>

                <p>{{ $record->subject }}</p>

            </div>

            <div class="row">

                <div class="col-md-6">

                    <div class="info-box">

                        <h5><strong>Quiz 1:</strong></h5>

                        <p>{{ $record->quiz1 }}</p>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="info-box">

                        <h5><strong>Quiz 2:</strong></h5>

                        <p>{{ $record->quiz2 }}</p>

                    </div>

                </div>

            </div>

            <div class="info-box">

                <h5><strong>Total:</strong></h5>

                <p>{{ $record->total }}</p>

            </div>

            <div class="info-box">

                <h5><strong>Remarks:</strong></h5>

                @if($record->remarks == 'Passed')

                    <span class="badge bg-success p-2 fs-6">
                        Passed
                    </span>

                @else

                    <span class="badge bg-danger p-2 fs-6">
                        Failed
                    </span>

                @endif

            </div>

            <a href="/quiz_records"
               class="btn btn-secondary w-100 mt-3">

                Back

            </a>

        </div>

    </div>

</div>

</body>

</html>