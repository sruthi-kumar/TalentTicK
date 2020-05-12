<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function

// Load Composer's autoloader
require __DIR__ . '/vendor/autoload.php';

//echo (__DIR__ . '/vendor/autoload.php');exit;

function makePdf($html) {
	$mpdf = new \Mpdf\Mpdf();

	$mpdf->WriteHTML($html);
	$mpdf->Output();
}
