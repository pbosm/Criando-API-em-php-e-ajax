<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET,PUT,POST,DELETE");

require_once('../Function/CRUD.php');

class Rest {
    // Executa a Classe e Função recebida por URL e envia os parâmetros por GET ou POST
    public static function open($request) {

        $url = explode('/', $request['function']); //pega o caminho da função fornecida atráves do ajax | Exemplo: Functions/showClient

        $class = ucfirst($url[0]); //pega a classe e transforma a primeira letra em maiuscula | Exemplo: Functions
        array_shift($url);

        $metod = $url[0]; //retorna o método chamado que está dentro da classe | Exemplo: showClient
        array_shift($url);

        $args = array(); //retorna as informações fornecidas no ajax | Exemplo: 'cliente': $('#txtCliente').val()
        array_shift($url);

        $args = $_REQUEST;
        unset($args['function']);

        try {

            // Retorna o sucesso da execução
            if (class_exists($class)) {
                if (method_exists($class, $metod)) {
                    $return = call_user_func_array(array(new $class, $metod), $args);

                    return json_encode(array('status' => 'success', 'data' => $return));
                } else {
                    return json_encode(array('status' => 'erro', 'data' => 'Método inexistente!'));
                }
            } else {
                return json_encode(array('status' => 'erro', 'data' => 'Classe inexistente!'));
            }
        } catch (Exception $e) {	
            // Retorna o erro caso exista
            $errorMessage 	= $e->getMessage();
            $errorFile 		= $e->getFile();
            $errorLine 		= $e->getLine();

            echo json_encode(array('status' => 'erro', 'data' => $errorMessage, $errorFile, $errorLine));
        }
        
    }
}
// if (isset($_POST['function'], $_POST['content'])) {
    if (isset($_REQUEST)) {
		echo Rest::open($_REQUEST);
	}
// }


