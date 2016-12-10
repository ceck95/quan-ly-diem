<?php
// @Author: Tran Van Nhut <nhutdev>
// @Date:   2016-11-29T11:45:22+07:00
// @Email:  tranvannhut4495@gmail.com
# @Last modified by:   nhutdev
# @Last modified time: 2016-11-29T11:47:54+07:00

namespace common\utilities;

use yii;

class Common
{
    public static function yesAndNo($k = false)
    {
        $d = [
            0 => Yii::t('app', 'No'),
            1 => Yii::t('app', 'Yes'),
        ];
        if ($k === false || !isset($d[$k])) {
            return $d;
        }

        return $d[$k];
    }

    public static function getGenders($k = false)
    {
        $d = [
            'male' => Yii::t('app', 'Male'),
            'female' => Yii::t('app', 'Female'),
        ];
        if ($k === false || !isset($d[$k])) {
            return $d;
        }

        return $d[$k];
    }

    public static $countries = [
        3 => 'Albania',
        4 => 'Algeria',
        5 => 'American Samoa',
        6 => 'Andorra',
        7 => 'Angola',
        8 => 'Anguilla',
        9 => 'Antarctica',
        10 => 'Antigua and Barbuda',
        11 => 'Argentina',
        12 => 'Armenia',
        13 => 'Aruba',
        14 => 'Australia',
        15 => 'Austria',
        16 => 'Azerbaijan',
        17 => 'Bahamas',
        18 => 'Bahrain',
        19 => 'Bangladesh',
        20 => 'Barbados',
        21 => 'Belarus',
        22 => 'Belgium',
        23 => 'Belize',
        24 => 'Benin',
        25 => 'Bermuda',
        26 => 'Bhutan',
        27 => 'Bolivia',
        28 => 'Bosnia and Herzegovina',
        29 => 'Botswana',
        30 => 'Bouvet Island',
        31 => 'Brazil',
        32 => 'British Indian Ocean Territory',
        239 => 'British Virgin Islands',
        33 => 'Brunei Darussalam',
        34 => 'Bulgaria',
        35 => 'Burkina Faso',
        36 => 'Burundi',
        37 => 'Cambodia',
        38 => 'Cameroon',
        39 => 'Canada',
        40 => 'Cape Verde',
        41 => 'Cayman Islands',
        42 => 'Central African Republic',
        43 => 'Chad',
        44 => 'Chile',
        45 => 'China',
        46 => 'Christmas Island',
        47 => 'Cocos (Keeling Islands)',
        48 => 'Colombia',
        49 => 'Comoros',
        50 => 'Congo',
        51 => 'Cook Islands',
        52 => 'Costa Rica',
        53 => "Cote D'Ivoire (Ivory Coast)",
        54 => 'Croatia (Hrvatska)',
        55 => 'Cuba',
        56 => 'Cyprus',
        57 => 'Czech Republic',
        58 => 'Denmark',
        59 => 'Djibouti',
        60 => 'Dominica',
        61 => 'Dominican Republic',
        62 => 'East Timor',
        63 => 'Ecuador',
        64 => 'Egypt',
        65 => 'El Salvador',
        66 => 'Equatorial Guinea',
        67 => 'Eritrea',
        68 => 'Estonia',
        69 => 'Ethiopia',
        70 => 'Falkland Islands (Malvinas)',
        71 => 'Faroe Islands',
        72 => 'Fiji',
        73 => 'Finland',
        74 => 'France',
        75 => 'France, Metropolitan',
        76 => 'French Guiana',
        77 => 'French Polynesia',
        78 => 'French Southern Territories',
        79 => 'Gabon',
        80 => 'Gambia',
        81 => 'Georgia',
        82 => 'Germany',
        83 => 'Ghana',
        84 => 'Gibraltar',
        85 => 'Greece',
        86 => 'Grenada',
        87 => 'Guadeloupe',
        88 => 'Guam',
        89 => 'Guatemala',
        90 => 'Guinea',
        91 => 'Guinea-Bissau',
        92 => 'Guyana',
        93 => 'Haiti',
        94 => 'Heard and McDonald Islands',
        95 => 'Honduras',
        96 => 'Hong Kong',
        97 => 'Hungary',
        98 => 'Iceland',
        99 => 'India',
        100 => 'Indonesia',
        101 => 'Iran',
        102 => 'Iraq',
        103 => 'Ireland',
        104 => 'Israel',
        105 => 'Italy',
        106 => 'Jamaica',
        107 => 'Japan',
        108 => 'Jordan',
        109 => 'Kazakhstan',
        110 => 'Kenya',
        111 => 'Kiribati',
        112 => 'Korea (North)',
        113 => 'Korea (South)',
        114 => 'Kuwait',
        115 => 'Kyrgyzstan',
        116 => 'Laos',
        117 => 'Latvia',
        118 => 'Lebanon',
        119 => 'Lesotho',
        120 => 'Liberia',
        121 => 'Libya',
        122 => 'Liechtenstein',
        123 => 'Lithuania',
        124 => 'Luxembourg',
        125 => 'Macau',
        126 => 'Macedonia',
        127 => 'Madagascar',
        128 => 'Malawi',
        129 => 'Malaysia',
        130 => 'Maldives',
        131 => 'Mali',
        132 => 'Malta',
        133 => 'Marshall Islands',
        134 => 'Martinique',
        135 => 'Mauritania',
        136 => 'Mauritius',
        137 => 'Mayotte',
        138 => 'Mexico',
        139 => 'Micronesia',
        140 => 'Moldova',
        141 => 'Monaco',
        142 => 'Mongolia',
        143 => 'Montserrat',
        144 => 'Morocco',
        145 => 'Mozambique',
        146 => 'Myanmar',
        147 => 'Namibia',
        148 => 'Nauru',
        149 => 'Nepal',
        150 => 'Netherlands',
        151 => 'Netherlands Antilles',
        152 => 'New Caledonia',
        153 => 'New Zealand',
        154 => 'Nicaragua',
        155 => 'Niger',
        156 => 'Nigeria',
        157 => 'Niue',
        158 => 'Norfolk Island',
        159 => 'Northern Mariana Islands',
        160 => 'Norway',
        161 => 'Oman',
        162 => 'Pakistan',
        163 => 'Palau',
        164 => 'Panama',
        165 => 'Papua New Guinea',
        166 => 'Paraguay',
        167 => 'Peru',
        168 => 'Philippines',
        169 => 'Pitcairn',
        170 => 'Poland',
        171 => 'Portugal',
        172 => 'Puerto Rico',
        173 => 'Qatar',
        174 => 'Reunion',
        175 => 'Romania',
        176 => 'Russian Federation',
        177 => 'Rwanda',
        194 => 'S. Georgia and S. Sandwich Isls.',
        178 => 'Saint Kitts and Nevis',
        179 => 'Saint Lucia',
        180 => 'Saint Vincent and The Grenadines',
        181 => 'Samoa',
        182 => 'San Marino',
        183 => 'Sao Tome and Principe',
        184 => 'Saudi Arabia',
        185 => 'Senegal',
        186 => 'Seychelles',
        187 => 'Sierra Leone',
        188 => 'Singapore',
        189 => 'Slovak Republic',
        190 => 'Slovenia',
        191 => 'Solomon Islands',
        192 => 'Somalia',
        193 => 'South Africa',
        195 => 'Spain',
        196 => 'Sri Lanka',
        197 => 'St. Helena',
        198 => 'St. Pierre and Miquelon',
        199 => 'Sudan',
        200 => 'Suriname',
        201 => 'Svalbard and Jan Mayen Islands',
        202 => 'Swaziland',
        203 => 'Sweden',
        204 => 'Switzerland',
        205 => 'Syria',
        206 => 'Taiwan',
        207 => 'Tajikistan',
        208 => 'Tanzania',
        209 => 'Thailand',
        210 => 'Togo',
        211 => 'Tokelau',
        212 => 'Tonga',
        213 => 'Trinidad and Tobago',
        214 => 'Tunisia',
        215 => 'Turkey',
        216 => 'Turkmenistan',
        217 => 'Turks and Caicos Islands',
        218 => 'Tuvalu',
        219 => 'Uganda',
        220 => 'Ukraine',
        221 => 'United Arab Emirates',
        222 => 'United Kingdom',
        1 => 'United States',
        224 => 'Uruguay',
        223 => 'US Minor Outlying Islands',
        225 => 'Uzbekistan',
        226 => 'Vanuatu',
        227 => 'Vatican City State',
        228 => 'Venezuela',
        229 => 'Viet Nam',
        230 => 'Virgin Islands (British)',
        231 => 'Virgin Islands (US)',
        232 => 'Wallis and Futuna Islands',
        233 => 'Western Sahara',
        234 => 'Yemen',
        235 => 'Yugoslavia',
        236 => 'Zaire',
        237 => 'Zambia',
        238 => 'Zimbabwe',
    ];

