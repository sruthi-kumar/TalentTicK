<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function

// Load Composer's autoloader
require __DIR__ . '/vendor/autoload.php';

function makePdf($html) {
	$mpdf = new mPDF();
	$mpdf->WriteHTML($html);
	$mpdf->Output();
}
