<style>
/* 
.academic-scroll{
    overflow-x:auto;
}

.academic-table{
    min-width:1600px;
}

.academic-table th{
    white-space:nowrap;
} */

/* Filter Section */
.filter-row{
    display:flex;
    gap:20px;
    flex-wrap:wrap;
    margin-bottom:20px;
}

.filter-box{
    min-width:200px;
}

/* Dropdown Styling */
.filter-box select{
    border-radius:6px;
    border:1px solid #ced4da;
    padding:8px 10px;
    font-size:14px;
}

/* DataTable Search Box */
.dataTables_filter input{
    border-radius:6px;
    border:1px solid #ced4da;
    padding:6px 10px;
    margin-left:6px;
}

/* DataTable Length Dropdown */
.dataTables_length select{
    border-radius:6px;
    border:1px solid #ced4da;
    padding:4px 6px;
}

/* Pagination Styling */
.dataTables_wrapper .dataTables_paginate .paginate_button{
    border-radius:6px;
    margin:2px;
    padding:4px 10px;
    border:1px solid #dee2e6;
    background:#fff;
}

.dataTables_wrapper .dataTables_paginate .paginate_button.current{
    background:#0d6efd !important;
    color:#fff !important;
    border:1px solid #0d6efd;
}

.dataTables_wrapper .dataTables_paginate .paginate_button:hover{
    background:#0d6efd;
    color:#fff !important;
}

/* Table Header Style */
.table thead th{
    background:#f8f9fa;
    font-weight:600;
}

/* Improve spacing */
.dataTables_wrapper .dataTables_length,
.dataTables_wrapper .dataTables_filter{
    margin-bottom:10px;
}

</style>


<main class="nxl-container">

<div class="nxl-content">

<!-- Page Header -->
<div class="page-header">

<div class="page-header-left d-flex align-items-center">

<div class="page-header-title">
<h5 class="m-b-10">Students</h5>
</div>

<ul class="breadcrumb">
<li class="breadcrumb-item">
<a href="<?= base_url('superadmin/dashboard') ?>">Home</a>
</li>
<li class="breadcrumb-item">Students</li>
</ul>

</div>

</div>


<div class="main-content">
<div class="row">
<div class="col-lg-12">

<div class="card">

<div class="card-header">
<h4 class="fw-bold">Students List</h4>
</div>

<div class="card-body">


<!-- Flash Messages -->

<?php if (session()->getFlashdata('success')): ?>
<div class="alert alert-success">
<?= session()->getFlashdata('success') ?>
</div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
<div class="alert alert-danger">
<?= session()->getFlashdata('error') ?>
</div>
<?php endif; ?>

<?php if (session()->getFlashdata('warning')): ?>
<div class="alert alert-warning">
<?= session()->getFlashdata('warning') ?>
</div>
<?php endif; ?>


<!-- Filters -->

<div class="filter-row mb-3">

<div class="filter-box">

<label class="form-label">Student Name</label>

<select id="studentNameFilter" class="form-select">

<option value="">All Students</option>

<?php
$names = [];
foreach ($students as $s) {

    if (!in_array($s['full_name'], $names)) {

        $names[] = $s['full_name'];

        echo '<option value="'.esc($s['full_name']).'">'.esc($s['full_name']).'</option>';

    }
}
?>

</select>

</div>


<div class="filter-box">

<label class="form-label">Course Name</label>

<select id="courseFilter" class="form-select">

<option value="">All Courses</option>

<?php
$courses = [];
foreach ($students as $s) {

    if (!in_array($s['programme_name'], $courses)) {

        $courses[] = $s['programme_name'];

        echo '<option value="'.esc($s['programme_name']).'">'.esc($s['programme_name']).'</option>';

    }
}
?>

</select>

</div>
<div class="filter-box">

<label class="form-label">Session</label>

<select id="sessionFilter" class="form-select">

<option value="2026-06" selected>Jun 2026 Session</option>
<option value="2026-02">Feb 2026 Session</option>

</select>

</div>
<div class="filter-box">

    <label class="form-label">Approved Only</label><br>

    <input type="checkbox" id="approvedFilter"> Show Approved Only

    <div class="mt-2">
        <strong>Approved Count: 
            <span id="approvedCount">0</span>
        </strong>
    </div>

</div>
<div class="filter-box">

    <label class="form-label">Export</label><br>

    <a href="<?= base_url('superadmin/export-students-excel') ?>" 
        class="btn btn-success btn-sm">
        Download June Session Excel
    </a>
