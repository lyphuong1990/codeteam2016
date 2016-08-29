<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CloneTmpWController extends Controller
{
	public function index()
	{
    //// Creating the new document...
		//include_once 'Sample_Header.php';
		//include(public_path(). '\storage\Sample_Header.php');
	
 

		// Template processor instance creation
		//echo date('H:i:s'), ' Creating new TemplateProcessor instance...', EOL;
		//base_path() or public_path()
		$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(public_path(). '\storage\Sample_07_TemplateCloneRow.docx');
		// Variables on different parts of document
		$templateProcessor->setValue('weekday', date('l'));            // On section/content
		$templateProcessor->setValue('time', date('H:i'));             // On footer
		$templateProcessor->setValue('serverName', realpath(__DIR__)); // On header
		// Simple table
		$templateProcessor->cloneRow('rowValue', 10);
		$templateProcessor->setValue('rowValue#1', 'Sun');
		$templateProcessor->setValue('rowValue#2', 'Mercury');
		$templateProcessor->setValue('rowValue#3', 'Venus');
		$templateProcessor->setValue('rowValue#4', 'Earth');
		$templateProcessor->setValue('rowValue#5', 'Mars');
		$templateProcessor->setValue('rowValue#6', 'Jupiter');
		$templateProcessor->setValue('rowValue#7', 'Saturn');
		$templateProcessor->setValue('rowValue#8', 'Uranus');
		$templateProcessor->setValue('rowValue#9', 'Neptun');
		$templateProcessor->setValue('rowValue#10', 'Pluto');
		$templateProcessor->setValue('rowNumber#1', '1');
		$templateProcessor->setValue('rowNumber#2', '2');
		$templateProcessor->setValue('rowNumber#3', '3');
		$templateProcessor->setValue('rowNumber#4', '4');
		$templateProcessor->setValue('rowNumber#5', '5');
		$templateProcessor->setValue('rowNumber#6', '6');
		$templateProcessor->setValue('rowNumber#7', '7');
		$templateProcessor->setValue('rowNumber#8', '8');
		$templateProcessor->setValue('rowNumber#9', '9');
		$templateProcessor->setValue('rowNumber#10', '10');
		// Table with a spanned cell
		$templateProcessor->cloneRow('userId', 3);
		$templateProcessor->setValue('userId#1', '1');
		$templateProcessor->setValue('userFirstName#1', 'James');
		$templateProcessor->setValue('userName#1', 'Taylor');
		$templateProcessor->setValue('userPhone#1', '+1 428 889 773');
		$templateProcessor->setValue('userId#2', '2');
		$templateProcessor->setValue('userFirstName#2', 'Robert');
		$templateProcessor->setValue('userName#2', 'Bell');
		$templateProcessor->setValue('userPhone#2', '+1 428 889 774');
		$templateProcessor->setValue('userId#3', '3');
		$templateProcessor->setValue('userFirstName#3', 'Michael');
		$templateProcessor->setValue('userName#3', 'Ray');
		$templateProcessor->setValue('userPhone#3', '+1 428 889 775');
		//echo date('H:i:s'), ' Saving the result document...', EOL;
		$templateProcessor->saveAs(public_path().'\storage\results\112.docx');
		 $file= public_path(). "/site-docs/cv.pdf";
		 return response()->download($file, "Ahmed Badawy - CV.pdf");
		 File::delete($filename);

		//$phpWord = \PhpOffice\PhpWord\IOFactory::load($templateProcessor->save());

		//$filename = "YOUR_Filename.docx";
		//header( "Content-Type:   application/octet-stream" );// you should look for the real header that a word2007 document needs!!!
		//header( 'Content-Disposition: attachment; filename='.$filename );

		//$h2d_file_uri = tempnam( "", "htd" );
		//$objWriter =  \PhpOffice\PhpWord\IOFactory::createWriter( $phpWord, "Word2007" );
		//$objWriter->save( "php://output" );// this would output it like echo, but in combination with header: it will be sent
		// echo getEndingNotes(array('Word2007' => 'docx'));
		// if (!CLI) {
		//     include_once public_path(). '\storage\Sample_Footer.php';
		// }
	}
}