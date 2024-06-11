<?php foreach ($my_bundles->result_array() as $key => $my_bundle):
	$user_id = $this->session->userdata('user_id');
	$course_ids = json_decode($my_bundle['course_ids']);?>


	<article class="col-md-6 col-lg-4 mb-5">
		<div class="w-100">
			<?php if(file_exists('uploads/course_bundle/banner/'.$my_bundle['banner'])): ?>
	            <img src="<?php echo base_url('uploads/course_bundle/banner/'.$my_bundle['banner']); ?>" alt="" class="img-fluid">
	        <?php else: ?>
	            <img src="<?php echo base_url('uploads/course_bundle/banner/thumbnail.png'); ?>" alt="" class="img-fluid">
	        <?php endif; ?>
		</div>
		<div class="card border">
			<div class="card-body pb-1">
				<div class="mb-3">
					<div class="mb-5">
						<h5 class="mb-0 pb-0">
							<a class="text-inherit text-primary" href="<?php echo site_url('bundle_details/'.$my_bundle['id'].'/'.rawurlencode(slugify($my_bundle['title']))); ?>"><?= $my_bundle['title']; ?></a>
						</h5>
					</div>
					<?php foreach($course_ids as $course_id):
		                $this->db->where('id', $course_id);
		                $course_details = $this->db->get('course')->row_array();
		                if($course_details['status'] != 'active') continue; ?>
						<div class="row mb-2">
							<div class="col-md-12">
								<a href="<?php echo site_url('home/course/'.rawurlencode(slugify($course_details['title'])).'/'.$course_details['id']); ?>" target="_blank">
									<img src="<?php echo $this->crud_model->get_course_thumbnail_url($course_details['id']); ?>" alt="" class="img-fluid mr-2 float-left " width="60px;">
					                <p class="text-muted p-0 m-0 cursor-pointer text-13">
			                            <span class="text-13 text-muted"><?= $course_details['title']; ?></span>
			                            <br>
			                            <a class="text-12 text-primary float-right" href="<?= site_url('addons/course_bundles/lesson/'.rawurlencode(slugify($course_details['title'])).'/'.$my_bundle['id'].'/'.$course_id); ?>">
				                        	<i class="fas fa-play-circle"></i>
				                            <?= site_phrase('start_lesson'); ?>
				                        </a>
			                        </p>
			                    </a>
			                </div>
			            </div>
			            <hr>
				    <?php endforeach; ?>
				    <div class="w-100 pb-2">
					<div class="text-sm float-left w-100 pb-2">
						<?= site_phrase('status'); ?> : 
						<?php if(get_bundle_validity($my_bundle['id']) == 'valid'): ?>
							<span class="badge badge-success"><?= site_phrase('active'); ?></span>
						<?php else: ?>
							<span class="badge badge-danger"><?= site_phrase('expired'); ?></span>
						<?php endif; ?>
						<?php if($my_bundle['status'] != 1): ?>
							<span class="badge badge-secondary"><?= site_phrase('currently_deactivate'); ?></span>
						<?php endif; ?>
						<div class="btn-group dropleft float-right">
							<button type="button" class="border-0 bg-white text-muted" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-ellipsis-v"></i>
							</button>
							<div class="dropdown-menu">
								<a class="dropdown-item text-muted" href="javascript:;" onclick="showAjaxModal('<?= site_url('addons/course_bundles/bundle_purchase_history/'.$my_bundle['id']); ?>')"><?= site_phrase('payment_history'); ?></a>
								<?php if(get_bundle_validity($my_bundle['id']) == 'valid'): ?>
									<a class="dropdown-item text-muted" href="javascript:;" onclick="showAjaxModal('<?= site_url('addons/course_bundles/bundle_rating/'.$my_bundle['id']); ?>')"><?= site_phrase('rating'); ?></a>
								<?php else: ?>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item text-muted" href="<?= site_url('course_bundles/buy/'.$my_bundle['id']); ?>"><?= site_phrase('renew_subscription'); ?></a>
								<?php endif; ?>
							</div>
						</div>
						<br>
						<span class="expire-date mini-text">
							<?php $expire_date = $this->course_bundle_model->get_bundle_purchase_date($my_bundle['id'])+$my_bundle['subscription_limit']*86400; ?>
                            <?= site_phrase('expire_on_date').': '.date('d M Y', $expire_date); ?>
						</span>
					</div>
				</div>
				</div>
			</div>
		</div>
	</article>


<?php endforeach; ?>
<?php include 'course_bundle_scripts.php'; ?>