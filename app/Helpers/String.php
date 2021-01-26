<?php


if (!function_exists('classActivePath')) {
    function classActivePath($segment, $value)
    {
        if(!is_array($value)) {
            return Request::segment($segment) == $value ? ' menu-open' : '';
        }
        foreach ($value as $v) {
            if(Request::segment($segment) == $v) return ' menu-open';
        }
        return '';
    }
}

if (!function_exists('classActiveSegment')) {
    function classActiveSegment($segment, $value)
    {
        if(!is_array($value)) {
            return Request::segment($segment) == $value ? 'active' : '';
        }
        foreach ($value as $v) {
            if(Request::segment($segment) == $v) return 'active';
        }
        return '';
    }
}

/**
 * Application helpers.
 *
 * @version   1.0.0
 * @author    Gustavo Straube <gustavo@kettle.io>
 * @copyright Kettle, LLC
 */

if (!function_exists('url_thumbor')) {

    /**
     * Format a phone number applying a mask.
     *
     * @param  string $phone The phone number. Only digits.
     * @return string The formatted phone.
     */
    function url_thumbor($width, $heigth, $url)
    {   
        $thumbor = env('THUMBOR_URL', 'https://thumbor-img.autoconf.com.br/');
        
        return $thumbor . 'unsafe/'. $width .'x'. $heigth .'/'.$url;
    }
}

if (!function_exists('phone_mask')) {

    /**
     * Format a phone number applying a mask.
     *
     * @param  string $phone The phone number. Only digits.
     * @return string The formatted phone.
     */
    function phone_mask($phone)
    {
        $size = strlen(preg_replace("/[^0-9]/", "", $phone));
        if ($size == 11) { // COM CÓDIGO DE ÁREA NACIONAL e 9 dígitos
            return "(" . substr($phone, 0, 2) . ")". substr($phone, 2, 5) . "-" . substr($phone, 7, 11);
        }
        if ($size == 10) { // COM CÓDIGO DE ÁREA NACIONAL e 8 dígitos
            return "(" . substr($phone, 0, 2) . ")" . substr($phone, 2, 4) . "-" . substr($phone, 6, 10);
        }
        return $phone;
    }   
}


if (!function_exists('date_mask')) {

    /**
     * Format a phone number applying a mask.
     *
     * @param  string $phone The phone number. Only digits.
     * @return string The formatted phone.
     */
    function date_mask($date)
    {
        return Carbon\Carbon::parse($date)->format('d/m/Y');
    }
}

if (!function_exists('datehour_mask')) {

    /**
     * Format a phone number applying a mask.
     *
     * @param  string $phone The phone number. Only digits.
     * @return string The formatted phone.
     */
    function datehour_mask($date)
    {
        return Carbon\Carbon::parse($date)->format('d/m/Y H:i');
    }
}

if (!function_exists('money_mask')) {

    /**
     * Format a phone number applying a mask.
     *
     * @param  string $phone The phone number. Only digits.
     * @return string The formatted phone.
     */
    function money_mask($amount)
    {
        return ( number_format($amount, 2, ',', '') !== null ? number_format($amount, 2, ',', '.') : '');
    }
}

if (!function_exists('money_to_decimal')) {

    /**
     * Cast money to decimal.
     *
     * @param  string $amount.
     * @return string The formatted phone.
     */
    function money_to_decimal($amount)
    {
        $money = str_replace('.', '', $amount);
        $money = str_replace(',', '.', $money);
        return (double) number_format($money, 2, '.', '');
    }
}

if (!function_exists('pontuacao')) {
    /**
     * Calcula total de pontos acumulados pela avaliação dos itens
     * 
     * @param numeric $pontos
     * @return number
     */
    function pontuacao($pontuacao = 0, $pontuacaoMaxima = 100) {
        if ($pontuacaoMaxima > 0) {
            $pontos = $pontuacao*100/$pontuacaoMaxima;
            $pontos = ($pontos > 100) ? 100 : $pontos;
            return number_format($pontos, 1, '.', '');
        }
        return 0;
        
    }
}


