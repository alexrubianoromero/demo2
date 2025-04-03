<?php 
$raiz = dirname(dirname(dirname(__file__)));
require_once($raiz.'/orden/modelo/OrdenesModelo.class.php');
require_once($raiz.'/orden/modelo/itemsOrdenModelo.php');
require_once($raiz.'/vehiculos/modelo/VehiculosModelo.php');
require_once($raiz.'/clientes/modelo/ClientesModelo.class.php');
require_once($raiz.'/facturacion_electronica/views/facturaElectronicaView.php');


class facturacionElectronicaController
{
    protected $odenMOdelo;
    protected $itemsOdenModelo;
    protected $vehiculosModelo;
    protected $clienteModelo;
    protected $view;

    public function __construct()
    {
        $this->odenMOdelo = new OrdenesModelo();
        $this->itemsOdenModelo = new itemsOrdenModelo();
        $this->vehiculosModelo = new VehiculosModelo();
        $this->clienteModelo = new ClientesModelo();
        $this->view = new facturaElectronicaView();
        
        if($_REQUEST['opcion']=='enviarInfoFacElectronica'){
            $this->enviarInfoFacElectronica($_REQUEST['idOrden']);
        }
        if($_REQUEST['opcion']=='preguntarANombredeQuien'){
            $this->preguntarANombredeQuien($_REQUEST['idOrden']);
        }
        if($_REQUEST['opcion']=='verifiqueTipoCLiente'){
            $this->verifiqueTipoCLiente($_REQUEST);
        }
        if($_REQUEST['opcion']=='actualizarClienteFacElectronica'){
            $this->actualizarClienteFacElectronica($_REQUEST);
        }
        if($_REQUEST['opcion']=='crearJsonFactura'){
            $this->crearJsonFactura($_REQUEST['idOrden']);
        }

    }

    public function actualizarClienteFacElectronica($request)
    {
        $this->clienteModelo->actualizarClienteFacElectronica($request);
        $infoCliente = $this->clienteModelo->traerDatosClienteIdNew($request['idCliente']); 
        $this->crearJsonInfoCliente($infoCliente,$request['idCliente']);
        
    }

    public function verifiqueTipoCLiente($request)
    {
        $idOrden = $request['idOrden']; 
        //    echo '<pre>';  
        // print_r($request);
        // echo '</pre>';
        // die(); 

        if($request['idTipoCLiente']==1)
        {
            // echo '222222222';
            $idCliente = '2454';
            $this->view->muestreInfoCliente($idCliente); 
        }
        if($request['idTipoCLiente']==2)
        {
            // echo 'muestre infocliente';
            $infoOrden = $this->odenMOdelo->traerInfoOrdenIdOrden($idOrden); 
            $datosVehiculo =  $this->vehiculosModelo->traerInfoCarroConPlaca($infoOrden['placa']);
            $infoCliente = $this->clienteModelo->traerDatosClienteIdNew($datosVehiculo[0]['propietario']); 
            
            $this->view->muestreInfoCliente($infoCliente['idcliente']); 
        }

    }
    
    public function preguntarANombredeQuien($idOrden)
    {
        $this->view->preguntarANombredeQuien($idOrden);
    }

    public function enviarInfoFacElectronica($idOrden)
    {
        $infoOrden = $this->odenMOdelo->traerInfoOrdenIdOrden($idOrden); 
        $datosVehiculo =  $this->vehiculosModelo->traerInfoCarroConPlaca($infoOrden['placa']);
        $infoCliente = $this->clienteModelo->traerDatosClienteIdNew($datosVehiculo[0]['propietario']); 
        $validarInfoCliente =  $this->validarInfoClienteFacElectronica($datosVehiculo[0]['propietario']);
        
        // echo '<pre>';  
        // print_r($infoCliente);
        // echo '</pre>';
        // die(); 
        $this->crearJsonInfoCliente($infoCliente,$datosVehiculo[0]['propietario']);
    }
    
