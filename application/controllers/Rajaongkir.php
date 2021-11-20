
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rajaongkir extends CI_Controller
{
    private $api_key = '84cb369cb1585a6aa4824963bb0dd661';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_admin');
    }

    public function Province()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key:$this->api_key"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            // echo $response;
            $array_response = json_decode($response, true);
            //     echo '<pre>';
            //     print_r($array_response['rajaongkir']['results']);
            //     echo '</pre>';
            $data_province = $array_response['rajaongkir']['results'];
            echo  "<option value=''>--choose province--</option>";
            foreach ($data_province as $key => $value) {
                echo "<option value='" . $value['province'] . "'id_province='" .
                    $value['province_id'] . "' >" . $value['province'] . "</option>";
            }
        }
    }


    public function city()
    {
        $data_province = $this->input->post('id_province');
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=" .  $data_province,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key:{$this->api_key}"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $array_response = json_decode($response, true);
            $data_city = $array_response['rajaongkir']['results'];
            echo "<option value=''>--Choose City--</option>";
            foreach ($data_city as $key => $value) {
                echo "<option value='" . $value['city_id'] . "' id_city='" . $value['city_id'] . "'>" . $value['city_name'] . "</option>";
            }
        }
    }
    public function expedition()
    {
        echo '<option value"">--Choose Expedition-- </option>';
        echo '<option value="jne">JNE</option>';
        echo '<option value="tiki">TIKI</option>';
        echo '<option value="pos"> POS INDO</option>';
    }


    public function package()
    {
        $id_city_asal = $this->m_admin->data_setting()->location;
        $expedition = $this->input->post('expedition');
        $city_id = $this->input->post('id_city');
        $weight = $this->input->post('weight');

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=" . $id_city_asal . "&destination=" . $city_id . "&weight=" . $weight . "&courier=" . $expedition,
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key:{$this->api_key}"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            // echo $response;
            $array_response = json_decode($response, true);
            // echo '<pre>';
            // print_r($array_response['rajaongkir']['results'][0]['costs']);
            // echo '</pre>';
            $data_package = $array_response['rajaongkir']['results'][0]['costs'];
            echo "<option value=''>--Choose Package--</option>";
            foreach ($data_package as $key => $value) {
                echo "<option value='" . $value['service'] . "'ongkir='" . $value['cost'][0]['value'] . "' estimasi='" .
                    $value['cost'][0]['etd'] . " Day'>";
                echo $value['service'] . "| Rp." . $value['cost'][0]['value'] . " | " .  $value['cost'][0]['etd'] . "Day";

                echo "</option>";
            }
        }
    }

    
}
