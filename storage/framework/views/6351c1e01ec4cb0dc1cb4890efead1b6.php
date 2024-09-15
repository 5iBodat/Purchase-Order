<div>
	<div class="card-header text-center">
		<h4><?php echo e($chartTitle); ?></h4>
	</div>
	<div class="card-body">
		<div id="<?php echo e($chartID); ?>"></div>
	</div>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
	$(function () {
		const chartID = "#<?php echo e($chartID); ?>";

		let options = {
			series: <?php echo json_encode($series, 15, 512) ?>,
			labels: <?php echo json_encode($labels, 15, 512) ?>,
			chart: {
				type: "donut",
				width: "100%",
				height: "350px",
			},
			legend: {
				position: "bottom",
			},
			plotOptions: {
				pie: {
					donut: {
						size: "30%",
					},
				},
			},
		};

		<?php if(isset($colors)): ?>
			options.colors = <?php echo json_encode($colors, 15, 512) ?>;
		<?php endif; ?>

		new ApexCharts(document.querySelector(chartID), options).render();
	});
</script>
<?php $__env->stopPush(); ?>
<?php /**PATH /Users/nugihiday/Documents/Workspace/sph/resources/views/components/apexcharts/pie-chart.blade.php ENDPATH**/ ?>