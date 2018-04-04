<?php

$tr = "";
$tr_total = "";
$url = URL .'employees/';
if( !empty($this->results['items']) ){ 

    $seq = 0;
    foreach ($this->results['items'] as $i => $item) { 

        $cls = $i%2 ? 'even' : "odd";
        
        $tr .= '<tr class="'.$cls.'" data-id="'.$item['id'].'">'.

            '<td class="check"><label class="checkbox"><input id="toggle_checkbox"'. (!empty($item['enabled'])?' checked':'') .' type="checkbox" value="'.$item['id'].'"></label></td>'.

            '<td class="name">'. $item['name']. '</td>'.

            '<td class="actions">'. '</td>'.
              
        '</tr>';
        
    }
}

$table = '<table class="settings-table"><tbody>'. $tr. '</tbody>'.$tr_total.'</table>';