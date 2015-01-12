<?php
function sendFeedback($type, $mail, $contenu) {
    $api_id = "";
    $api_key = "";

    $datas = array('type' => $type,
        'mail' => $mail,
        'content' => $contenu,
        'host' => "Formulaire de rapport web"
    );

    // initialisation de la session curl
    $ch = curl_init();

    // configuration des options
    curl_setopt($ch, CURLOPT_URL, "http://www.ppulse.fr/rest/v1/feedback"); //adresse api propulse
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FAILONERROR, true);

    //apiId et secret (au format apiId:secret) A CHANGER
    curl_setopt($ch, CURLOPT_USERPWD, $api_id.":".$api_key);

    // requete curl
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST'); //POST - ajout d'un feedback
    curl_setopt($ch, CURLOPT_POSTFIELDS, $datas); //ajout des donnees

    // execution de la session
    $content = curl_exec($ch);
    if(curl_errno($ch)) { //si il y a une erreur
        $content = json_encode(array('code' => 5,
            'message' => 'Problème lors de la requête cUrl'));
    }

    // fermeture des ressources
    curl_close($ch);

    return $content;
}

if(isset($_POST["message"]) && isset($_POST["type"]) && isset($_POST["email"]))
{
    $message = $_POST["message"];
    $email = $_POST["email"];

    switch($_POST["type"])
    {
        case 1:
            $type="Bug";
            break;
        case 2:
            $type = "Suggestion";
            break;
        default:
            echo json_encode(array("code" => 3, "message" => "Le type est invalide"));
            break;
    }

    echo sendFeedback($type, $email, $message);
}
else
{
    echo json_encode(array("code" => 3, "message" => "Donnée manquante"));
}
?>