    /**
     * @param $text string(json)
     * @param array $newData
     *
     * @return string
     */
    public static function mergeJson($text, $newData = [])
    {
        $d = json_decode($text, true);
        if (empty($d)) {
            $d = [];
        }
        $time = date('y_m_d_h_i_s', time());
        $d[$time] = $newData;

        return json_encode($d);
    }

    public static function jsonToDebug($jsonText = '')
    {
        $arr = json_decode($jsonText, true);
        $html = '';
        if ($arr && is_array($arr)) {
            $html .= self::_arrayToHtmlTableRecursive($arr);
        }

        return $html;
    }

    private static function _arrayToHtmlTableRecursive($arr)
    {
        $str = '<table><tbody>';
        foreach ($arr as $key => $val) {
            $str .= '<tr>';
            $str .= "<td>$key</td>";
            $str .= '<td>';
            if (is_array($val)) {
                if (!empty($val)) {
                    $str .= self::_arrayToHtmlTableRecursive($val);
                }
            } else {
                $str .= "<strong>$val</strong>";
            }
            $str .= '</td></tr>';
        }
        $str .= '</tbody></table>';

        return $str;
    }

    public function toPgArray($set)
    {
        settype($set, 'array'); // can be called with a scalar or array
        $result = array();
        foreach ($set as $t) {
            if (is_array($t)) {
                $result[] = to_pg_array($t);
            } else {
                $t = str_replace('"', '\\"', $t); // escape double quote
            if (!is_numeric($t)) { // quote only non-numeric values
                $t = '"'.$t.'"';
            }
                $result[] = $t;
            }
        }

        return '{'.implode(',', $result).'}'; // format
    }

