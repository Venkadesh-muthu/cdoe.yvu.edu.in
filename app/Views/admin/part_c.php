<style>

.academic-scroll{
    overflow-x:auto;
}

.academic-table{
    min-width:1400px;
}

.academic-table th{
    white-space:nowrap;
}

.academic-table input{
    width:100%;
    min-width:250px;
}

</style>


<main class="nxl-container">

    <div class="nxl-content">

        <!-- Page Header -->
        <div class="page-header">

            <div class="page-header-left d-flex align-items-center">

                <div class="page-header-title">
                    <h5 class="m-b-10">Online Education</h5>
                </div>

                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url('admin/dashboard') ?>">Home</a>
                    </li>
                    <li class="breadcrumb-item">Online Education</li>
                    <li class="breadcrumb-item">Part - C</li>
                </ul>

            </div>

        </div>


        <!-- Main Content -->
        <div class="main-content">

            <div class="row">

                <div class="col-lg-12">

                    <form method="post" action="<?= base_url('admin/part-c/store') ?>">

                        <input type="hidden" name="application_id" value="<?= $application_id ?>">

                        <div class="card">

                            <div class="card-header">
                                <h4 class="fw-bold">
                                    Part - C : Academic Details
                                </h4>
                            </div>


                            <div class="card-body">

                                <button
                                    type="button"
                                    class="btn btn-success mb-3"
                                    onclick="addRow()">
                                    Add Row
                                </button>


                                <div class="academic-scroll">

                                    <table class="table table-bordered academic-table">

                                        <thead class="table-light">

                                            <tr>
                                                <th>Exam Passed</th>
                                                <th>Name of the Institute</th>
                                                <th>Board / University</th>
                                                <th>Subjects / Stream</th>
                                                <th>Division</th>
                                                <th>Percentage</th>
                                                <th>Year of Passing</th>
                                                <th>Action</th>
                                            </tr>

                                        </thead>


                                        <tbody id="academicTable">

                                            <?php if (!empty($education)): ?>

                                                <?php foreach ($education as $key => $row): ?>

                                                    <tr>

                                                        <td>
                                                            <input
                                                                type="text"
                                                                name="education[<?= $key ?>][exam_passed]"
                                                                value="<?= $row['exam_passed'] ?>"
                                                                class="form-control">
                                                        </td>

                                                        <td>
                                                            <input
                                                                type="text"
                                                                name="education[<?= $key ?>][institute]"
                                                                value="<?= $row['institute'] ?>"
                                                                class="form-control">
                                                        </td>

                                                        <td>
                                                            <input
                                                                type="text"
                                                                name="education[<?= $key ?>][board]"
                                                                value="<?= $row['board_university'] ?>"
                                                                class="form-control">
                                                        </td>

                                                        <td>
                                                            <input
                                                                type="text"
                                                                name="education[<?= $key ?>][subjects]"
                                                                value="<?= $row['subjects_stream'] ?>"
                                                                class="form-control">
                                                        </td>

                                                        <td>
                                                            <input
                                                                type="text"
                                                                name="education[<?= $key ?>][division]"
                                                                value="<?= $row['division'] ?>"
                                                                class="form-control">
                                                        </td>

                                                        <td>
                                                            <input
                                                                type="text"
                                                                name="education[<?= $key ?>][percentage]"
                                                                value="<?= $row['percentage'] ?>"
                                                                class="form-control">
                                                        </td>

                                                        <td>
                                                            <input
                                                                type="text"
                                                                name="education[<?= $key ?>][year]"
                                                                value="<?= $row['year_of_passing'] ?>"
                                                                class="form-control">
                                                        </td>

                                                        <td class="text-center">
                                                            <button
                                                                type="button"
                                                                class="btn btn-danger btn-sm"
                                                                onclick="removeRow(this)">
                                                                Remove
                                                            </button>
                                                        </td>

                                                    </tr>

                                                <?php endforeach; ?>

                                            <?php else: ?>

                                                <tr>

                                                    <td>
                                                        <input type="text" name="education[0][exam_passed]" class="form-control">
                                                    </td>

                                                    <td>
                                                        <input type="text" name="education[0][institute]" class="form-control">
                                                    </td>

                                                    <td>
                                                        <input type="text" name="education[0][board]" class="form-control">
                                                    </td>

                                                    <td>
                                                        <input type="text" name="education[0][subjects]" class="form-control">
                                                    </td>

                                                    <td>
                                                        <input type="text" name="education[0][division]" class="form-control">
                                                    </td>

                                                    <td>
                                                        <input type="text" name="education[0][percentage]" class="form-control">
                                                    </td>

                                                    <td>
                                                        <input type="text" name="education[0][year]" class="form-control">
                                                    </td>

                                                    <td class="text-center">
                                                        <button
                                                            type="button"
                                                            class="btn btn-danger btn-sm"
                                                            onclick="removeRow(this)">
                                                            Remove
                                                        </button>
                                                    </td>

                                                </tr>

                                            <?php endif; ?>

                                        </tbody>

                                    </table>

                                </div>

                            </div>


                            <div class="card-footer text-end">

                                <button
                                    type="submit"
                                    class="btn btn-primary"
                                    name="form_submit">
                                    Save & Next
                                </button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</main>


<script>

let rowIndex = <?= !empty($education) ? count($education) : 1 ?>;

function addRow(){

    var table = document.getElementById("academicTable");

    var row = table.insertRow();

    row.innerHTML = `

    <td>
        <input type="text" name="education[${rowIndex}][exam_passed]" class="form-control">
    </td>

    <td>
        <input type="text" name="education[${rowIndex}][institute]" class="form-control">
    </td>

    <td>
        <input type="text" name="education[${rowIndex}][board]" class="form-control">
    </td>

    <td>
        <input type="text" name="education[${rowIndex}][subjects]" class="form-control">
    </td>

    <td>
        <input type="text" name="education[${rowIndex}][division]" class="form-control">
    </td>

    <td>
        <input type="text" name="education[${rowIndex}][percentage]" class="form-control">
    </td>

    <td>
        <input type="text" name="education[${rowIndex}][year]" class="form-control">
    </td>

    <td class="text-center">
        <button
            type="button"
            class="btn btn-danger btn-sm"
            onclick="removeRow(this)">
            Remove
        </button>
    </td>

    `;

    rowIndex++;

}


function removeRow(button){

    button.closest("tr").remove();

}

</script>