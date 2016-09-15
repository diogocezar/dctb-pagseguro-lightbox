<?php
class LightBoxPagSeguro {
	private $token    = '';
	private $email    = '';
	private $currency = "BRL";
	private $url      = "https://ws.sandbox.pagseguro.uol.com.br/v2/checkout";
    public function __construct() {}
    public function go(){
		$data['token']            = $this->token;
		$data['email']            = $this->email;
		$data['currency']         = $this->currency;
		$data['itemId1']          = '1';
		$data['itemQuantity1']    = '1';
		$data['itemDescription1'] = 'Produto de Teste';
		$data['itemAmount1']      = '299.00';

		$data = http_build_query($data);
		$curl = curl_init($this->url);

		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		$xml = curl_exec($curl);
		curl_close($curl);
		$xml= simplexml_load_string($xml);
		echo $xml->code;
    }
}
$obj = new LightBoxPagSeguro();
$obj->go();
?>