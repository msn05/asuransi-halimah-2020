<?php 
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$options = $dompdf->getOptions();
$options->setIsRemoteEnabled(true);
$options->setDefaultFont('Times News Roman');
$options->set('chroot', '/'); // Just for testing :)
// $dompdf->set_option('isRemoteEnabled', TRUE);
$options->set('isRemoteEnabled', true);
$dompdf->setOptions($options);