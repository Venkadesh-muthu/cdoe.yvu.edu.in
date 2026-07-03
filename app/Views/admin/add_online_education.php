<main class="nxl-container">
  <div class="nxl-content">

    <!-- ================= PAGE HEADER ================= -->
    <div class="page-header">
      <div class="page-header-left d-flex align-items-center">
        <div class="page-header-title">
          <h5>Add Admission Details</h5>
        </div>
      </div>

      <div class="page-header-right ms-auto">
        <a href="<?= base_url('admin/online-education') ?>" class="btn btn-light-primary">
          <i class="feather-arrow-left me-2"></i> Back
        </a>
      </div>
    </div>

    <div class="main-content">
      <div class="card stretch stretch-full">

        <form action="<?= base_url('add-online-education') ?>" method="post">

          <!-- ================= PERSONAL DETAILS ================= -->
          <div class="card-body">
            <h5 class="fw-bold mb-4">Applicant Personal Details</h5>

            <div class="row">

              <div class="col-md-6 mb-3">
                <label>Course Applied For</label>
                <select name="course_applied_for" class="form-control">
                  <option value="">Select Course</option>
                  <option value="MA Economics">M.A. - Economics</option>
                  <option value="MA English">M.A. - English</option>
                  <option value="MA History">M.A. - History</option>
                  <option value="MA Journalism">M.A. - Journalism</option>
                  <option value="MA Political Science">M.A. - Political Science</option>
                  <option value="MA Spl Telugu">M.A. - Spl. Telugu</option>
                  <option value="MCom General">M.Com.- General</option>
                  <option value="BFA Music">Bachelor of Fine Arts (BFA) (Hons.) - Music</option>
                </select>
              </div>
              <div class="col-md-6 mb-3">
                <label>Applicant Name</label>
                <input type="text" name="applicant_name" class="form-control">
              </div>

              <div class="col-md-6 mb-3">
                <label>Father Name</label>
                <input type="text" name="father_name" class="form-control">
              </div>

              <div class="col-md-6 mb-3">
                <label>Mother Name</label>
                <input type="text" name="mother_name" class="form-control">
              </div>

              <div class="col-md-6 mb-3">
                <label>Date of Birth</label>
                <input type="date" name="dob" class="form-control">
              </div>

              <div class="col-md-6 mb-3">
                <label>Gender</label>
                <select name="gender" class="form-control">
                  <option>Male</option>
                  <option>Female</option>
                  <option>Other</option>
                </select>
              </div>

              <div class="col-md-6 mb-3">
                <label>Category</label>
                <input type="text" name="category" class="form-control">
              </div>

              <div class="col-md-6 mb-3">
                <label>PH Category</label>
                <input type="text" name="ph_category" class="form-control">
              </div>

              <div class="col-md-6 mb-3">
                <label>Religion</label>
                <input type="text" name="religion" class="form-control">
              </div>

              <div class="col-md-6 mb-3">
                <label>Marital Status</label>
                <input type="text" name="marital_status" class="form-control">
              </div>

              <div class="col-md-6 mb-3">
                <label>Second Language</label>
                <input type="text" name="second_language" class="form-control">
              </div>

              <div class="col-md-6 mb-3">
                <label>Medium</label>
                <input type="text" name="medium" class="form-control">
              </div>

              <div class="col-md-6 mb-3">
                <label>Locality</label>
                <input type="text" name="locality" class="form-control">
              </div>

              <div class="col-md-6 mb-3">
                <label>Mobile No</label>
                <input type="text" name="mobile" class="form-control">
              </div>

              <div class="col-md-6 mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control">
              </div>

              <div class="col-md-6 mb-3">
                <label>Aadhar Card</label>
                <input type="text" name="aadhar" class="form-control">
              </div>

            </div>
          </div>

          <hr>

          <!-- ================= ADDRESS DETAILS ================= -->
          <div class="card-body">
            <h5 class="fw-bold mb-4">Address Details</h5>

            <textarea name="address" class="form-control mb-3" placeholder="Full Address"></textarea>

            <div class="row">
              <div class="col-md-4 mb-3">
                <input type="text" name="district" class="form-control" placeholder="District">
              </div>
              <div class="col-md-4 mb-3">
                <input type="text" name="state" class="form-control" placeholder="State">
              </div>
              <div class="col-md-4 mb-3">
                <input type="text" name="country" class="form-control" placeholder="Country">
              </div>
              <div class="col-md-4 mb-3">
                <input type="text" name="pincode" class="form-control" placeholder="Pincode">
              </div>
            </div>
          </div>

          <hr>

          <!-- ================= QUALIFICATION DETAILS ================= -->
          <div class="card-body">
            <h5 class="fw-bold mb-4">Qualifying Examination Details</h5>

            <div class="row">

              <div class="col-md-6 mb-3">
                <input type="text" name="qualification" class="form-control"
                       placeholder="Qualifying Examination">
              </div>

              <div class="col-md-6 mb-3">
                <input type="text" name="university" class="form-control"
                       placeholder="University / Board">
              </div>

              <div class="col-md-6 mb-3">
                <input type="text" name="group_subjects" class="form-control"
                       placeholder="Group / Subjects">
              </div>

              <div class="col-md-6 mb-3">
                <input type="text" name="registration_no" class="form-control"
                       placeholder="Registration No">
              </div>

              <div class="col-md-4 mb-3">
                <input type="text" name="passing_year" class="form-control"
                       placeholder="Month & Year of Passing">
              </div>

              <div class="col-md-4 mb-3">
                <input type="text" name="max_marks" class="form-control"
                       placeholder="Maximum Marks">
              </div>

              <div class="col-md-4 mb-3">
                <input type="text" name="obtained_marks" class="form-control"
                       placeholder="Obtained Marks">
              </div>

              <div class="col-md-4 mb-3">
                <input type="text" name="percentage" class="form-control"
                       placeholder="Marks Percentage">
              </div>

              <div class="col-md-4 mb-3">
                <input type="text" name="abc" class="form-control"
                       placeholder="ABC">
              </div>

              <div class="col-md-4 mb-3">
                <input type="text" name="credits" class="form-control"
                       placeholder="Credits">
              </div>

            </div>
          </div>

          <hr>

          <!-- ================= FEE DETAILS ================= -->
          <div class="card-body">
            <h5 class="fw-bold mb-4">Fee Details</h5>

            <div class="row">
              <div class="col-md-3 mb-3">
                <input type="text" name="amount" class="form-control" placeholder="Amount">
              </div>
              <div class="col-md-3 mb-3">
                <input type="text" name="transaction_no" class="form-control" placeholder="Transaction No">
              </div>
              <div class="col-md-3 mb-3">
                <input type="text" name="transaction_status" class="form-control" placeholder="Transaction Status">
              </div>
              <div class="col-md-3 mb-3">
                <input type="datetime-local" name="transaction_date" class="form-control">
              </div>
            </div>
          </div>

          <hr>

          <!-- ================= DECLARATION ================= -->
          <div class="card-body">
            <h5 class="fw-bold mb-4">Declaration</h5>
            <textarea name="declaration" class="form-control" rows="4">
I hereby declare that the particulars given above are correct...
            </textarea>
          </div>

          <div class="card-body">
            <button type="submit" class="btn btn-primary">
              <i class="feather-check-circle me-2"></i> Save Admission Details
            </button>
          </div>

        </form>

      </div>
    </div>
  </div>
</main>