<!-- start page title -->
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo get_phrase('course_enrolment'); ?></h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row justify-content-center">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <h4 class="mb-3 header-title"><?php echo get_phrase('enrolment_form'); ?></h4>

                    <form class="required-form" action="<?php echo site_url('admin/enrol_student/enrol'); ?>" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="multiple_user_id"><?php echo get_phrase('users'); ?><span class="required">*</span> </label>
                            <select class="server-side-select2" action="<?php echo base_url('admin/get_select2_user_data'); ?>" name="user_id[]" multiple="multiple" required>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="multiple_course_id"><?php echo get_phrase('course_to_enrol'); ?><span class="required">*</span> </label>
                            <select class="select2 form-control select2-multiple" data-toggle="select2" multiple="multiple" onchange="get_price(this)" data-placeholder="Choose ..." name="course_id[]" id="multiple_course_id" required>
                                <option value=""><?php echo get_phrase('select_a_course'); ?></option>
                                <?php $course_list = $this->db->where('status', 'active')->or_where('status', 'private')->get('course')->result_array();
                                    
                                    foreach ($course_list as $course) : ?>
                                        <option value="<?php echo $course['id']; ?>" data-price="<?php
                                            if ($course['discounted_price'] == null || $course['discounted_price'] == 0) {
                                                echo $course['price'];
                                            } else {
                                                echo $course['discounted_price'];
                                            }
                                        ?>">
                                            <?php echo $course['title']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                    
                            </select>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">

                        <button type="button" class="btn btn-primary" onclick="checkRequiredFields()"><?php echo get_phrase('enrol_student'); ?></button>
                        <span  class="bg-info text-white px-3 py-1 rounded" disabled id="total_course"><?php echo get_phrase('total'); ?>: 0</span>
 
                    </div>
                    </form>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->



    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <h4 class="mb-3 header-title"><?php echo get_phrase('enrolment_form'); ?></h4>

                    <form id="required-form1"  action="<?php echo site_url('admin/enrol_section_student/enrol'); ?>" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="multiple_user_id"><?php echo get_phrase('users'); ?><span class="required">*</span> </label>
                            <select class="server-side-select2" action="<?php echo base_url('admin/get_select2_user_data'); ?>" name="user_id[]" multiple="multiple" required>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="multiple_course_id1"><?php echo get_phrase('course'); ?><span class="required">*</span> </label>
                            <select class="select2 form-control select2-multiple" data-toggle="select2" onchange="loadSections()" data-placeholder="Choose ..." name="course_id" id="multiple_course_id1" required>
                                <option value=""><?php echo get_phrase('select_a_course'); ?></option>
                                <?php foreach ($course_list as $course) : ?>
                                    <option value="<?php echo $course['id'] ?>"><?php echo $course['title']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="multiple_course_id2"><?php echo get_phrase('section_to_enrol'); ?><span class="required">*</span> </label>
                            <select class="select2 form-control select2-multiple" data-toggle="select2" multiple="multiple" onchange="get_price_section(this)" data-placeholder="Choose ..." name="section_id[]" id="multiple_course_id2" required>
                                <option value=""><?php echo get_phrase('select_a_section'); ?></option>
                            </select>
                        </div>


                        <div class="d-flex justify-content-between align-items-center">

                        <button type="submit" class="btn btn-primary "><?php echo get_phrase('enrol_student'); ?></button>
                                        <span  class="bg-info text-white px-3 py-1 rounded" disabled id="total_section"><?php echo get_phrase('total'); ?>: 0</span>

                                        </div>
                    </form>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
    

    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <h4 class="mb-3 header-title"><?php echo get_phrase('enrolment_form'); ?></h4>

                    <form class="required-form2" action="<?php echo site_url('admin/enrol_lession_student/enrol'); ?>" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="multiple_user_id"><?php echo get_phrase('users'); ?><span class="required">*</span> </label>
                            <select class="server-side-select2" action="<?php echo base_url('admin/get_select2_user_data'); ?>" name="user_id[]" multiple="multiple" required>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="multiple_course_id3"><?php echo get_phrase('course'); ?><span class="required">*</span> </label>
                            <select class="select2 form-control select2-multiple" data-toggle="select2" onchange="loadSections1()" data-placeholder="Choose ..." name="course_id" id="multiple_course_id3" >
                                <option value=""><?php echo get_phrase('select_a_course'); ?></option>
                                <?php foreach ($course_list as $course) : ?>
                                    <option value="<?php echo $course['id'] ?>"><?php echo $course['title']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="multiple_course_id4"><?php echo get_phrase('section'); ?><span class="required">*</span> </label>
                            <select class="select2 form-control select2-multiple" data-toggle="select2" onchange="loadSections2()" data-placeholder="Choose ..." name="section_id" id="multiple_course_id4" >
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="multiple_course_id5"><?php echo get_phrase('lession_to_enrol'); ?><span class="required">*</span> </label>
                            <select class="select2 form-control select2-multiple" data-toggle="select2" onchange="get_price_lession(this)" multiple="multiple" data-placeholder="Choose ..." name="lession_id[]" id="multiple_course_id5" >
                                <option value=""><?php echo get_phrase('select_a_lession'); ?></option>
                            </select>
                        </div>


                 
                        <div class="d-flex justify-content-between align-items-center">

                        <button type="submit" class="btn btn-primary" ><?php echo get_phrase('enrol_student'); ?></button>
                                        <span  class="bg-info text-white px-3 py-1 rounded" disabled id="total_lession"><?php echo get_phrase('total'); ?>: 0</span></div>
                    </form>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>




