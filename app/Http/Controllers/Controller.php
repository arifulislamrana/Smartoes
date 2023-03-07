<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    // test function to format Geo json Data

    // public function test()
    // {
    //     $data = array();
    //     $json = json_decode(file_get_contents('geoLocationData.json'), true);

    //     foreach ($json as $code)
    //     {
    //         if (isset($code["en"]))
    //         {
    //             $divisionName = $code["en"]["division"];
    //             $districtName = $code["en"]["district"];
    //             $thanaName = $code["en"]["thana"];
    //             $postcode = $code["en"]["postcode"];

    //             if (array_key_exists($divisionName, $data))
    //             {
    //                 if (array_key_exists($districtName, $data[$divisionName]))
    //                 {
    //                     if (array_key_exists($thanaName, $data[$divisionName][$districtName]))
    //                     {
    //                         array_push($data[$divisionName][$districtName][$thanaName], $postcode);

    //                     } else
    //                     {
    //                         $data[$divisionName][$districtName][$thanaName] = [];
    //                         array_push($data[$divisionName][$districtName][$thanaName], $postcode);
    //                     }

    //                 } else
    //                 {
    //                     $data[$divisionName][$districtName] = array();

    //                     if (array_key_exists($thanaName, $data[$divisionName][$districtName]))
    //                     {
    //                         array_push($data[$divisionName][$districtName][$thanaName], $postcode);

    //                     } else
    //                     {
    //                         $data[$divisionName][$districtName][$thanaName] = [];
    //                         array_push($data[$divisionName][$districtName][$thanaName], $postcode);
    //                     }
    //                 }

    //             }
    //             else
    //             {
    //                 $data[$divisionName] = array();
    //                 if (array_key_exists($districtName, $data[$divisionName]))
    //                 {
    //                     if (array_key_exists($thanaName, $data[$divisionName][$districtName]))
    //                     {
    //                         array_push($data[$divisionName][$districtName][$thanaName], $postcode);

    //                     } else
    //                     {
    //                         $data[$divisionName][$districtName][$thanaName] = [];
    //                         array_push($data[$divisionName][$districtName][$thanaName], $postcode);
    //                     }

    //                 } else
    //                 {
    //                     $data[$divisionName][$districtName] = array();

    //                     if (array_key_exists($thanaName, $data[$divisionName][$districtName]))
    //                     {
    //                         array_push($data[$divisionName][$districtName][$thanaName], $postcode);

    //                     } else
    //                     {
    //                         $data[$divisionName][$districtName][$thanaName] = [];
    //                         array_push($data[$divisionName][$districtName][$thanaName], $postcode);
    //                     }
    //                 }
    //             }
    //         }

    //     }
    //     // Write in the file
    //     //$fp = fopen('test.json', 'w');
    //     //fwrite($fp, $jsonString);
    //     //fclose($fp);

    // }
}
