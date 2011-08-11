$objDomXML = new DomDocument;
$objDomXML->loadXML($strXML);
	
$objDomXSL = new DomDocument;
$objDomXSL->loadXML($strXSL);

$proc = new XSLTProcessor;
$proc->importStyleSheet($objDomXSL);
$strHTML = $proc->transformToXML($objDomXML);
