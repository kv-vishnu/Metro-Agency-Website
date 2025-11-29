<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="admin-container">
    <div class="admin-sidebar">
        <ul>
            <li><a href="">Pages</a>
                <ul>
                    <?php foreach ($pages as $page){ ?>
                    <li><a href="<?= base_url('admin/PageBuilder/edit/' . $page['page_id']); ?>"><?php echo $page['title']; ?></a></li>
                    <?php } ?>
                    <!-- <li><a href="">Certification Training</a></li>
                    <li><a href="">Corporate Training</a></li>
                    <li><a href="">About Us</a></li>
                    <li><a href="">Contact Us</a></li> -->
                </ul>
            </li>
            <li><a href="">Settings</a>
        </ul>
    </div>
    <div class="admin-main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Dashboard</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/dashboard">Home</a>
                                </li>
                                <i class="fa-solid fa-chevron-right "
                                    style="font-size: 9px;margin: 6px 5px 0px 5px;"></i>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-h-100">
                        <!-- card body -->
                        <a href="<?php echo base_url('admin/pages'); ?>">
                            <div class="card-body bg-b-purple">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <span class="text-black mb-3 d-block text-truncate">Pages</span>
                                        <h4 class="mb-3">
                                            <span class="text-black">3</span>
                                        </h4>
                                    </div>
                                    <div class="col-4 icon">
                                        <i class="fa fa-store"></i>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </a>
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-h-100">
                        <!-- card body -->
                        <a href="#">
                            <div class="card-body bg-b-secondary">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <span class="text-black mb-3 d-block text-truncate">Students</span>
                                        <h4 class="mb-3">
                                            <span class="text-black">12</span>
                                        </h4>
                                    </div>
                                    <div class="col-4 icon">
                                        <i class="fa fa-store"></i>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </a>
                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!-- end col -->
        </div>
    </div>
</div>



<picture>
    <source media="(min-width:650px)" srcset="https://www.w3schools.com/tags/img_pink_flowers.jpg">
    <source media="(min-width:465px)" srcset="https://www.w3schools.com/tags/img_white_flower.jpg">
    <img src="https://www.w3schools.com/tags/img_orange_flowers.jpg" alt="Flowers" style="width:auto;">
</picture>

<picture>
    <source media="(min-width:650px)" srcset="https://www.w3schools.com/tags/img_pink_flowers.jpg">
    <source media="(min-width:465px)" srcset="https://www.w3schools.com/tags/img_white_flower.jpg">
    <img src="https://www.w3schools.com/tags/img_orange_flowers.jpg" alt="Flowers" style="width:auto;">
</picture>

<picture>
    <source media="(min-width:650px)" srcset="https://www.w3schools.com/tags/img_pink_flowers.jpg">
    <source media="(min-width:465px)" srcset="https://www.w3schools.com/tags/img_white_flower.jpg">
    <img src="https://www.w3schools.com/tags/img_orange_flowers.jpg" alt="Flowers" style="width:auto;">
</picture>




<form id="courseForm" enctype="multipart/form-data">
    <label>Certification</label>
    <select name="certification" id="certification">
        <option value="">Select Certification</option>
        <?php foreach ($certifications as $cert) : ?>
        <option value="<?= $cert['id'] ?>"><?= $cert['name'] ?></option>
        <?php endforeach; ?>
    </select><br>

    <!-- Course Level Dropdown -->
    <div id="course-level-wrapper" style="display:none;">
        <label for="course_level">Course Level:</label>
        <select name="course_level" id="course_level">
            <option value="">Select Course Level</option>
        </select>
    </div>

    <!-- Courses Dropdown -->
    <div id="courses-wrapper" style="display:none;">
        <label for="course">Course:</label>
        <select name="course" id="course">
            <option value="">Select Course</option>
        </select>
    </div>

    <label>Course Name:</label>
    <input type="text" name="course_name" id="course_name">
    <div class="error" id="error_course_name" style="color:red;"></div><br>

    <label>Course Description:</label>
    <textarea name="course_description" id="course_description"></textarea>
    <div class="error" id="error_course_description" style="color:red;"></div><br>

    <label>Duration (weeks):</label>
    <input type="number" name="duration" id="duration">
    <div class="error" id="error_duration" style="color:red;"></div><br>

    <label>Price:</label>
    <input type="number" name="price" id="price">
    <div class="error" id="error_price" style="color:red;"></div><br>

    <label>Course Image:</label>
    <input type="file" name="course_image" id="course_image" accept="image/*">
    <div class="error" id="error_course_image" style="color:red;"></div><br>

    <button type="submit">Submit</button>
