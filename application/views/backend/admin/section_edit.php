<?php
    $course_details = $this->crud_model->get_course_by_id($param3)->row_array();
    $section_details = $this->crud_model->get_section('section', $param2)->row_array();
?>
<form action="<?php echo site_url('admin/sections/'.$param3.'/edit/'.$param2); ?>" method="post">
    <div class="form-group">
        <label for="title"><?php echo get_phrase('title'); ?></label>
        <input class="form-control" type="text" name="title" id="title" value="<?php echo $section_details['title']; ?>" required>
        <small class="text-muted"><?php echo get_phrase('provide_a_section_name'); ?></small>
    </div>
    <div>
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="form-group row mb-3">
                    <div class="offset-md-2 col-md-10">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="is_free_course1" id="is_free_course1" <?php if ($section_details['is_free_course'] == 1) echo 'checked'; ?> value="1" onclick="togglePriceFields(this.id)">
                            <label class="custom-control-label" for="is_free_course1"><?php echo get_phrase('check_if_this_is_a_free_course'); ?></label>
                        </div>
                    </div>
                </div>
            
                <div class="paid-course-stuffs">
                    <div class="form-group row mb-3">
                        <label class="col-md-2 col-form-label" for="price1"><?php echo get_phrase('course_price') . ' (' . currency_code_and_symbol() . ')'; ?></label>
                        <div class="col-md-10">
                            <input type="number" class="form-control" id="price1" name="price1" placeholder="<?php echo get_phrase('enter_course_course_price'); ?>" value="<?php echo $section_details['price']; ?>" min="0">
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <div class="offset-md-2 col-md-10">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="discount_flag1" <?php if ($section_details['discount_flag'] == 1) echo 'checked'; ?>  id="discount_flag1" value="1">
                                <label class="custom-control-label" for="discount_flag1"><?php echo get_phrase('check_if_this_course_has_discount'); ?></label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label class="col-md-2 col-form-label" for="discounted_price1"><?php echo get_phrase('discounted_price') . ' (' . currency_code_and_symbol() . ')'; ?></label>
                        <div class="col-md-10">
                            <input type="number" class="form-control" name="discounted_price1" id="discounted_price1" onkeyup="calculateDiscountPercentage1(this.value)" value="<?php echo $section_details['discounted_price']; ?>" min="0">
                            <small class="text-muted"><?php echo get_phrase('this_course_has'); ?> <span id="discounted_percentage" class="text-danger">0%</span> <?php echo get_phrase('discount'); ?></small>
                        </div>
                    </div>
                </div>
                <hr>

            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- end tab-pane -->

    <!-- <div class="form-group mb-3">
        <label><?php echo get_phrase('Date of study plan'); ?> <small class="text-muted">(<?php echo get_phrase('Optional'); ?>)</small></label>
        <input type="text" name="date_range_of_study_plan" class="form-control date date-range-with-time" data-toggle="date-picker" data-time-picker="true" data-locale="{'format': 'DD/MM hh:mm A'}">

    </div>

    <div class="form-group mb-3">
        <label><?php echo get_phrase('Restriction of study plan'); ?></label>

        <br>
        <input type="radio" id="is_restricted_no" value="" name="restricted_by" <?php if(!$section_details['restricted_by']) echo 'checked'; ?>> <label for="is_restricted_no"><?php echo get_phrase('No restriction'); ?></label>

        <br>
        <input type="radio" id="is_restricted_start_date" value="start_date" name="restricted_by" <?php if($section_details['restricted_by'] == 'start_date') echo 'checked'; ?>> <label for="is_restricted_start_date"><?php echo get_phrase('Until the start date, keep this section locked'); ?></label>

        <br>
        <input type="radio" id="is_restricted_date_range" value="date_range" name="restricted_by" <?php if($section_details['restricted_by'] == 'date_range') echo 'checked'; ?>> <label for="is_restricted_date_range"><?php echo get_phrase('Keep this section open only within the selected date range'); ?></label>

    </div> -->

    <div class="text-right">
        <button class = "btn btn-success" type="submit" name="button"><?php echo get_phrase('submit'); ?></button>
    </div>
</form>


<!-- <script type="text/javascript">
    $(function() {
        'use strict';
        $('.date-range-with-time').daterangepicker({
            timePicker: true,
            startDate: '<?php echo date('m/d/y H:i:s', $section_details['start_date']); ?>',
            endDate: '<?php echo date('m/d/y H:i:s', $section_details['end_date']); ?>',
            locale: {
                format: 'MM/DD/YYYY hh:mm A'
            }
        });
    });
</script> -->

<style type="text/css">
    .calendar-time select{
        color: #787878 !important;
    }
</style>
<script type="text/javascript">
    $(document).ready(function() {
        togglePriceFields('is_free_course1');
    });
</script>