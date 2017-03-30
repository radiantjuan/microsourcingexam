<div class="container-fluid">
	<?php echo $this->element('nav'); ?>
	<div class="container-fluid">
		<ul class="media-list">
		<?php foreach ($data as $key => $value): ?>
		  <li class="media">
			<div class="media-left">
			  <a href="#">
				<img class="media-object" src="<?php echo $value->_embedded->{'wp:featuredmedia'}[0]->media_details->sizes->thumbnail->source_url; ?>" alt="...">
			  </a>
			</div>
			<div class="media-body">
			  <h4 class="media-heading"><?php echo $value->title->rendered; ?></h4>
			  <ul style="list-style: none;">
			  	<li style="display:inline-block;">
			  		By: <?php echo $value->_embedded->author[0]->name; ?>
			  	</li>
			  	<li style="display:inline-block;">
			  		Date: <?php echo $value->date; ?>
			  	</li>
			  </ul>
			  <p class="excerpt">
			  	<?php echo $value->excerpt->rendered; ?>
			  </p>
			  <a href="<?php echo Router::url('/post/'.$value->id."/".$value->slug); ?>" class="btn btn-primary small">Read More</a>
			</div>
		  </li>
		<?php endforeach ?>

		</ul>
	</div>

</div>