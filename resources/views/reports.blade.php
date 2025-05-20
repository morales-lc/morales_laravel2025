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
            background: linear-gradient(135deg, #eaf6f6 0%, #48A6A7 100%) !important;
            min-height: 100vh;
            color: #223127;
            font-family: 'Segoe UI', Arial, sans-serif;
        }

        .navbar {
            background-color: #48A6A7 !important;
        }

        .navbar a,
        .navbar-brand {
            color: #fff !important;
            font-weight: 500;
        }

        .container {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 8px 32px 0 rgba(72, 166, 167, 0.12);
            padding: 40px 32px 32px 32px;
            margin-top: 40px;
            max-width: 1100px;
        }

        .nav-tabs {
            border-bottom: none;
            background: #eaf6f6;
            border-radius: 10px 10px 0 0;
            padding: 0.5rem 0.5rem 0 0.5rem;
        }

        .nav-tabs .nav-link {
            color: #48A6A7 !important;
            background: #eaf6f6 !important;
            border: none !important;
            margin: 0 4px;
            font-weight: 600;
            border-radius: 8px 8px 0 0;
            transition: background 0.2s, color 0.2s;
        }

        .nav-tabs .nav-link.active {
            background-color: #2973B2 !important;
            color: #fff !important;
            box-shadow: 0 4px 16px 0 rgba(72, 166, 167, 0.10);
        }

        h2 {
            color: #2973B2;
            font-weight: 700;
            letter-spacing: 1px;
        }

        h5 {
            color: #2973B2;
            font-weight: 600;
        }

        .tab-pane {
            animation: fadeIn 0.5s;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .d-flex.align-items-center.gap-2 label {
            color: #2973B2;
            font-weight: 500;
        }

        .form-select-sm,
        .form-label {
            border-radius: 8px;
        }

        .form-select-sm:focus {
            border-color: #48A6A7;
            box-shadow: 0 0 0 0.2rem rgba(72, 166, 167, 0.15);
        }

        canvas {
            background-color: #f8f9fa;
            padding: 10px;
            border-radius: 14px;
            box-shadow: 0 2px 8px 0 rgba(72, 166, 167, 0.08);
        }

        .tab-content {
            margin-bottom: 2rem;
        }

        @media (max-width: 900px) {
            .container {
                padding: 16px 4px 12px 4px;
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
        <h2 class="text-center mb-4">System Reports</h2>

        <ul class="nav nav-tabs" id="reportTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="fileType-tab" data-bs-toggle="tab" data-bs-target="#fileType"
                        type="button" role="tab" aria-controls="fileType" aria-selected="true">
                    File Types
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="userRegistration-tab" data-bs-toggle="tab" data-bs-target="#userRegistration"
                        type="button" role="tab" aria-controls="userRegistration" aria-selected="false">
                    User Registration Trend
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="birthYear-tab" data-bs-toggle="tab" data-bs-target="#birthYear"
                        type="button" role="tab" aria-controls="birthYear" aria-selected="false">
                    Users by Birth Year
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="fileUpload-tab" data-bs-toggle="tab" data-bs-target="#fileUpload"
                        type="button" role="tab" aria-controls="fileUpload" aria-selected="false">
                    File Uploads Trend
                </button>
            </li>
        </ul>

        <div class="tab-content" id="reportTabsContent">
            <div class="tab-pane fade show active" id="fileType" role="tabpanel" aria-labelledby="fileType-tab">
                <div class="mt-4">
                    <h5>File Types (Pie Chart)</h5>
                    <div style="max-width:750px;margin:auto;">
                        <canvas id="fileTypeChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="userRegistration" role="tabpanel" aria-labelledby="userRegistration-tab">
                <div class="mt-4">
                    <h5>User Registration Trend (Line Chart)</h5>
                    <div class="mb-3 d-flex align-items-center gap-2">
                        <label for="userRegYear" class="form-label mb-0">Year:</label>
                        <select id="userRegYear" class="form-select form-select-sm w-auto" onchange="updateUserRegDays()">
                            @foreach($userRegistrationYears as $year)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endforeach
                        </select>
                        <label for="userRegMonth" class="form-label mb-0 ms-2">Month:</label>
                        <select id="userRegMonth" class="form-select form-select-sm w-auto" onchange="updateUserRegDays()">
                            @foreach($months as $num => $name)
                                <option value="{{ $num }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <canvas id="userRegistrationChart"></canvas>
                </div>
            </div>
            <div class="tab-pane fade" id="birthYear" role="tabpanel" aria-labelledby="birthYear-tab">
                <div class="mt-4">
                    <h5>Users by Birth Year (Bar Chart)</h5>
                    <canvas id="birthYearChart"></canvas>
                </div>
            </div>
            <div class="tab-pane fade" id="fileUpload" role="tabpanel" aria-labelledby="fileUpload-tab">
                <div class="mt-4">
                    <h5>File Uploads Trend (Line Chart)</h5>
                    <div class="mb-3 d-flex align-items-center gap-2">
                        <label for="fileUploadYear" class="form-label mb-0">Year:</label>
                        <select id="fileUploadYear" class="form-select form-select-sm w-auto" onchange="updateFileUploadDays()">
                            @foreach($fileUploadYears as $year)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endforeach
                        </select>
                        <label for="fileUploadMonth" class="form-label mb-0 ms-2">Month:</label>
                        <select id="fileUploadMonth" class="form-select form-select-sm w-auto" onchange="updateFileUploadDays()">
                            @foreach($months as $num => $name)
                                <option value="{{ $num }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <canvas id="fileUploadChart"></canvas>
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
        let userRegData = {
            day: {
                labels: {!! json_encode(range(1, 31)) !!}, // Days 1-31
                data: Array(31).fill(0)
            },
            month: {
                labels: {!! json_encode($userRegistrations->pluck('month')) !!},
                data: {!! json_encode($userRegistrations->pluck('total')) !!}
            },
            year: {
                labels: [], // Fill with year data from backend if available
                data: []
            }
        };
        let userRegistrationChart = new Chart(document.getElementById('userRegistrationChart'), {
            type: 'line',
            data: {
                labels: userRegData.month.labels,
                datasets: [{
                    label: 'User Registrations',
                    data: userRegData.month.data,
                    borderColor: '#48A6A7',
                    fill: false
                }]
            }
        });
        function changeUserRegView(view) {
            userRegistrationChart.data.labels = userRegData[view].labels;
            userRegistrationChart.data.datasets[0].data = userRegData[view].data;
            userRegistrationChart.update();
        }

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
        let fileUploadData = {
            day: {
                labels: {!! json_encode(range(1, 31)) !!}, // Days 1-31
                data: Array(31).fill(0)
            },
            month: {
                labels: {!! json_encode($fileUploads->pluck('month')) !!},
                data: {!! json_encode($fileUploads->pluck('total')) !!}
            },
            year: {
                labels: [], // Fill with year data from backend if available
                data: []
            }
        };
        let fileUploadChart = new Chart(document.getElementById('fileUploadChart'), {
            type: 'line',
            data: {
                labels: fileUploadData.month.labels,
                datasets: [{
                    label: 'File Uploads',
                    data: fileUploadData.month.data,
                    borderColor: '#9ACBD0',
                    fill: false
                }]
            }
        });
        function changeFileUploadView(view) {
            fileUploadChart.data.labels = fileUploadData[view].labels;
            fileUploadChart.data.datasets[0].data = fileUploadData[view].data;
            fileUploadChart.update();
        }

        // These will be filled by backend with daily data for the selected year/month
        let userRegDayData = @json($userRegDayData);
        let fileUploadDayData = @json($fileUploadDayData);

        function updateUserRegDays() {
            const year = document.getElementById('userRegYear').value;
            const month = document.getElementById('userRegMonth').value;
            const days = userRegDayData[year] && userRegDayData[year][month] ? userRegDayData[year][month] : Array(31).fill(0);
            userRegistrationChart.data.labels = Array.from({length: days.length}, (_, i) => i + 1);
            userRegistrationChart.data.datasets[0].data = days;
            userRegistrationChart.update();
        }

        function updateFileUploadDays() {
            const year = document.getElementById('fileUploadYear').value;
            const month = document.getElementById('fileUploadMonth').value;
            const days = fileUploadDayData[year] && fileUploadDayData[year][month] ? fileUploadDayData[year][month] : Array(31).fill(0);
            fileUploadChart.data.labels = Array.from({length: days.length}, (_, i) => i + 1);
            fileUploadChart.data.datasets[0].data = days;
            fileUploadChart.update();
        }

        document.addEventListener('DOMContentLoaded', function() {
            updateUserRegDays();
            updateFileUploadDays();
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