</form>

<div id="responseMsg"></div>



<script>
document.getElementById("courseForm").addEventListener("submit", function(e) {
    e.preventDefault();

    // Clear previous errors
    document.querySelectorAll(".error").forEach(el => el.innerText = "");

    const course_name = document.getElementById("course_name").value.trim();
    const course_description = document.getElementById("course_description").value.trim();
    const duration = document.getElementById("duration").value.trim();
    const price = document.getElementById("price").value.trim();
    const course_image = document.getElementById("course_image").files[0];

    let hasError = false;

    if (!course_name) {
        document.getElementById("error_course_name").innerText = "Course name is required.";
        hasError = true;
    }
    if (!course_description) {
        document.getElementById("error_course_description").innerText = "Description is required.";
        hasError = true;
    }
    if (!duration || isNaN(duration) || duration <= 0) {
        document.getElementById("error_duration").innerText = "Valid duration is required.";
        hasError = true;
    }
    if (!price || isNaN(price) || price <= 0) {
        document.getElementById("error_price").innerText = "Valid price is required.";
        hasError = true;
    }

    if (!course_image) {
        document.getElementById("error_course_image").innerText = "Course image is required.";
        hasError = true;
    } else {
        const allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!allowedTypes.includes(course_image.type)) {
            document.getElementById("error_course_image").innerText = "Only JPG, PNG or GIF files allowed.";
            hasError = true;
        }
    }

    if (hasError) return;

    const formData = new FormData(this);

    fetch("<?= base_url('admin/course/save') ?>", {
            method: "POST",
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            if (data.status === "success") {
                document.getElementById("responseMsg").innerText = data.message;
                document.getElementById("courseForm").reset();
            } else if (data.errors) {
                for (const field in data.errors) {
                    document.getElementById("error_" + field).innerText = data.errors[field];
                }
            } else {
                document.getElementById("responseMsg").innerText = data.message;
            }
        })
        .catch(err => {
            document.getElementById("responseMsg").innerText = "Something went wrong!";
        });
});
</script>


<script>
document.addEventListener('DOMContentLoaded', function() {
    var certificationSelect = document.getElementById('certification');
    var courseLevelSelect = document.getElementById('course_level');
    var courseSelect = document.getElementById('course');
    var courseLevelWrapper = document.getElementById('course-level-wrapper');
    var coursesWrapper = document.getElementById('courses-wrapper');

    certificationSelect.addEventListener('change', function() {
        var certId = this.value;

        if (certId) {
            fetch('<?= base_url("admin/Course/get_levels_or_courses") ?>', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: 'certification_id=' + encodeURIComponent(certId)
                })
                .then(response => response.json())
                .then(res => {
                    courseLevelSelect.innerHTML = '<option value="">Select Course Level</option>';
                    courseSelect.innerHTML = '<option value="">Select Course</option>';
                    courseLevelWrapper.style.display = 'none';
                    coursesWrapper.style.display = 'none';

                    if (res.levels && res.levels.length > 0) {
                        res.levels.forEach(level => {
                            var option = document.createElement('option');
                            option.value = level.id;
                            option.textContent = level.name;
                            courseLevelSelect.appendChild(option);
                        });
                        courseLevelWrapper.style.display = 'block';
                    } else if (res.courses && res.courses.length > 0) {
                        res.courses.forEach(course => {
                            var option = document.createElement('option');
                            option.value = course.id;
                            option.textContent = course.name;
                            courseSelect.appendChild(option);
                        });
                        coursesWrapper.style.display = 'block';
                    }
                });
        } else {
            courseLevelSelect.innerHTML = '';
            courseSelect.innerHTML = '';
            courseLevelWrapper.style.display = 'none';
            coursesWrapper.style.display = 'none';
        }
    });
});
</script>