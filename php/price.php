<?	
	header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=price.pdf");
    header("Content-Type: application/zip");
    header("Content-Transfer-Encoding: binary");
    readfile("../pdf/price.pdf");
?>