    public static function boolToText($k)
    {
        return $k ? Yii::t('app', 'Yes') : Yii::t('app', 'No');
    }

    /**
     * strip vietnamese charaters.
     *
     * @param $strInput
     * @param string     $replaceSpace
     * @param string     $code
     * @param bool|false $stripSpace
     *
     * @return string $stripped_str: string after strip
     */
    public static function stripViet($strInput, $replaceSpace = '', $code = 'utf-8', $stripSpace = false)
    {
        $stripped_str = $strInput;
        $vietU = array();
        $vietL = array();

        if (strtolower($code) == 'utf-8') {
            $i = 0;
            $vietU[$i++] = array(
                'A',
                array(
                    '/Á/',
                    '/À/',
                    '/Ả/',
                    '/Ã/',
                    '/Ạ/',
                    '/Ă/',
                    '/Ắ/',
                    '/Ằ/',
                    '/Ẳ/',
                    '/Ẵ/',
                    '/Ặ/',
                    '/Â/',
                    '/Ấ/',
                    '/Ầ/',
                    '/Ẩ/',
                    '/Ẫ/',
                    '/Ậ/',
                ),
            );
            $vietU[$i++] = array(
                'O',
                array(
                    '/Ó/',
                    '/Ò/',
                    '/Ỏ/',
                    '/Õ/',
                    '/Ọ/',
                    '/Ô/',
                    '/Ố/',
                    '/Ồ/',
                    '/Ổ/',
                    '/Ộ/',
                    '/Ơ/',
                    '/Ớ/',
                    '/Ờ/',
                    '/Ớ/',
                    '/Ở/',
                    '/Ỡ/',
                    '/Ợ/',
                ),
            );
            $vietU[$i++] = array(
                'E',
                array('/É/', '/È/', '/Ẻ/', '/Ẽ/', '/Ẹ/', '/Ê/', '/Ế/', '/Ề/', '/Ể/', '/Ễ/', '/Ệ/'),
            );
            $vietU[$i++] = array(
                'U',
                array('/Ú/', '/Ù/', '/Ủ/', '/Ũ/', '/Ụ/', '/Ư/', '/Ứ/', '/Ừ/', '/Ử/', '/Ữ/', '/Ự/'),
            );
            $vietU[$i++] = array('I', array('/Í/', '/Ì/', '/Ỉ/', '/Ĩ/', '/Ị/'));
            $vietU[$i++] = array('Y', array('/Ý/', '/Ỳ/', '/Ỷ/', '/Ỹ/', '/Ỵ/'));
            $vietU[$i++] = array('D', array('/Đ/'));
            unset($i);
            $i = 0;
            $vietL[$i++] = array(
                'a',
                array(
                    '/á/',
                    '/à/',
                    '/ả/',
                    '/ã/',
                    '/ạ/',
                    '/ă/',
                    '/ắ/',
                    '/ằ/',
                    '/ẳ/',
                    '/ẵ/',
                    '/ặ/',
                    '/â/',
                    '/ấ/',
                    '/ầ/',
                    '/ẩ/',
                    '/ẫ/',
                    '/ậ/',
                ),
            );
            $vietL[$i++] = array(
                'o',
                array(
                    '/ó/',
                    '/ò/',
                    '/ỏ/',
                    '/õ/',
                    '/ọ/',
                    '/ô/',
                    '/ố/',
                    '/ồ/',
                    '/ổ/',
                    '/ỗ/',
                    '/ộ/',
                    '/ơ/',
                    '/ớ/',
                    '/ờ/',
                    '/ở/',
                    '/ỡ/',
                    '/ợ/',
                ),
            );
            $vietL[$i++] = array(
                'e',
                array('/é/', '/è/', '/ẻ/', '/ẽ/', '/ẹ/', '/ê/', '/ế/', '/ề/', '/ể/', '/ễ/', '/ệ/'),
            );
            $vietL[$i++] = array(
                'u',
                array('/ú/', '/ù/', '/ủ/', '/ũ/', '/ụ/', '/ư/', '/ứ/', '/ừ/', '/ử/', '/ữ/', '/ự/'),
            );
            $vietL[$i++] = array('i', array('/í/', '/ì/', '/ỉ/', '/ĩ/', '/ị/'));
            $vietL[$i++] = array('y', array('/ý/', '/ỳ/', '/ỷ/', '/ỹ/', '/ỵ/'));
            $vietL[$i++] = array('d', array('/đ/'));
            unset($i);
        }
        for ($i = 0; $i < count($vietL); ++$i) {
            $stripped_str = preg_replace($vietL[$i][1], $vietL[$i][0], $stripped_str);
            $stripped_str = preg_replace($vietU[$i][1], $vietU[$i][0], $stripped_str);
        }
        if ($stripSpace) {
            $stripped_str = str_replace(' ', '', $stripped_str);
        }
        if ($replaceSpace) {
            return $stripped_str = preg_replace(array('[^[^a-zA-Z0-9]+|[^a-zA-Z0-9]+$]', '[[^a-zA-Z0-9\-]+]'), array(
                '',
                $replaceSpace,
            ), $stripped_str);
        }

        return $stripped_str;
    }

