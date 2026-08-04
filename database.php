<?php
  
// Define the URL and data
$url = 'form.php';

function changeEstadoCurso(int $id_curso) {
    //Handler si no hay id
    if(empty($id)){
        return null;
    }

    // $params=['name'=>'John', 'surname'=>'Doe', 'age'=>36];
    $params=['id_curso'=>$id_curso]
    $defaults = array(
        CURLOPT_URL => $url,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $params,
    );

    $ch = curl_init();
    curl_setopt_array($ch, ($options + $defaults));
}

?>