    public function validarInfoClienteFacElectronica($idCliente)
    {
        //realiza las verificaciones de la informacion de cliente 
        $valida = 1;
          $infoCliente = $this->clienteModelo->traerDatosClienteIdNew($idCliente); 
          if($infoCliente['apellido']=='')
          {
            $valida = 0;
          }

          return $valida;
    } 

   
    public function crearJsonInfoCliente($request,$idCliente0)
    {
         //crearJsonPara consumir api de siigo    
         $obj = new stdClass(); 
         $city = new stdClass(); 
         $phones = new stdClass(); 
         $contacts = new stdClass(); 

         $obj->person_type = "Person";
         $obj->id_type="13";
         $obj->identification=$request['identi'];
         
         $nombreApellido[0]= $request['nombre']; 
         $nombreApellido[1]= $request['apellido']; 
         $obj->name = $nombreApellido; 
         
         $obj->address['address'] = $request['direccion'];
         
         $city->country_code = 'Co';
         $city->state_code = '11';
         $city->city_code = '11001';
         
         $obj->address['city'] = $city;
         
         $phones->number=  $request['celular'];
         $obj->phones= array($phones); 

         $contacts->first_name = $request['nombre'];
         $contacts->last_name = $request['apellido'];
         $contacts->email = $request['email'];

         $obj->contacts = array($contacts); 
        // die( json_encode($obj)); 

        $data =  json_encode($obj); 
        $this->consumirCrearClienteSiigo($data,$idCliente0);

    }