<script type="text/javascript">
   function get_price(selectElement) {
        var totalPrice = 0;
        var selectedOptions = selectElement.selectedOptions;
        
        for (var i = 0; i < selectedOptions.length; i++) {
            totalPrice += parseFloat(selectedOptions[i].getAttribute('data-price'));
        }

        // Display the total price or perform any other action
        document.getElementById('total_course').innerText = '<?php echo get_phrase("total"); ?>: ' + totalPrice.toFixed(2); // Assuming you want to display the total with 2 decimal places
    }
    function get_price_section(selectElement) {
    
        var totalPrice = 0;
        var selectedOptions = selectElement.selectedOptions;
        
        for (var i = 0; i < selectedOptions.length; i++) {
            totalPrice += parseFloat(selectedOptions[i].getAttribute('data-price'));
          
        }

        // Display the total price or perform any other action
        document.getElementById('total_section').innerText = '<?php echo get_phrase("total"); ?>: ' + totalPrice.toFixed(2); // Assuming you want to display the total with 2 decimal places
    }
    function get_price_lession(selectElement) {
    
    var totalPrice = 0;
    var selectedOptions = selectElement.selectedOptions;
    
    for (var i = 0; i < selectedOptions.length; i++) {
    
        totalPrice += parseFloat(selectedOptions[i].getAttribute('data-price'));
      
    }

    // Display the total price or perform any other action
    document.getElementById('total_lession').innerText = '<?php echo get_phrase("total"); ?>: ' + totalPrice.toFixed(2); // Assuming you want to display the total with 2 decimal places
}
    function loadSections() {
    var course_id = $('#multiple_course_id1').val();
    $.ajax({
        url: '<?php echo site_url('admin/get_sections'); ?>', // Adjust this to your route
        type: 'POST',
        dataType: 'json',
        data: { course_id: course_id },
        success: function(response) {
            
            $('#multiple_course_id2').empty();

            $.each(response, function(key, value) {
               
                var price = value.discounted_price == null || value.discounted_price == 0 ? value.price : value.discounted_price;
                if(price ==null){
                    price=0;
                }
                $('#multiple_course_id2').append('<option value="' + value.id + '" data-price="' + price + '">' + value.title + '</option>');
            });
        }
    });
}



function loadSections1() {
    var course_id = $('#multiple_course_id3').val();
    $.ajax({
        url: '<?php echo site_url('admin/get_sections'); ?>', // Adjust this to your route
        type: 'POST',
        dataType: 'json',
        data: {course_id: course_id},
        success: function(response) {
       
            
            $('#multiple_course_id4').empty();

            $.each(response, function(key, value) {
                
                $('#multiple_course_id4').append('<option value="' + value.id + '">' + value.title + '</option>');
            });
            loadSections2();
        }
    });
}

function loadSections2() {
    var course_id = $('#multiple_course_id4').val();
    $.ajax({
        url: '<?php echo site_url('admin/get_lession'); ?>', // Adjust this to your route
        type: 'POST',
        dataType: 'json',
        data: {course_id: course_id},
        success: function(response) {
            $('#multiple_course_id5').empty();

            $.each(response, function(key, value) {
                var price = value.discounted_price == null || value.discounted_price == 0 ? value.price : value.discounted_price;
                if(price ==null){
                    price=0;
                }
                $('#multiple_course_id5').append('<option value="' + value.id + '" data-price="' + price + '">' + value.title + '</option>');
            });
        }
    });
}



</script>