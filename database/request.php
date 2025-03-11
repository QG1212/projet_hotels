<?php
require_once('../database/constants.php');
require_once('../model/Reservation_model.php');
// Database connexion.
$pdo = dbConnect();
if (!$pdo)
{
    header('HTTP/1.1 503 Service Unavailable');
    exit;
}

session_start();
// Check the request.
$requestMethod = $_SERVER['REQUEST_METHOD'];
$request = substr($_SERVER['PATH_INFO'], 1);
$request = explode('/', $request);
$requestRessource = array_shift($request);

// Check the id associated to the request.
$id = array_shift($request);
if ($id == '')
    $id = NULL;
$data=false;

if ($requestRessource == 'sejour')
{
    if ($id == NULL)
        $data = \model\Reservation::GetReservations($pdo,$_SESSION['user_id']);
    else
        $data=\model\Reservation::GetReservation($pdo,$id);
}
if($data!=false){
    header('Content-Type: application/json; charset=utf-8');
    header('Cache-control: no-store, no-cache, must-revalidate');
    header('Pragma: no-cache');
    header('HTTP/1.1 200 OK');
    echo json_encode($data);
}
else{
    header('HTTP/1.1 400 Bad Request');
}
// Send data to the client.



exit;
?>
