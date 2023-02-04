<?php
class IdoBooking_API extends IdoBooking
{

    private function get_amenities($objectId)
    {
        $address = 'https://client' . $this->client->systemClient . '.idosell.com/api/objects/getAmenities/24/json';
        $request = array();
        $request['authenticate'] = array();
        $request['authenticate']['systemKey'] = $this->get_key();
        $request['authenticate']['systemLogin'] = $this->client->systemLogin;
        $request['authenticate']['lang'] = $this->language;
        $request['paramsSearch'] = array();
        $request['objectId'] = $objectId;
        $request['paramsSearch']['language'] = $this->language;

        // Returns Ido Apartament Amenities
        return $this->send_request($address, json_encode($request))->objectAmenities;
    }

    private function get_media($objectId)
    {
        $address = 'https://client' . $this->client->systemClient . '.idosell.com/api/objects/getMedia/24/json';

        $request = array();
        $request['authenticate'] = array();
        $request['authenticate']['systemKey'] = $this->get_key();
        $request['authenticate']['systemLogin'] = $this->client->systemLogin;
        $request['authenticate']['lang'] = $this->language;
        $request['objectId'] = $objectId;

        //Returns Ido Apartament Media
        return $this->send_request($address, json_encode($request))->objectMedia;
    }

    private function send_request($address, $request)
    {
        $headers = array(
            'Accept: application/json',
            'Content-Type: application/json;charset=UTF-8'
        );

        $curl = curl_init($address);

        curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, true);
        curl_setopt($curl, CURLOPT_FORBID_REUSE, 1);
        curl_setopt($curl, CURLINFO_HEADER_OUT, 1);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $request);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $response = json_decode(curl_exec($curl));

        curl_close($curl);

        return $response->result;
    }
}
