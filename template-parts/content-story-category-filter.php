<?php
$tax = $template_args['taxonomy'];


$args = array(
	'taxonomy' => $tax,
	'orderby' => 'name',
	'parent' => 0,
	'order'   => 'ASC'
);
$cats = get_terms($args);



?>

<div class="story-filter__sec">
	<ul class="story-filter site-padding">
		<li>
			<a class="active filter_all" href="javascript:void(0);">ALL</a>
		</li>
		<?php
		foreach ($cats as $cat) {
			$cat_link = get_term_link($cat->term_id);
		?>
			<li class="has-sub-item">
				<a href="<?php echo $cat_link; ?>">
					<?php echo $cat->name?>
				</a>

				<?php
				$children = get_terms($cat->taxonomy, array(
					'parent'    => $cat->term_id,
					'hide_empty' => false
				));
				// print_r($children); // uncomment to examine for debugging
				if ($children) { ?>

					<div id="sub-filter-1" class="sub-filter-sec">
						<div class="sub-filter-sec-row site-padding">
							<?php foreach ($children as $catchild) {
								$catchild_link = get_term_link($catchild->term_id);
							?>
								<ul class="sub-filter">
									<li>
										<?php /* <a href="<?php echo get_category_link( $catchild->term_id ) ?>"> */ ?>
										<strong>
											<?php echo $catchild->name; ?>
										</strong>
										<?php /* </a> */ ?>
										<?php
										$childtochild = get_terms($catchild->taxonomy, array(
											'parent'    => $catchild->term_id,
											'hide_empty' => false
										));
										// print_r($childtochild); // uncomment to examine for debugging
										if ($childtochild) { ?>
											<ul class="sub-filter">
												<?php foreach ($childtochild as $catchildchild) {
													$catchildchild_link = get_term_link($catchildchild->term_id);
												?>
													<li>
														<a href="<?php echo $catchildchild_link; ?>" class="clickable_filter_item" data-id="<?php echo $catchildchild->term_id; ?>" data-slug="<?php echo $catchildchild->slug; ?>">
															<?php echo $catchildchild->name; ?>
														</a>
													</li>
												<?php } ?>
											</ul>
										<?php } ?>
									</li>
								</ul>
							<?php } ?>
						</div>
					</div>

				<?php } ?>
			</li>
		<?php } ?>
	</ul>
</div>