if (!function_exists('cnpj_mask')) {

    /**
     * Format a phone number applying a mask.
     *
     * @param  string $phone The phone number. Only digits.
     * @return string The formatted phone.
     */
    function cnpj_mask($cnpj)
    {
        $size = strlen(preg_replace("/[^0-9]/", "", $cnpj));
        if($size == 14){
            return vsprintf("%s%s.%s%s%s.%s%s%s/%s%s%s%s-%s%s", str_split($cnpj));
        }
        return $cnpj;
    }
}

if (!function_exists('cpf_mask')) {

    /**
     * Format a document number applying a mask.
     *
     * @param  string $cpf The cpf number. Only digits.
     * @return string The formatted cpf.
     */
    function cpf_mask($cpf)
    {
        $size = strlen(preg_replace("/[^0-9]/", "", $cpf));
        if($size == 11){
            return vsprintf("%s%s%s.%s%s%s.%s%s%s-%s%s", str_split($cpf));
        }
        return $cpf;
    }
}

if (!function_exists('placa_mask')) {

    /**
     * Format a placa applying a mask.
     *
     * @param  string $value The placa string.
     * @return string The formatted phone.
     */
    function placa_mask($value)
    {
        $size = strlen(preg_replace("/[^a-zA-Z0-9]+/", "", $value));
        if ($size == 7) {
            return strtoupper(vsprintf("%s%s%s-%s%s%s%s", str_split($value)));
        }
        return $value;
    }
}

if (!function_exists('cep_mask')) {

    /**
     * Format a phone number applying a mask.
     *
     * @param  string $phone The phone number. Only digits.
     * @return string The formatted phone.
     */
    function cep_mask($cep)
    {
        $size = strlen(preg_replace("/[^0-9]/", "", $cep));
        if ($size == 8) {
            return vsprintf("%s%s.%s%s%s-%s%s%s", str_split($cep));
        }
        return $cep;
    }
}

if (!function_exists('consumo_mask')) {

    /**
     * Format a fuel applying a mask.
     *
     * @param  string $phone The phone number. Only digits.
     * @return string The formatted phone.
     */
    function consumo_mask($value)
    {
        return vsprintf("%s km/l", $value);
    }
}


if (!function_exists('mask_potencia')) {

    /**
     * Format a horsepower applying a mask.
     *
     * @param  string $phone The phone number. Only digits.
     * @return string The formatted phone.
     */
    function mask_potencia($value)
    {
        return vsprintf("%s cv", $value);
    }
}



if (!function_exists('twitter_link')) {

    /**
     * Gets the full twitter link of a given handle.
     *
     * @param  string $handle The nickname
     * @return string The full twitter link.
     */
    function twitter_link($handle)
    {
        return 'https://twitter.com/' . $handle;
    }
}

if (!function_exists('parse_audit')) {

    /**
     * Parse the name and value for audits.
     *
     * @param  array modified values
     * @return array parsed modifed values.
     */
    function parse_audit($modified)
    {
        foreach($modified as $key => $item){
            if($key == 'status_id'){
                $modified['status'] = [
                    'new' => App\Status::where('id', $item['new'])->first()->nome,
                    'old' => App\Status::where('id', $item['old'])->first()->nome,
                ];
                unset($modified['status_id']);
            }
            if($key == 'endereco_id'){
                $modified['endereco'] = [
                    'new' => App\Endereco::where('id', $item['new'])->first()->logradouro,
                    'old' => App\Endereco::where('id', $item['old'])->first()->logradouro,
                ];
                unset($modified['status_id']);
            }
        }
        return $modified;
    }
}


if (!function_exists('get_gravatar')) {

    /**
     * Get either a Gravatar URL or complete image tag for a specified email address.
     *
     * @param string $email The email address
     * @param string $s Size in pixels, defaults to 80px [ 1 - 2048 ]
     * @param string $d Default imageset to use [ 404 | mm | identicon | monsterid | wavatar ]
     * @param string $r Maximum rating (inclusive) [ g | pg | r | x ]
     * @param boole $img True to return a complete IMG tag False for just the URL
     * @param array $atts Optional, additional key/value attributes to include in the IMG tag
     * @return String containing either just a URL or a complete image tag
     * @source https://gravatar.com/site/implement/images/php/
     */
    function get_gravatar( $email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array() ) {
        $url = 'https://www.gravatar.com/avatar/';
        $url .= md5( strtolower( trim( $email ) ) );
        $url .= "?s=$s&d=$d&r=$r";
        if ( $img ) {
            $url = '<img src="' . $url . '"';
            foreach ( $atts as $key => $val )
                $url .= ' ' . $key . '="' . $val . '"';
            $url .= ' />';
        }
        return $url;
    }
}

