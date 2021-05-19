<?	
	header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=top10.pdf");
    header("Content-Type: application/zip");
    header("Content-Transfer-Encoding: binary");
    readfile("../pdf/top10.pdf");
?>