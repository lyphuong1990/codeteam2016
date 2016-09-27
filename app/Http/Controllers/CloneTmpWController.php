<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DoanhNghiep;

use App\Http\Requests;

class CloneTmpWController extends Controller
{
	public function getdocx($id)
	{
		$dn = DoanhNghiep::find($id);

    //// Creating the new document...
		//include_once 'Sample_Header.php';
		//include(public_path(). '\storage\Sample_Header.php');
	
		 try {
		 	$templateProcessor = new \PhpOffice\PhpWord\templateProcessor(base_path(). '\common\FPT_GH3_0305210499_HD_PHUONGLV.docx');
				// Variables on different parts of document
				$templateProcessor->setValue('mst', $dn->mst);            // On section/content
				$checked = '<w:sym w:font="Wingdings" w:char="F078"/>';
				$unChecked = '<w:sym w:font="Wingdings" w:char="F0A8"/>';
				$templateProcessor->setValue('ten_dn', $dn->ten_dn);
				$templateProcessor->setValue('dia_chi', $dn->dia_chi);
				$templateProcessor->setValue('dt_dn', $dn->dt_dn);
				$templateProcessor->setValue('n_daidien', $dn->n_daidien);
				$templateProcessor->setValue("name",$checked); 
				//$templateProcessor->setValue("hello",$unChecked);

				//echo date('H:i:s'), ' Saving the result document...', EOL;
				$file= base_path(). "/common/ncc_".$dn->loai_goi.$dn->so_nam."_".$dn->mst."_".$dn->user_name.".docx";
				$templateProcessor->saveAs($file);
				 return response()->download($file);
		 } catch (Exception $e) {
		 	
		 }

		// Template processor instance creation
		//echo date('H:i:s'), ' Creating new TemplateProcessor instance...', EOL;
		//base_path() or public_path()
		
		// File::delete($filename);

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