if (!function_exists('instagram_link')) {

    /**
     * Gets the full instagram link of a given handle.
     *
     * @param  string $handle The nickname
     * @return string The full instagram link.
     */
    function instagram_link($handle)
    {
        return 'https://www.instagram.com/' . $handle;
    }
}

if (!function_exists('linkedin_link')) {

    /**
     * Gets the full linkedin link of a given handle.
     *
     * @param  string $handle The nickname
     * @return string The full linkedin link.
     */
    function linkedin_link($handle)
    {
        return 'https://linkedin.com/in/' . $handle;
    }
}

if (!function_exists('order_link')) {

    /**
     * Get the ordering link for the given route and column.
     *
     * @param  string $route The route name.
     * @param  string $column The column name.
     * @param  string $prefix The ordering params prefix.
     * @return string The ordering link.
     */
    function order_link($route, $column, $prefix = '')
    {
        $order = order_get($column, $prefix) === 'asc' ? 'desc' : 'asc';
        $params = array_merge(request()->all(), [
           $prefix . 'orderby' => $column,
           $prefix . 'order' => $order,
        ]);
        return route($route, $params);
    }
}

if (!function_exists('order_get')) {

    /**
     * Get current ordering direction for the given column.
     *
     * @param  string $column The column name.
     * @param  string $prefix The ordering params prefix.
     * @return string The ordering direction.
     */
    function order_get($column, $prefix = '')
    {
        return request($prefix . 'orderby') === $column ? request($prefix . 'order', 'asc') : null;
    }
}

if (!function_exists('get_numerics')) {

    /**
     * Format a phone number applying a mask.
     *
     * @param  string $phone The phone number. Only digits.
     * @return string The formatted phone.
     */
    function get_numerics($value) {
        preg_match_all('/\d+/', $value, $matches);
        return $matches[0][0];
    }
}


if (!function_exists('dateDifference')) {
    /**
     * @param Date $date_1 format dd/mm/AAAA
     * @param Date $date_2 format dd/mm/AAAA
     * @return Integer 
     */
    function dateDifference($date_1, $date_2, $differenceFormat = '%a' )
    {
        $formatDate1 = convertDate($date_1);
        $formatDate2 = convertDate($date_2);


        $datetime1 = date_create($formatDate1);
        $datetime2 = date_create($formatDate2);
        
        $interval = date_diff($datetime1, $datetime2);
        
        return $interval->format($differenceFormat);
        
    }
}

if (!function_exists('convertDate')) {
    function ConvertDate($date) {
        $format = explode('/', $date);
        return $format[2].'-'.$format[1].'-'.$format[0];
    }
}

if (!function_exists('makeDate')) {
    function makeDate($days = 30, $operator = '-', $format = 'Y-m-d') {
        switch($operator) {
            case '-':
                return date($format, strtotime('-'.$days.' days'));
            break;

            case '+':
                return date($format, strtotime('+'.$days.' days'));
            break;
        }
    }
}

if (!function_exists('getAno')) {
    function getAno($anos = array()) {
        $ano = date('Y');
        $i = 1;
        while ($i < 5) {
            $anos[] = $ano+$i;
            $i++;
        }
        return $anos;
    }
}


if (!function_exists('getGender')) {
    function getGender($gender) {
        $gender = strtolower($gender);
        switch ($gender) {
            case 'm':
                return 'Masculino';
            break;
            
            case 'f':
                return 'Feminino';
            break;

            default:
                return '-'   ;
            break;    

        }
    }
}

if (!function_exists('slugfy')) {
    function slugfy($string) {
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string)));
    }
}

