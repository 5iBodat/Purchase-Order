<!-- resources/views/sph/pdf_template.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>SPH Details</title>
</head>
<body>
    <h1>SPH Details</h1>

    <p><strong>SPH Code:</strong> <?php echo e($sph->sph_code); ?></p>
    <p><strong>Company Name:</strong> <?php echo e($sph->company_name); ?></p>
    <p><strong>Product Name:</strong> <?php echo e($sph->product_name); ?></p>
    <p><strong>Harga:</strong> <?php echo e($sph->harga); ?></p>
    <p><strong>PPN:</strong> <?php echo e($sph->ppn); ?></p>
    <p><strong>PBBKB:</strong> <?php echo e($sph->pbbkb); ?></p>
    <p><strong>Total:</strong> <?php echo e($sph->total); ?></p>
    <p><strong>Oat Lokasi:</strong> <?php echo e($sph->oatlokasi); ?></p>
    <p><strong>Harga Oat:</strong> <?php echo e($sph->hargaoat); ?></p>
    <p><strong>Notes:</strong> <?php echo e($sph->notes); ?></p>
    <p><strong>Customer PO:</strong> <?php echo e($sph->customer_po); ?></p>
    <p><strong>Username:</strong> <?php echo e($sph->username); ?></p>
    <p><strong>Updated At:</strong> <?php echo e($sph->updated_at); ?></p>
</body>
</html>
<?php /**PATH C:\Users\Unknown\OneDrive\Documents\KERJA\FREELANCE\sph\resources\views/sph/pdf_template.blade.php ENDPATH**/ ?>