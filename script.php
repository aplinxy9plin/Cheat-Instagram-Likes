<?php
include('script2.php');
$proxy = new Proxy();
$proxy->curl( "http://194.58.115.48/add?id=".$media_id."" );
class Proxy {

	private $ch, $proxy;

	function __construct() {

		$torSocks5Proxy = "socks5://127.0.0.1:9050";

		$this->ch = curl_init();

		curl_setopt( $this->ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5 );
		curl_setopt( $this->ch, CURLOPT_PROXY, $torSocks5Proxy );
		curl_setopt( $this->ch, CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $this->ch, CURLOPT_FOLLOWLOCATION, true );
		curl_setopt( $this->ch, CURLOPT_RETURNTRANSFER, false );
		curl_setopt( $this->ch, CURLOPT_HEADER, false );

	}

	public function curl( $url, $postParameter = null ) {

		if( sizeof( $postParameter ) > 0 )
			curl_setopt( $this->ch, CURLOPT_POSTFIELDS, $postParameter );

		curl_setopt( $this->ch, CURLOPT_URL, $url );
		return curl_exec( $this->ch );

	}

	function __destruct() {

		curl_close( $this->ch );

	}

}
?>