if (!function_exists('removeAccents')) {
    function removeAccents($string)
    {
        if (!preg_match('/[\x80-\xff]/', $string))
            return $string;

        $chars = array(
            // Decompositions for Latin-1 Supplement
            chr(195) . chr(128) => 'A', chr(195) . chr(129) => 'A',
            chr(195) . chr(130) => 'A', chr(195) . chr(131) => 'A',
            chr(195) . chr(132) => 'A', chr(195) . chr(133) => 'A',
            chr(195) . chr(135) => 'C', chr(195) . chr(136) => 'E',
            chr(195) . chr(137) => 'E', chr(195) . chr(138) => 'E',
            chr(195) . chr(139) => 'E', chr(195) . chr(140) => 'I',
            chr(195) . chr(141) => 'I', chr(195) . chr(142) => 'I',
            chr(195) . chr(143) => 'I', chr(195) . chr(145) => 'N',
            chr(195) . chr(146) => 'O', chr(195) . chr(147) => 'O',
            chr(195) . chr(148) => 'O', chr(195) . chr(149) => 'O',
            chr(195) . chr(150) => 'O', chr(195) . chr(153) => 'U',
            chr(195) . chr(154) => 'U', chr(195) . chr(155) => 'U',
            chr(195) . chr(156) => 'U', chr(195) . chr(157) => 'Y',
            chr(195) . chr(159) => 's', chr(195) . chr(160) => 'a',
            chr(195) . chr(161) => 'a', chr(195) . chr(162) => 'a',
            chr(195) . chr(163) => 'a', chr(195) . chr(164) => 'a',
            chr(195) . chr(165) => 'a', chr(195) . chr(167) => 'c',
            chr(195) . chr(168) => 'e', chr(195) . chr(169) => 'e',
            chr(195) . chr(170) => 'e', chr(195) . chr(171) => 'e',
            chr(195) . chr(172) => 'i', chr(195) . chr(173) => 'i',
            chr(195) . chr(174) => 'i', chr(195) . chr(175) => 'i',
            chr(195) . chr(177) => 'n', chr(195) . chr(178) => 'o',
            chr(195) . chr(179) => 'o', chr(195) . chr(180) => 'o',
            chr(195) . chr(181) => 'o', chr(195) . chr(182) => 'o',
            chr(195) . chr(182) => 'o', chr(195) . chr(185) => 'u',
            chr(195) . chr(186) => 'u', chr(195) . chr(187) => 'u',
            chr(195) . chr(188) => 'u', chr(195) . chr(189) => 'y',
            chr(195) . chr(191) => 'y',
            // Decompositions for Latin Extended-A
            chr(196) . chr(128) => 'A', chr(196) . chr(129) => 'a',
            chr(196) . chr(130) => 'A', chr(196) . chr(131) => 'a',
            chr(196) . chr(132) => 'A', chr(196) . chr(133) => 'a',
            chr(196) . chr(134) => 'C', chr(196) . chr(135) => 'c',
            chr(196) . chr(136) => 'C', chr(196) . chr(137) => 'c',
            chr(196) . chr(138) => 'C', chr(196) . chr(139) => 'c',
            chr(196) . chr(140) => 'C', chr(196) . chr(141) => 'c',
            chr(196) . chr(142) => 'D', chr(196) . chr(143) => 'd',
            chr(196) . chr(144) => 'D', chr(196) . chr(145) => 'd',
            chr(196) . chr(146) => 'E', chr(196) . chr(147) => 'e',
            chr(196) . chr(148) => 'E', chr(196) . chr(149) => 'e',
            chr(196) . chr(150) => 'E', chr(196) . chr(151) => 'e',
            chr(196) . chr(152) => 'E', chr(196) . chr(153) => 'e',
            chr(196) . chr(154) => 'E', chr(196) . chr(155) => 'e',
            chr(196) . chr(156) => 'G', chr(196) . chr(157) => 'g',
            chr(196) . chr(158) => 'G', chr(196) . chr(159) => 'g',
            chr(196) . chr(160) => 'G', chr(196) . chr(161) => 'g',
            chr(196) . chr(162) => 'G', chr(196) . chr(163) => 'g',
            chr(196) . chr(164) => 'H', chr(196) . chr(165) => 'h',
            chr(196) . chr(166) => 'H', chr(196) . chr(167) => 'h',
            chr(196) . chr(168) => 'I', chr(196) . chr(169) => 'i',
            chr(196) . chr(170) => 'I', chr(196) . chr(171) => 'i',
            chr(196) . chr(172) => 'I', chr(196) . chr(173) => 'i',
            chr(196) . chr(174) => 'I', chr(196) . chr(175) => 'i',
            chr(196) . chr(176) => 'I', chr(196) . chr(177) => 'i',
            chr(196) . chr(178) => 'IJ', chr(196) . chr(179) => 'ij',
            chr(196) . chr(180) => 'J', chr(196) . chr(181) => 'j',
            chr(196) . chr(182) => 'K', chr(196) . chr(183) => 'k',
            chr(196) . chr(184) => 'k', chr(196) . chr(185) => 'L',
            chr(196) . chr(186) => 'l', chr(196) . chr(187) => 'L',
            chr(196) . chr(188) => 'l', chr(196) . chr(189) => 'L',
            chr(196) . chr(190) => 'l', chr(196) . chr(191) => 'L',
            chr(197) . chr(128) => 'l', chr(197) . chr(129) => 'L',
            chr(197) . chr(130) => 'l', chr(197) . chr(131) => 'N',
            chr(197) . chr(132) => 'n', chr(197) . chr(133) => 'N',
            chr(197) . chr(134) => 'n', chr(197) . chr(135) => 'N',
            chr(197) . chr(136) => 'n', chr(197) . chr(137) => 'N',
            chr(197) . chr(138) => 'n', chr(197) . chr(139) => 'N',
            chr(197) . chr(140) => 'O', chr(197) . chr(141) => 'o',
            chr(197) . chr(142) => 'O', chr(197) . chr(143) => 'o',
            chr(197) . chr(144) => 'O', chr(197) . chr(145) => 'o',
            chr(197) . chr(146) => 'OE', chr(197) . chr(147) => 'oe',
            chr(197) . chr(148) => 'R', chr(197) . chr(149) => 'r',
            chr(197) . chr(150) => 'R', chr(197) . chr(151) => 'r',
            chr(197) . chr(152) => 'R', chr(197) . chr(153) => 'r',
            chr(197) . chr(154) => 'S', chr(197) . chr(155) => 's',
            chr(197) . chr(156) => 'S', chr(197) . chr(157) => 's',
            chr(197) . chr(158) => 'S', chr(197) . chr(159) => 's',
            chr(197) . chr(160) => 'S', chr(197) . chr(161) => 's',
            chr(197) . chr(162) => 'T', chr(197) . chr(163) => 't',
            chr(197) . chr(164) => 'T', chr(197) . chr(165) => 't',
            chr(197) . chr(166) => 'T', chr(197) . chr(167) => 't',
            chr(197) . chr(168) => 'U', chr(197) . chr(169) => 'u',
            chr(197) . chr(170) => 'U', chr(197) . chr(171) => 'u',
            chr(197) . chr(172) => 'U', chr(197) . chr(173) => 'u',
            chr(197) . chr(174) => 'U', chr(197) . chr(175) => 'u',
            chr(197) . chr(176) => 'U', chr(197) . chr(177) => 'u',
            chr(197) . chr(178) => 'U', chr(197) . chr(179) => 'u',
            chr(197) . chr(180) => 'W', chr(197) . chr(181) => 'w',
            chr(197) . chr(182) => 'Y', chr(197) . chr(183) => 'y',
            chr(197) . chr(184) => 'Y', chr(197) . chr(185) => 'Z',
            chr(197) . chr(186) => 'z', chr(197) . chr(187) => 'Z',
            chr(197) . chr(188) => 'z', chr(197) . chr(189) => 'Z',
            chr(197) . chr(190) => 'z', chr(197) . chr(191) => 's'
        );

        $string = strtr($string, $chars);

        return $string;
    }
}