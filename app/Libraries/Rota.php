<?php
class Rota{
    private $controlador = 'Paginas';
    public function __construct(){
        //echo 'crindo a primeira classe'
        $url = $this->url();
        //var_dump($this);

        if(file_exists('../app/Controllers'.ucwords($url[0]). '.php')){
            $this->controlador = ucwords($url[0]);
            unset($url[0]);
        }
    }//fim da função construtor
    private function url(){
        //echo 'carregando método url'
        //echo $_GET['url'];
        //o filtro FILTER_SANITIZE_URL remove todos os 
        $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
        //verifica se a url existe
        if(isset($url)){
            //trim - Retira espaço no início e no final de uma string
            //rtrim - Retira espaço em branco (ou outros caracteres) do final da string
            $url = trim(rtrim('/', $url));

            //explode - Divide uma string em strigs, retorna um array
            $url = explode('/', $url);
            return $url;
        }
    }//fim da função url
}
?>