    public function consumirCrearClienteSiigo($jsonCliente,$idCliente0){
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.siigo.com/v1/customers',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $jsonCliente,
        CURLOPT_HTTPHEADER => array(
            'Partner-Id: Parqueaderos',
            'Content-Type: application/json',
            'Authorization: Bearer eyJhbGciOiJSUzI1NiIsImtpZCI6IjExNDQzRDg2OUYxMzgwODlEREUwOTdENTNBN0YxNzVCNkQwNzIxNzdSUzI1NiIsInR5cCI6ImF0K2p3dCIsIng1dCI6IkVVUTlocDhUZ0luZDRKZlZPbjhYVzIwSElYYyJ9.eyJuYmYiOjE3MjE0ODc4ODIsImV4cCI6MTcyNDA3OTg4MiwiaXNzIjoiaHR0cDovL21zLXNlY3VyaXR5OjUwMDAiLCJhdWQiOiJodHRwOi8vbXMtc2VjdXJpdHk6NTAwMC9yZXNvdXJjZXMiLCJjbGllbnRfaWQiOiJTaWlnb0FQSSIsInN1YiI6IjE3MzIxMzUiLCJhdXRoX3RpbWUiOjE3MjE0ODc4ODIsImlkcCI6ImxvY2FsIiwibmFtZSI6InNhbmRib3hAc2lpZ29hcGkuY29tIiwibWFpbF9zaWlnbyI6InNhbmRib3hAc2lpZ29hcGkuY29tIiwiY2xvdWRfdGVuYW50X2NvbXBhbnlfa2V5IjoiU2FuZGJveFNpaWdvQVBJIiwidXNlcnNfaWQiOiI2MiIsInRlbmFudF9pZCI6IjB4MDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDA3NzU1NjEiLCJ1c2VyX2xpY2Vuc2VfdHlwZSI6IjAiLCJwbGFuX3R5cGUiOiIxNCIsInRlbmFudF9zdGF0ZSI6IjEiLCJtdWx0aXRlbmFudF9pZCI6Ijk5MiIsImNvbXBhbmllcyI6IjAiLCJhcGlfc3Vic2NyaXB0aW9uX2tleSI6IjBmNmFmNmZiNDRmNDRiMTM4MDljMTZkZDkzM2JlNjJjIiwiYXBpX3VzZXJfY3JlYXRlZF9hdCI6IjE2ODI2MzUwOTgiLCJhY2NvdW50YW50IjoiZmFsc2UiLCJqdGkiOiJDNkMwRERGMUZCNDVEQTczNTI5NzJEOEFFREU1QTJFOCIsImlhdCI6MTcyMTQ4Nzg4Miwic2NvcGUiOlsiU2lpZ29BUEkiXSwiYW1yIjpbImN1c3RvbSJdfQ.qfqAb-mBA7flC7Rwsslf1ZCfEhv1ZYdG2T3aKr_f-QfoaNaq93Yc5y4MipSeilmUlkJqPnUpq6hZWXof9htBLV9aBBtCwdJfHKgerRN8qZBDfuin0McrRe7Nh5ZBBDh_dbdfquRzBysePeU6uQvvwJRBsj9AXP9V1gFz-5E_yZB0HP7K875K7mTM7hNnl2CjwJRRTurbefOPQN-1bI8oGGedK16wqAwlcfPjehvr6SOfp9qmQ4dKgXzQuptNfL2in3Uo1H8xOno8gS3DSipcICubWcM9IgVMWCtFA9WWiRSVbxuFNt_HV1-xkIy9F554rGb0gCGnyTBIIpGDA6eNLg'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
    
        $respuesta = json_decode($response); 
        
        // echo '<pre>'; print_r($respuesta->Errors[0]->Message); echo '</pre>';
        // echo '<pre>'; print_r($respuesta); echo '</pre>';

         if (isset($respuesta->Errors)){
                // echo '<br>Se presento un error en Siigo';
                echo '<br>Respuesta del servidor Siigo: '.$respuesta->Errors[0]->Message; 
            }
            if (isset($respuesta->id)){
                echo '<br>Se realizo la creacion del cliente en Siigo';
                echo '<br>id de creacion asignado por sistema siigo  : '.$respuesta->id;
                //actualizar este numero en la tabla de clientes 
                $this->actualizarIdSiigoCLiente($idCliente0,$respuesta->id);
                
            }
          


    }

  
    // public function actualizarIdSiigoCLiente($idCliente0,$idSiigo)
    // {
    //     $this->model->actualizarIdSiigoCLiente($idCliente0,$idSiigo);
    // }

    public function actualizarIdSiigoCLiente($idCliente0,$idSiigo)
    {
        $this->clienteModelo->actualizarIdSiigoCLiente($idCliente0,$idSiigo);
    }


    public function crearJsonFactura($idOrden)
    {   
        $infoOrden = $this->odenMOdelo->traerInfoOrdenIdOrden($idOrden); 
        $datosVehiculo =  $this->vehiculosModelo->traerInfoCarroConPlaca($infoOrden['placa']);
        $infoCliente = $this->clienteModelo->traerDatosClienteIdNew($datosVehiculo[0]['propietario']); 
        $sumaItems = $this->itemsOdenModelo->sumarItemsIdOrden($idOrden);

        // $infoParking =   $this->model->traerInfoParkingIdParking($idParking);
        // $infoRecibo =  $this->reciboDeCajaModel->traerReciboCajaId($infoParking['idReciboCaja']);
        // $infoCliente = $this->registroClienteModel->traerInfoClienteId($infoRecibo['idCliente']); 
    //     echo '<pre>'; 
    //    print_r($sumaItems);
    //    echo '</pre>';
    //    die();
        // $fechaRecibo = date("Y-m-d H:i:s");
        $valorIva = ($sumaItems * 19)/100;
        // die('valor iva '.$valorIva);
        $totalFactura = $sumaItems  + $valorIva; 
        // $fechaRecibo = date("Y-m-d", strtotime($infoOrden['fecha']));
        $fechapan =  time();
        $fechapan = date ( "Y-m-j" , $fechapan );
        $fechaRecibo = $fechapan;
        $idIvaImpuesto = 1270;
        $obj = new stdClass(); 
        $obj1 = new stdClass();
        $item = new stdClass();
        $tax = new stdClass();
        
        $tax->id=$idIvaImpuesto; 
        $obj1->id = '541';  //541 es de efectivo
        $obj1->value = $totalFactura; 
        $obj1->due_date = $fechaRecibo;
        
        $item->code = '121';  //este codigo lo tome de un ejemplo de un body  que me dejo crear la factura 
        $item->description = 'Servicio de parqueadero'; 
        $item->quantity = 1; 
        $item->taxes =array($tax);
        $item->price = $sumaItems; //precio sin iva
        //28102 pruebas factura parqueadero
        $obj->document['id'] = 28102; 
        $obj->date = $fechaRecibo; 
        $obj->customer['identification'] = $infoCliente['identi']; 
        $obj->seller = 806; //este valor lo tome de pruebas de cdrear factura en siigo me dejo pasar asi 
        $obj->items=array($item);
        $obj->stamp['send']='false'; 
        $obj->mail['send']='true'; 
        $obj->observations = 'Placa: '.$infoOrden['placa']; 
        $obj->payments = array($obj1);
        $data =json_encode($obj); 


        // echo $data;
        // die();

   


        $this->consumoCrearFactura($data,$infoOrden['id']);
    }

    
   function consumoCrearFactura($data,$idOrden='')
   {
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.siigo.com/v1/invoices',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $data,
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Partner-ID: TestNat',
            'Authorization: Bearer eyJhbGciOiJSUzI1NiIsImtpZCI6IjExNDQzRDg2OUYxMzgwODlEREUwOTdENTNBN0YxNzVCNkQwNzIxNzdSUzI1NiIsInR5cCI6ImF0K2p3dCIsIng1dCI6IkVVUTlocDhUZ0luZDRKZlZPbjhYVzIwSElYYyJ9.eyJuYmYiOjE3MjE0ODExMTcsImV4cCI6MTcyNDA3MzExNywiaXNzIjoiaHR0cDovL21zLXNlY3VyaXR5OjUwMDAiLCJhdWQiOiJodHRwOi8vbXMtc2VjdXJpdHk6NTAwMC9yZXNvdXJjZXMiLCJjbGllbnRfaWQiOiJTaWlnb0FQSSIsInN1YiI6IjE3MzIxMzUiLCJhdXRoX3RpbWUiOjE3MjE0ODExMTcsImlkcCI6ImxvY2FsIiwibmFtZSI6InNhbmRib3hAc2lpZ29hcGkuY29tIiwibWFpbF9zaWlnbyI6InNhbmRib3hAc2lpZ29hcGkuY29tIiwiY2xvdWRfdGVuYW50X2NvbXBhbnlfa2V5IjoiU2FuZGJveFNpaWdvQVBJIiwidXNlcnNfaWQiOiI2MiIsInRlbmFudF9pZCI6IjB4MDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDA3NzU1NjEiLCJ1c2VyX2xpY2Vuc2VfdHlwZSI6IjAiLCJwbGFuX3R5cGUiOiIxNCIsInRlbmFudF9zdGF0ZSI6IjEiLCJtdWx0aXRlbmFudF9pZCI6Ijk5MiIsImNvbXBhbmllcyI6IjAiLCJhcGlfc3Vic2NyaXB0aW9uX2tleSI6IjBmNmFmNmZiNDRmNDRiMTM4MDljMTZkZDkzM2JlNjJjIiwiYXBpX3VzZXJfY3JlYXRlZF9hdCI6IjE2ODI2MzUwOTgiLCJhY2NvdW50YW50IjoiZmFsc2UiLCJqdGkiOiJBRUNGM0JEQTk3MUM0MkVDOUM3NzE3NTY1RTZFNTkxOCIsImlhdCI6MTcyMTQ4MTExNywic2NvcGUiOlsiU2lpZ29BUEkiXSwiYW1yIjpbImN1c3RvbSJdfQ.YGaz_mLAOCp5H6smpy8oftBlzSpq3-B9ui21rOu1uFVXmId4g13igApAubTwOAkjKev5xe9MyYjgeshN3LBl3YMz1TtjAyTyKdhe5_jLCHCm-lGowK9SO4E4P58t5vvHNVnM-uCqx-qgTg5bwvOIS-Bsc13IZkAUflUnFlQH8dMwrViTFti3TaeIyGVdiSeSx9r8hwjGogOkHBrsMzd-_yaLFz_FgGgET24xLoiD1gZI9OcG06dCzmGLjEPvqIIhnL8HXZZwX_LzdyWIWBr05uEYpX5HRd3M5D7Krg250h6VmfllonsbO8KzH7C1z07utHxTgGi0WsMaWP0SzyR27A'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        
        $respuesta = json_decode($response); 
        //  echo $response;
        // echo '<pre>'; print_r($resp->public_url);
        // echo '</pre>';

        echo '<br><a href="'.$respuesta->public_url.'" target ="_blank">Verificar la factura en siigo nube</a>';

        if (isset($respuesta->Errors)){
            // echo '<br>Se presento un error en Siigo';
            echo '<br>Respuesta del servidor Siigo: '.$respuesta->Errors[0]->Message; 
        }
        if (isset($respuesta->id)){
                echo '<br>Se realizo la creacion del cliente en Siigo';
                echo '<br>id de creacion factura asignado por sistema siigo  : '.$respuesta->id;
                //actualizar este numero en la tabla de clientes 
                // $this->reciboDeCajaModel->actualizarIdFacturaSiigo($idReciboCaja,$respuesta->id);
                //aqui debo simular el cufe 
                $cufe = "7eb8c882cd62daffded44b7d08668d04383b579c86b5bf23dcb3d601a2347bac07a7e08ae2c3602787bfaf91691449a6";
                //
                $this->odenMOdelo->actualizarCufeIdsiigoOrden($idOrden,$cufe,$respuesta->id);
        }

   }

   public function consumoConsultarFactura()
   {
        $token = $this->consumoConsultarToken();
        echo '<br>'.$token;
        die();
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.siigo.com/v1/invoices/525dfd56-3463-4ef5-a1dc-82b5d8b45ee5',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Partner-Id: Parqueaderos',
            'Authorization: Bearer eyJhbGciOiJSUzI1NiIsImtpZCI6IjExNDQzRDg2OUYxMzgwODlEREUwOTdENTNBN0YxNzVCNkQwNzIxNzdSUzI1NiIsInR5cCI6ImF0K2p3dCIsIng1dCI6IkVVUTlocDhUZ0luZDRKZlZPbjhYVzIwSElYYyJ9.eyJuYmYiOjE3MjI4MTI5MzcsImV4cCI6MTcyNTQwNDkzNywiaXNzIjoiaHR0cDovL21zLXNlY3VyaXR5OjUwMDAiLCJhdWQiOiJodHRwOi8vbXMtc2VjdXJpdHk6NTAwMC9yZXNvdXJjZXMiLCJjbGllbnRfaWQiOiJTaWlnb0FQSSIsInN1YiI6IjE3MzIxMzUiLCJhdXRoX3RpbWUiOjE3MjI4MTI5MzcsImlkcCI6ImxvY2FsIiwibmFtZSI6InNhbmRib3hAc2lpZ29hcGkuY29tIiwibWFpbF9zaWlnbyI6InNhbmRib3hAc2lpZ29hcGkuY29tIiwiY2xvdWRfdGVuYW50X2NvbXBhbnlfa2V5IjoiU2FuZGJveFNpaWdvQVBJIiwidXNlcnNfaWQiOiI2MiIsInRlbmFudF9pZCI6IjB4MDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDA3NzU1NjEiLCJ1c2VyX2xpY2Vuc2VfdHlwZSI6IjAiLCJwbGFuX3R5cGUiOiIxNCIsInRlbmFudF9zdGF0ZSI6IjEiLCJtdWx0aXRlbmFudF9pZCI6Ijk5MiIsImNvbXBhbmllcyI6IjAiLCJhcGlfc3Vic2NyaXB0aW9uX2tleSI6IjBmNmFmNmZiNDRmNDRiMTM4MDljMTZkZDkzM2JlNjJjIiwiYXBpX3VzZXJfY3JlYXRlZF9hdCI6IjE2ODI2MzUwOTgiLCJhY2NvdW50YW50IjoiZmFsc2UiLCJqdGkiOiI1Mzg5QjBCRjFDQTQxQzZCNTY5MTcyMzQ1RDhEQUFBMiIsImlhdCI6MTcyMjgxMjkzNywic2NvcGUiOlsiU2lpZ29BUEkiXSwiYW1yIjpbImN1c3RvbSJdfQ.uqPeqZPaHRWwtFFHoEY2w3Ayr1VJkfDb54Km8xsNBZLpfFwhBBl9sQ33Bsq6orXeYfkyFS2_P2wl2NJKaX_YV_D6b8RWC3e-PXg19lkUwTf9bv3zM-bqcNr9hHUbbj9xOXCp0B5Ag7gObL5NM0vlwy7_23t-IUdPC9MXBF2XltcuUoY8_v-zxLYpFTp5cGwZQHpa2D_RHCJcECJCg92RD0Ieezt_YGU5IhC9hXsgRqT7DQjVhTAq6ry605hAkOwLUYbilyKXy2nNfwju_qa_9GcWoH77H5N4jFjP6NkI5DbaYnmavrb94dvQ7u4Wud66Nf9sFh04B7TX7hAL9nRuag'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;


   }


   public function consumoConsultarToken()
   {
    $curl = curl_init();
    
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://api.siigo.com/auth',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS =>'{
        "username": "sandbox@siigoapi.com",
        "access_key": "NDllMzI0NmEtNjExZC00NGM3LWE3OTQtMWUyNTNlZWU0ZTM0OkosU2MwLD4xQ08="
    }',
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json'
      ),
    ));
    
    $response = curl_exec($curl);
    $respuesta = json_decode($response); 
    curl_close($curl);
    // echo $response;
    return $respuesta->access_token;
    
   }

}


