<div>
	<div class="card-header">
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
		const series = <?php echo json_encode($series, 15, 512) ?>;
		const categories = <?php echo json_encode($categories, 15, 512) ?>;

		const options = {
			series: [
				{
					name: "<?php echo e($seriesTitle); ?>",
					data: series,
				},
			],
			chart: {
				height: 350,
				type: "line",
				zoom: {
					enabled: false,
				},
			},
			dataLabels: {
				enabled: false,
			},
			stroke: {
				curve: "straight",
			},
			grid: {
				row: {
					colors: ["#f3f3f3", "transparent"],
					opacity: 0.5,
				},
			},
			xaxis: {
				categories: categories,
			},
		};

		new ApexCharts(document.querySelector(chartID), options).render();
	});
</script>
<?php $__env->stopPush(); ?>
<?php /**PATH /Users/nugihiday/Documents/Workspace/sph/resources/views/components/apexcharts/line-chart.blade.php ENDPATH**/ ?>