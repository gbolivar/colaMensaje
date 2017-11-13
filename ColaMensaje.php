<?php 

if ( @count($argv)<2 ) { 
        echo "Usage: $argv[0] stat|send|receive|remove msgType MSG [msg] \n\n" ; 
        echo "   EX: $argv[0] send 1 \"Esto no es 1\" \n" ; 
        echo "       $argv[0] receive ID \n" ; 
        echo "       $argv[0] stat \n" ; 
        echo "       $argv[0] remove \n" ; 
        exit; 
} 

$MSGKey = "123456" ; 

## Crear o adjuntar a una cola de mensajes 
$seg = msg_get_queue($MSGKey,0600) ; 

switch ( $argv[1] ) { 
    case "send": 
        msg_send($seg, $argv[2], $argv[3], true, true); 
        echo "msg_send cola ".$argv[2]." hecho ...\n" ; 
        break; 
        
    case "receive": 
        $stat = msg_stat_queue( $seg ); 
        echo 'Mensajes en la cola: '.$stat['msg_qnum']."\n"; 
        if ( $stat['msg_qnum']>0 ) { 
            msg_receive($seg, @$argv[2], $msgtype, 1024, $data); 
            var_dump($msgtype); 
            var_dump($data); 
            echo "\n"; 
        } 
        else { 
            echo "No Se encontro el mensaje ...\n"; 
        } 
        break; 
    
    case "stat": 
      print_r( msg_stat_queue($seg) ); 
    break; 
        
    case "remove": 
        msg_remove_queue($seg); 
    break; 
} 
