<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body {
            background: linear-gradient(135deg, #eaf6f6 0%, #48A6A7 100%);
            min-height: 100vh;
        }

        .container {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 8px 32px 0 rgba(72, 166, 167, 0.12);
            padding: 32px 32px 24px 32px;
        }

        .nav-tabs {
            border-bottom: none;
        }

        .nav-tabs .nav-link.active {
            background-color: #2973B2 !important;
            color: #fff !important;
        }

        .nav-tabs .nav-link {
            color: #48A6A7 !important;
            background: #eaf6f6 !important;
            border: none !important;
            margin: 0 2px;
            font-weight: 500;
        }

        h2 {
            color: #2973B2;
            font-weight: 700;
        }

        h5 {
            color: #2973B2;
        }

        @media (max-width: 900px) {
            .d-flex.justify-content-between.align-items-center {
                flex-direction: column;
                align-items: flex-start !important;
            }

            .nav-tabs {
                margin-top: 1rem;
                width: 100%;
                justify-content: flex-start;
            }
        }
    </style>
</head>

<body>

    @include('nav')

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">System Reports</h2>
            <ul class="nav nav-tabs flex-nowrap" id="reportTabs" role="tablist"
                style="background: #eaf6f6; border-radius: 8px;">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="fileType-tab" data-bs-toggle="tab" data-bs-target="#fileType"
                        type="button" role="tab" aria-controls="fileType" aria-selected="true"
                        style="color: #fff; background-color:#48A6A7; border: none; margin: 0 2px; font-weight: 500; border-radius: 6px 6px 0 0;">
                        File Types
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="userRegistration-tab" data-bs-toggle="tab"
                        data-bs-target="#userRegistration" type="button" role="tab" aria-controls="userRegistration"
                        aria-selected="false"
                        style="color: #fff; background-color:#48A6A7; border: none; margin: 0 2px; font-weight: 500; border-radius: 6px 6px 0 0;">
                        User Registration Trend
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="birthYear-tab" data-bs-toggle="tab" data-bs-target="#birthYear"
                        type="button" role="tab" aria-controls="birthYear" aria-selected="false"
                        style="color: #fff; background-color:#48A6A7; border: none; margin: 0 2px; font-weight: 500; border-radius: 6px 6px 0 0;">
                        Users by Birth Year
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="fileUpload-tab" data-bs-toggle="tab" data-bs-target="#fileUpload"
                        type="button" role="tab" aria-controls="fileUpload" aria-selected="false"
                        style="color: #fff; background-color:#48A6A7; border: none; margin: 0 2px; font-weight: 500; border-radius: 6px 6px 0 0;">
                        File Uploads Trend
                    </button>
                </li>
            </ul>
        </div>

        <!-- Tab Content -->
        <div class="tab-content" id="reportTabsContent">
            <div class="tab-pane fade show active" id="fileType" role="tabpanel" aria-labelledby="fileType-tab">
                <div class="mt-4">
                    <h5 class="fw-bold" style="color:#2973B2">File Types (Pie Chart)</h5>
                    <canvas id="fileTypeChart" style="background: #f8f9fa; border-radius: 12px;"></canvas>
                </div>
            </div>
            <div class="tab-pane fade" id="userRegistration" role="tabpanel" aria-labelledby="userRegistration-tab">
                <div class="mt-4">
                    <h5 class="fw-bold" style="color:#2973B2">User Registration Trend (Line Chart)</h5>
                    <canvas id="userRegistrationChart" style="background: #f8f9fa; border-radius: 12px;"></canvas>
                </div>
            </div>
            <div class="tab-pane fade" id="birthYear" role="tabpanel" aria-labelledby="birthYear-tab">
                <div class="mt-4">
                    <h5 class="fw-bold" style="color:#2973B2">Users by Birth Year (Bar Chart)</h5>
                    <canvas id="birthYearChart" style="background: #f8f9fa; border-radius: 12px;"></canvas>
                </div>
            </div>
            <div class="tab-pane fade" id="fileUpload" role="tabpanel" aria-labelledby="fileUpload-tab">
                <div class="mt-4">
                    <h5 class="fw-bold" style="color:#2973B2">File Uploads Trend (Line Chart)</h5>
                    <canvas id="fileUploadChart" style="background: #f8f9fa; border-radius: 12px;"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script>
        // File Types Chart
        new Chart(document.getElementById('fileTypeChart'), {
            type: 'pie',
            data: {
                labels: {!! json_encode($fileTypes->pluck('type')) !!},
                datasets: [{
                    data: {!! json_encode($fileTypes->pluck('count')) !!},
                    backgroundColor: ['#f87979', '#a2d5f2', '#b4f2e1', '#ffe066'],
                }]
            }
        });

        // User Registration Trend Chart
        new Chart(document.getElementById('userRegistrationChart'), {
            type: 'line',
            data: {
                labels: {!! json_encode($userRegistrations->pluck('month')) !!},
                datasets: [{
                    label: 'User Registrations',
                    data: {!! json_encode($userRegistrations->pluck('total')) !!},
                    borderColor: '#48A6A7',
                    fill: false
                }]
            }
        });

        // Users by Birth Year Chart
        new Chart(document.getElementById('birthYearChart'), {
            type: 'bar',
            data: {
                labels: {!! json_encode($birthYears->pluck('year')) !!},
                datasets: [{
                    label: 'Users by Birth Year',
                    data: {!! json_encode($birthYears->pluck('count')) !!},
                    backgroundColor: '#2973B2'
                }]
            }
        });

        // File Uploads Trend Chart
        new Chart(document.getElementById('fileUploadChart'), {
            type: 'line',
            data: {
                labels: {!! json_encode($fileUploads->pluck('month')) !!},
                datasets: [{
                    label: 'File Uploads',
                    data: {!! json_encode($fileUploads->pluck('total')) !!},
                    borderColor: '#9ACBD0',
                    fill: false
                }]
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>