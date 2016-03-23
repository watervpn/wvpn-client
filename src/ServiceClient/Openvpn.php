<?php
//namespace WvpnClient\Client;
namespace Wvpn\Client\ServiceClient;
//use WvpnClient\Exception as Exception;
use Wvpn\Client\Exception as Exception;

class Openvpn extends Base
{
   /**
    * Client Config
    */
   public function getClientConfig($account, $server, $downloadable = false, $filename = 'wpvn.opvn',  $async = false)
   {
        $data = ['account' => $account, 'server' => $server];
        $options = ['json' => $data];
        $options['future'] = $async;

        $response = $this->post( 'getClientConfig', $options );
        if( !$downloadable ){
            return $response;
        }
        else{
            $response = $response->json();
            $file = $response['config'];
            //header ( "Content-Type: text/plain" );
            header ( "Content-Type: application/ovpn" );
            header ('Content-Disposition: attachment; filename="' . $filename . '"');
            echo $file;
        }
   }

   public function getClientParam($account, $async=false)
   {
        $data = ['account' => $account];
        $options = ['json' => $data];
        $options['future'] = $async;

        return $response = $this->post( 'getClientParam', $options );
   }

   public function setClientParam($account, $key, $value, $async=false)
   {
        $data = ['account' => $account];
        $data = ['key' => $key];
        $data = ['value' => $value];
        $options = ['json' => $data];
        $options['future'] = $async;
        
        return $response = $this->post( 'setClientParam', $options );
   }

   public function setClientParams($account, array $data, $async=false)
   {
        $options = ['json' => $data];
        $options['future'] = $async;
        
        return $response = $this->post( 'setClientParams', $options );
   }

   public function deleteClientParam($account, $key, $value, $async=false)
   {
        $data = ['account' => $account];
        $data = ['key' => $key];
        $options = ['json' => $data];
        $options['future'] = $async;

        return $response = $this->post( 'deleteClientParam', $options );
   }

   /**
    * Server Status 
    */
   public function getServerStatus($host = null, $async=false)
   {
        $data = ['host' => $host];
        $options = ['json' => $data];
        $options['future'] = $async;
        return $this->post( 'getServerStatus', $options );
   }

   public function fetchServerStatusJob($async = false)
   {
        $data = ['async' => $async];
        $options = ['json' => $data];
        $options['future'] = $async;
        return $this->post( 'fetchServerStatusJob', $options);
   }


}

?>
