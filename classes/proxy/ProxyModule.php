<?php
namespace proxy;

use c3s\request\XRequest;
use c3s\lib\http\HTTPClient;
use c3s\lib\utils\xml\XMLUtils;

class ProxyModule {
    public function getUrl() {
        $url = XRequest::request()->getParam('url');
        
        $client = new HTTPClient();
        $client->setResponseHeader(true);
        $content = trim($client->request(HTTPClient::METHOD_GET, $url));
        
        if ($content) {
            $resp = preg_split("~\r\n\r\n~", $content, 2);
            $content = isset($resp[1])?$resp[1]:'';
            
            $headers = explode("\n", $resp[0]);
            //prn($headers);
            //prn(XMLUtils::xml2out($content));
            //die();
            //foreach ($headers as $header) {
             header($headers[0]);
            //}
        } else {
            header("HTTP/1.1 404 Not Found");
        }
        header("Access-Control-Allow-Origin: *");
        echo $content;
        die();
    }
}