</div>

</div>



<div>

<table id="studentsTable" class="table table-bordered academic-table">

<thead class="table-light">

<tr>

<th>#</th>
<th>Application No</th>
<th>Student Name</th>
<th>Email</th>
<th>Course Name</th>
<th>Amount</th>
<th class="text-center">Approve</th>
<th class="text-center">Reject</th>
<th class="text-center">View</th>
<th class="text-center">Edit</th>

</tr>

</thead>

<tbody>

<?php if (!empty($students)): ?>

<?php foreach ($students as $key => $student): ?>

<?php
$sessionValue = '';
    $sessionText = strtolower(trim((string)($student['admission_session'] ?? '')));

    if (strpos($sessionText, 'feb') !== false || $sessionText === '2' || $sessionText === '02') {
        $sessionValue = '2026-02';
    } elseif (strpos($sessionText, 'jun') !== false || $sessionText === '6' || $sessionText === '06') {
        $sessionValue = '2026-06';
    } elseif (!empty($student['created_at'])) {
        $sessionValue = date('Y-m', strtotime($student['created_at']));
    }
    ?>

<tr data-status="<?= $student['status'] ?>" data-session="<?= esc($sessionValue) ?>">

<td><?= $key + 1 ?></td>

<td><?= esc($student['application_no']) ?></td>

<td><?= esc($student['full_name']) ?></td>

<td><?= esc($student['student_email']) ?></td>

<td><?= esc($student['programme_name']) ?></td>

<td><?= esc($student['amount']) ?></td>

<td class="text-center">

<?php if ($student['status'] == 0): ?>

<a href="<?= base_url('superadmin/activate-student/'.$student['student_id']) ?>"
class="btn btn-sm btn-success"
onclick="return confirm('Approve this student?')">
Approve
</a>

<?php elseif ($student['status'] == 1): ?>

<span class="badge bg-success">Approved</span>

<?php elseif ($student['status'] == 2): ?>

<?php endif; ?>

</td>


<td class="text-center">

<?php if ($student['status'] == 0): ?>

<a href="<?= base_url('superadmin/reject-student/'.$student['student_id']) ?>"
class="btn btn-sm btn-danger"
onclick="return confirm('Reject this student?')">
Reject
</a>
<?php elseif ($student['status'] == 2): ?>

<span class="badge bg-danger">Rejected</span>

<?php endif; ?>

</td>
<!-- View -->
<td class="text-center">

<a href="<?= base_url('superadmin/student-view/'.$student['student_id']) ?>"
class="btn btn-sm btn-primary">
More Info
</a>

</td>

<!-- Edit -->
<td class="text-center">

<a href="<?= base_url('superadmin/edit-student/'.$student['applications_id']) ?>"
class="btn btn-sm btn-warning">
Edit
</a>

</td>

</tr>

<?php endforeach; ?>

<?php else: ?>

<tr>
<td></td>
<td></td>
<td></td>
<td></td>
<td class="text-center">No Students Found</td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>

<?php endif; ?>

</tbody>

</table>

</div>

</div>

</div>

</div>
</div>
</div>
</div>

</main>
<script>
document.addEventListener("DOMContentLoaded", function () {

    const checkbox = document.getElementById("approvedFilter");
    const sessionFilter = document.getElementById("sessionFilter");
    const rows = document.querySelectorAll("#studentsTable tbody tr");
    const countBox = document.getElementById("approvedCount");

    function updateTable() {

        let count = 0;

        rows.forEach(row => {

            let status = row.getAttribute("data-status");
            let session = row.getAttribute("data-session");
            let matchesSession = true;

            if (sessionFilter.value === "2026-02") {
                matchesSession = session >= "2026-02" && session <= "2026-05";
            } else if (sessionFilter.value === "2026-06") {
                matchesSession = session >= "2026-06";
            }

            if (checkbox.checked) {

                if (status == "1" && matchesSession) {
                    row.style.display = "";
                    count++;
                } else {
                    row.style.display = "none";
                }

            } else {

                row.style.display = matchesSession ? "" : "none";

                if (status == "1" && matchesSession) {
                    count++;
                }
            }

        });

        countBox.innerText = count;
    }

    checkbox.addEventListener("change", updateTable);
    sessionFilter.addEventListener("change", updateTable);

    // Initial count and default Jun 2026 session filter
    updateTable();

});
</script>
