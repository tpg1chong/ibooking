<?php

$tr = "";
$tr_total = "";
if( !empty($this->results['lists']) ){ 

    $seq = 0;
    foreach ($this->results['lists'] as $i => $item) { 

        $cls = $i%2 ? 'even' : "odd";
        // set Name

        $image = '';
        if( !empty($item['image_url']) ){
            $image = '<div class="pic lfloat mrm" style="width: 168px;height: 94px;background-color: #b7b7b7;" data-plugins="prograssiveImage" data-options="'.$this->fn->stringify( array( 'url'=>$item['image_url'], '$scroll' => '.listpage2-container [role=main]' ) ).'"></div>';
        }
        else{
            $image = '<div class="pic lfloat mrm" style="width: 168px;height: 94px;background-color: #b7b7b7;"></div>';
        }
        


        $tr .= '<tr class="'.$cls.'" data-id="'.$item['id'].'">'.

            '<td class="check-box"><label class="checkbox"><input id="toggle_checkbox" type="checkbox" value="'.$item['id'].'"></label></td>'.

            '<td class="name">'. 

                $image.
                '<div>'.
                    // '<div class="fcg fsm">'.$item['forum_name'].'</div>'.
                    // '<div class="fwb"><a href="'.URL.'manage/blog/edit/'.$item['id'].'">'.$item['title'].'</a></div>'.
                '</div>'.

            '</td>'.

            '<td class="status">'. (!empty( $item['partner'] ) ? $item['partner']: '-') .'</td>'.
            
            '<td class="status">'. (!empty( $item['email'] ) ? $item['email']: '-') .'</td>'.
            '<td class="status">'. (!empty( $item['phone'] ) ? $item['phone']: '-') .'</td>'.

            '<td class="status"><label class="checkbox"><input type="checkbox"></label></td>'.

            '<td class="actions"><div class="whitespace">'.

                '<span class="gbtn"><a class="btn" title="Edit" data-plugins="lightbox" href="'.$this->pageURL.'edit/'.$item['id'].'"><i class="icon-pencil"></i></a></span>'.
                '<span class="gbtn"><a class="btn" title="Remove" data-plugins="lightbox" href="'.$this->pageURL.'del/'.$item['id'].'"><i class="icon-trash"></i></a></span>'.


            '</div></td>'.

        '</tr>';
        
    }
}

$table = '<table><tbody>'. $tr. '</tbody>'.$tr_total.'</table>';