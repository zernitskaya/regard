<?

$modal_id = (int)$_GET['id'];
$xml = '../xml/modals.xml';
$modals = simplexml_load_file($xml);

echo json_encode($modals->modal[$modal_id]);
?>