    public static function buildQueryString($params = array(), $reset = false)
    {
        $ret = '';
        if (is_array($params)) {
            if ($reset) {
                $ret = http_build_query($params);
            } else {
                $query_data = array();
                parse_str($_SERVER['QUERY_STRING'], $query_data);
                foreach ($params as $pKey => $pVal) {
                    unset($query_data[$pKey]);
                }
                foreach ($params as $pKey => $pVal) {
                    if ($pVal !== null) {
                        $query_data[$pKey] = $pVal;
                    }
                }
                $ret = http_build_query($query_data);
            }
        }
        if ($ret) {
            $ret = '?'.$ret;
        }

        return $ret;
    }

    /**
     * @param int $status
     *
     * @return string $strStatus: Status after parse to string
     */
    public static function getStrStatus($status)
    {
        $strStatus = '';
        switch ($status) {
            case STATUS_ACTIVE:
                $strStatus = Yii::t('app', 'Active');
                break;
            case STATUS_HIDE:
                $strStatus = Yii::t('app', 'Hide');
                break;
            case STATUS_DELETED:
                $strStatus = Yii::t('app', 'Deleted');
                break;
        }

        return $strStatus;
    }

    public static function renderIconSlideNav($urlArray)
    {
        $result = '<i class="cp-icn-caret-down icn-right"></i>';
        if (isset($urlArray['iconRight'])) {
            return $urlArray['iconRight'];
        }
        if (isset($urlArray['icon2Line'])) {
            return $urlArray['icon2Line'];
        }

        return $result;
    }

