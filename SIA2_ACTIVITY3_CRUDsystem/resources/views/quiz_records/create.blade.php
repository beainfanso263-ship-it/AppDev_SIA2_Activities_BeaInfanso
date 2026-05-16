<!DOCTYPE html>
<html>

<head>

    <title>Add Quiz Record</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background: linear-gradient(to right, #4facfe, #00f2fe);
            min-height: 100vh;
        }

        .card{
            border-radius:20px;
            overflow:hidden;
        }

        .form-control{
            border-radius:10px;
            padding:12px;
        }

        .btn{
            border-radius:10px;
            padding:10px;
        }

        .title-text{
            font-weight:bold;
            letter-spacing:1px;
        }

    </style>

</head>

<body>

<div class="container py-5">

    <div class="card shadow-lg border-0 mx-auto" style="max-width: 650px;">

        <div class="card-header bg-success text-white text-center p-4">

            <h2 class="title-text">
                Add Quiz Record
            </h2>

        </div>

        <div class="card-body p-4">

            <form action="{{ route('quiz_records.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="mb-3">

                    <label class="form-label fw-bold">
                        Student Name
                    </label>

                    <input type="text"
                           name="student_name"
                           class="form-control"
                           placeholder="Enter student name"
                           required>

                </div>

                <div class="mb-3">

                    <label class="form-label fw-bold">
                        Subject
                    </label>

                    <input type="text"
                           name="subject"
                           class="form-control"
                           placeholder="Enter subject"
                           required>

                </div>

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label class="form-label fw-bold">
                            Quiz 1
                        </label>

                        <input type="number"
                               name="quiz1"
                               class="form-control"
                               placeholder="Enter score"
                               required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label class="form-label fw-bold">
                            Quiz 2
                        </label>

                        <input type="number"
                               name="quiz2"
                               class="form-control"
                               placeholder="Enter score"
                               required>

                    </div>

                </div>

                <div class="mb-3">

                    <label class="form-label fw-bold">
                        Student Image
                    </label>

                    <input type="file"
                           name="image"
                           class="form-control">

                </div>

                <button type="submit"
                        class="btn btn-success w-100 fw-bold mt-3">

                    Save Record

                </button>

            </form>

            <a href="/quiz_records"
               class="btn btn-dark w-100 mt-3">

                Back

            </a>

        </div>

    </div>

</div>

</body>

</html>