    public static function getStatusArr()
    {
        $statusArr = [
            STATUS_ACTIVE => Yii::t('app', 'Active'),
            STATUS_HIDE => Yii::t('app', 'Hide'),
        ];

        return $statusArr;
    }

    public static function getGenderArr()
    {
        $statusArr = [
            'Nam' => Yii::t('app', 'Nam'),
            'Nữ' => Yii::t('app', 'Nữ'),
        ];

        return $statusArr;
    }

    public static function getRatingArr()
    {
        $ratingArr = [
            '1' => Yii::t('app', '1'),
            '2' => Yii::t('app', '2'),
            '3' => Yii::t('app', '3'),
        ];

        return $ratingArr;
    }

    /**
     * using form redirect.
     *
     * @param $targetURL
     * @param array $dataArray
     */
    public static function redirectByForm($targetURL, $dataArray = array())
    {
        echo '<html><body onload="document.forms[0].submit()">';
        echo '<form id="_form" method="POST" action="'.htmlentities($targetURL).'">';
        self::writeHiddenFormFields($dataArray);
        echo '</form>';
        echo '</body></html>';
        exit;
    }

    public static function writeHiddenFormFields($dataArray)
    {
        if (is_array($dataArray) && !empty($dataArray)) {
            foreach ($dataArray as $name => $value) {
                if (is_array($value)) {
                    foreach ($value as $k => $v) {
                        $tmpId = $name.'_'.$k;
                        $tmpName = $name.'['.$k.']';
                        echo '<input type="hidden" name="'.htmlentities($tmpName).'" id="'.htmlentities($tmpId).'" value="'.htmlentities($v).'" />'.'';
                    }
                } else {
                    echo '<input type="hidden" name="'.htmlentities($name).'" id="'.htmlentities($name).'" value="'.htmlentities($value).'" />'.'';
                }
            }
        }
    }

    public static function getClassName($fullClassName)
    {
        $ret = '';
        if ($fullClassName) {
            $tmpArr = explode('\\', $fullClassName);
            $ret = end($tmpArr);
        }

        return $ret;
    }

    public static function getPostData($url, $params = array())
    {
        try {
            $paramQuery = http_build_query($params);
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_POST, count($params));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $paramQuery);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $content = curl_exec($ch);
            if (curl_errno($ch)) {
                echo "\nURL: ".$url.' Error is : '.curl_error($ch)."\n";
            }
            curl_close($ch);

            return $content;
        } catch (\Exception $e) {
            return false;
        }
    }

    public static function getPostDataXml($url, $xmlParam)
    {
        try {
            $header = array(
                'Content-type: text/xml',
                'Content-length: '.strlen($xmlParam),
                'Connection: close',
            );
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_TIMEOUT, 100);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $xmlParam);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
            curl_setopt($ch, CURLOPT_CAINFO, null);
            $content = curl_exec($ch);
            if (curl_errno($ch)) {
                return false;
            }
            curl_close($ch);
            if ($content) {
                $content = html_entity_decode($content);
                $content = simplexml_load_string($content);
            }

            return $content;
        } catch (\Exception $e) {
            return false;
        }
    }

    public static function vnNumberFormat($number, $decimal = 2)
    {
        $number = floatval($number);

        return number_format($number, $decimal, '.', ',');
    }

    public static function vnNumberFormatSuffix($number, $decimal = 2, $suffix = '')
    {
        $number = floatval($number);

        return number_format($number, $decimal, ',', '.').' '.$suffix;
    }

    public static function unsetAutoFields(&$data, $moreFields = [])
    {
        unset($data['status']);
        unset($data['created_by']);
        unset($data['updated_by']);
        unset($data['updated_at']);
        if ($moreFields) {
            foreach ($moreFields as $f) {
                unset($data[$f]);
            }
        }
    }

    public static function getTempFolder()
    {
        return ini_get('upload_tmp_dir') ?: sys_get_temp_dir();
    }
}
