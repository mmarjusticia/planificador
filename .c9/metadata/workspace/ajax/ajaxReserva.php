{"filter":false,"title":"ajaxReserva.php","tooltip":"/ajax/ajaxReserva.php","undoManager":{"mark":100,"position":100,"stack":[[{"start":{"row":20,"column":9},"end":{"row":20,"column":46},"action":"remove","lines":["$reserva2= new Reserva($id,$email,0);"],"id":720}],[{"start":{"row":22,"column":7},"end":{"row":22,"column":40},"action":"remove","lines":["  $gestorReserva->set($reserva2);"],"id":721}],[{"start":{"row":32,"column":38},"end":{"row":33,"column":0},"action":"insert","lines":["",""],"id":722},{"start":{"row":33,"column":0},"end":{"row":33,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":33,"column":4},"end":{"row":70,"column":13},"action":"insert","lines":["$origen='mmarjusticia@gmail.com';","            $destino=''.$e.'';","            $asunto=\"Reserva del pabellón municipal\";","            $mensaje=\"se le ha asignado una cita el día \".$d.\"  a las \".$hora.\"horas\";","            require_once '../clases/Google/autoload.php';","            require_once '../clases/class.phpmailer.php';  //las últimas versiones también vienen con autoload","            $cliente = new Google_Client();","            $cliente->setApplicationName('enviarCorreoDesdeGmail');","            $cliente->setClientId('505098225843-sdiumqfakj929lle3rugldjv72ojkpgi.apps.googleusercontent.com');","            $cliente->setClientSecret('dvjJ435G5shs2um5ZG_vVeBs');","            $cliente->setRedirectUri('https://planificador-mmarjusticia.c9users.io/oauth/guardar.php');","            $cliente->setScopes('https://www.googleapis.com/auth/gmail.compose');","            $cliente->setAccessToken(file_get_contents('../oauth/token.conf'));","        if ($cliente->getAccessToken()) {","             $service = new Google_Service_Gmail($cliente);","            try {","                $mail = new PHPMailer();","                $mail->CharSet = \"UTF-8\";","                $mail->From = $origen;","                $mail->FromName = $destino;","                $mail->AddAddress($destino);","                $mail->AddReplyTo($origen, $destino);","                $mail->Subject = $asunto;","                $mail->Body = $mensaje;","                $mail->preSend();","                $mime = $mail->getSentMIMEMessage();","                $mime = rtrim(strtr(base64_encode($mime), '+/', '-_'), '=');","                $mensaje = new Google_Service_Gmail_Message();","                $mensaje->setRaw($mime);","                $service->users_messages->send('me', $mensaje);","                echo $ok;","                } catch (Exception $e) {","                        print($e->getMessage());","                }   ","            }","        else{","            echo $error;","            }"],"id":723}],[{"start":{"row":34,"column":24},"end":{"row":34,"column":26},"action":"remove","lines":["$e"],"id":724},{"start":{"row":34,"column":24},"end":{"row":34,"column":29},"action":"insert","lines":["email"]}],[{"start":{"row":34,"column":24},"end":{"row":34,"column":25},"action":"insert","lines":["$"],"id":725}],[{"start":{"row":13,"column":35},"end":{"row":14,"column":0},"action":"insert","lines":["",""],"id":726}],[{"start":{"row":14,"column":0},"end":{"row":30,"column":18},"action":"insert","lines":["$dia=substr($id,0, 1);","$hora=substr($id,1,2);","if($dia=='l'){","    $d='lunes';}","if($dia=='m'){","    $d='martes';}","if($dia=='x'){","    $d='miercoles';}","if($dia=='j'){","    $d=='jueves';","}","if($dia=='v'){","    $d='viernes';}","if($dia=='s'){","    $d='sábado';}","if($dia=='d'){","    $d='domingo';}"],"id":727}],[{"start":{"row":33,"column":50},"end":{"row":34,"column":0},"action":"insert","lines":["",""],"id":728}],[{"start":{"row":34,"column":0},"end":{"row":34,"column":50},"action":"insert","lines":["$propia=json_encode(array('reserva' => 'propia'));"],"id":729}],[{"start":{"row":34,"column":1},"end":{"row":34,"column":7},"action":"remove","lines":["propia"],"id":730},{"start":{"row":34,"column":1},"end":{"row":34,"column":2},"action":"insert","lines":["e"]}],[{"start":{"row":34,"column":2},"end":{"row":34,"column":3},"action":"insert","lines":["r"],"id":731}],[{"start":{"row":34,"column":3},"end":{"row":34,"column":4},"action":"insert","lines":["r"],"id":732}],[{"start":{"row":34,"column":4},"end":{"row":34,"column":5},"action":"insert","lines":["o"],"id":733}],[{"start":{"row":34,"column":5},"end":{"row":34,"column":6},"action":"insert","lines":["r"],"id":734}],[{"start":{"row":34,"column":39},"end":{"row":34,"column":45},"action":"remove","lines":["propia"],"id":735},{"start":{"row":34,"column":39},"end":{"row":34,"column":40},"action":"insert","lines":["e"]}],[{"start":{"row":34,"column":40},"end":{"row":34,"column":41},"action":"insert","lines":["r"],"id":736}],[{"start":{"row":34,"column":41},"end":{"row":34,"column":42},"action":"insert","lines":["r"],"id":737}],[{"start":{"row":34,"column":42},"end":{"row":34,"column":43},"action":"insert","lines":["o"],"id":738}],[{"start":{"row":34,"column":43},"end":{"row":34,"column":44},"action":"insert","lines":["r"],"id":739}],[{"start":{"row":81,"column":22},"end":{"row":81,"column":24},"action":"remove","lines":["ok"],"id":740},{"start":{"row":81,"column":22},"end":{"row":81,"column":23},"action":"insert","lines":["n"]}],[{"start":{"row":81,"column":23},"end":{"row":81,"column":24},"action":"insert","lines":["o"],"id":741}],[{"start":{"row":48,"column":5},"end":{"row":48,"column":13},"action":"remove","lines":["cho $no;"],"id":742}],[{"start":{"row":48,"column":4},"end":{"row":48,"column":5},"action":"remove","lines":["e"],"id":743}],[{"start":{"row":37,"column":30},"end":{"row":38,"column":9},"action":"remove","lines":["","         "],"id":744}],[{"start":{"row":38,"column":37},"end":{"row":39,"column":0},"action":"insert","lines":["",""],"id":745},{"start":{"row":39,"column":0},"end":{"row":39,"column":9},"action":"insert","lines":["         "]}],[{"start":{"row":39,"column":9},"end":{"row":76,"column":13},"action":"insert","lines":[" $origen='mmarjusticia@gmail.com';","            $destino=''.$email.'';","            $asunto=\"Reserva del pabellón municipal\";","            $mensaje=\"se le ha asignado una cita el día \".$d.\"  a las \".$hora.\"horas\";","            require_once '../clases/Google/autoload.php';","            require_once '../clases/class.phpmailer.php';  //las últimas versiones también vienen con autoload","            $cliente = new Google_Client();","            $cliente->setApplicationName('enviarCorreoDesdeGmail');","            $cliente->setClientId('505098225843-sdiumqfakj929lle3rugldjv72ojkpgi.apps.googleusercontent.com');","            $cliente->setClientSecret('dvjJ435G5shs2um5ZG_vVeBs');","            $cliente->setRedirectUri('https://planificador-mmarjusticia.c9users.io/oauth/guardar.php');","            $cliente->setScopes('https://www.googleapis.com/auth/gmail.compose');","            $cliente->setAccessToken(file_get_contents('../oauth/token.conf'));","        if ($cliente->getAccessToken()) {","             $service = new Google_Service_Gmail($cliente);","            try {","                $mail = new PHPMailer();","                $mail->CharSet = \"UTF-8\";","                $mail->From = $origen;","                $mail->FromName = $destino;","                $mail->AddAddress($destino);","                $mail->AddReplyTo($origen, $destino);","                $mail->Subject = $asunto;","                $mail->Body = $mensaje;","                $mail->preSend();","                $mime = $mail->getSentMIMEMessage();","                $mime = rtrim(strtr(base64_encode($mime), '+/', '-_'), '=');","                $mensaje = new Google_Service_Gmail_Message();","                $mensaje->setRaw($mime);","                $service->users_messages->send('me', $mensaje);","                echo $no;","                } catch (Exception $e) {","                        print($e->getMessage());","                }   ","            }","        else{","            echo $error;","            }"],"id":746}],[{"start":{"row":41,"column":21},"end":{"row":41,"column":22},"action":"insert","lines":["C"],"id":747}],[{"start":{"row":41,"column":22},"end":{"row":41,"column":23},"action":"insert","lines":["a"],"id":748}],[{"start":{"row":41,"column":23},"end":{"row":41,"column":24},"action":"insert","lines":["n"],"id":749}],[{"start":{"row":41,"column":23},"end":{"row":41,"column":24},"action":"remove","lines":["n"],"id":750}],[{"start":{"row":41,"column":22},"end":{"row":41,"column":23},"action":"remove","lines":["a"],"id":751}],[{"start":{"row":41,"column":22},"end":{"row":41,"column":23},"action":"insert","lines":["A"],"id":752}],[{"start":{"row":41,"column":23},"end":{"row":41,"column":24},"action":"insert","lines":["N"],"id":753}],[{"start":{"row":41,"column":24},"end":{"row":41,"column":25},"action":"insert","lines":["C"],"id":754}],[{"start":{"row":41,"column":25},"end":{"row":41,"column":26},"action":"insert","lines":["E"],"id":755}],[{"start":{"row":41,"column":26},"end":{"row":41,"column":27},"action":"insert","lines":["L"],"id":756}],[{"start":{"row":41,"column":27},"end":{"row":41,"column":28},"action":"insert","lines":["A"],"id":757}],[{"start":{"row":41,"column":28},"end":{"row":41,"column":29},"action":"insert","lines":["C"],"id":758}],[{"start":{"row":41,"column":29},"end":{"row":41,"column":30},"action":"insert","lines":["I"],"id":759}],[{"start":{"row":41,"column":30},"end":{"row":41,"column":31},"action":"insert","lines":["Ó"],"id":760}],[{"start":{"row":41,"column":31},"end":{"row":41,"column":32},"action":"insert","lines":["N"],"id":761}],[{"start":{"row":41,"column":32},"end":{"row":41,"column":33},"action":"insert","lines":[" "],"id":762}],[{"start":{"row":41,"column":33},"end":{"row":41,"column":34},"action":"insert","lines":["D"],"id":763}],[{"start":{"row":41,"column":34},"end":{"row":41,"column":35},"action":"insert","lines":["E"],"id":764}],[{"start":{"row":41,"column":35},"end":{"row":41,"column":36},"action":"insert","lines":[" "],"id":765}],[{"start":{"row":41,"column":36},"end":{"row":41,"column":37},"action":"remove","lines":["R"],"id":766}],[{"start":{"row":41,"column":36},"end":{"row":41,"column":37},"action":"remove","lines":["e"],"id":767}],[{"start":{"row":41,"column":36},"end":{"row":41,"column":37},"action":"remove","lines":["s"],"id":768}],[{"start":{"row":41,"column":36},"end":{"row":41,"column":37},"action":"remove","lines":["e"],"id":769}],[{"start":{"row":41,"column":36},"end":{"row":41,"column":37},"action":"remove","lines":["r"],"id":770}],[{"start":{"row":41,"column":36},"end":{"row":41,"column":37},"action":"remove","lines":["v"],"id":771}],[{"start":{"row":41,"column":36},"end":{"row":41,"column":37},"action":"remove","lines":["a"],"id":772}],[{"start":{"row":41,"column":36},"end":{"row":41,"column":37},"action":"insert","lines":["R"],"id":773}],[{"start":{"row":41,"column":37},"end":{"row":41,"column":38},"action":"insert","lines":["E"],"id":774}],[{"start":{"row":41,"column":38},"end":{"row":41,"column":39},"action":"insert","lines":["S"],"id":775}],[{"start":{"row":41,"column":39},"end":{"row":41,"column":40},"action":"insert","lines":["E"],"id":776}],[{"start":{"row":41,"column":40},"end":{"row":41,"column":41},"action":"insert","lines":["R"],"id":777}],[{"start":{"row":41,"column":41},"end":{"row":41,"column":42},"action":"insert","lines":["V"],"id":778}],[{"start":{"row":41,"column":42},"end":{"row":41,"column":43},"action":"insert","lines":["A"],"id":779}],[{"start":{"row":42,"column":25},"end":{"row":42,"column":38},"action":"remove","lines":["le ha asignad"],"id":780}],[{"start":{"row":42,"column":24},"end":{"row":42,"column":25},"action":"remove","lines":[" "],"id":781}],[{"start":{"row":42,"column":23},"end":{"row":42,"column":24},"action":"remove","lines":["e"],"id":782}],[{"start":{"row":42,"column":22},"end":{"row":42,"column":23},"action":"remove","lines":["s"],"id":783}],[{"start":{"row":42,"column":22},"end":{"row":42,"column":23},"action":"insert","lines":["H"],"id":784}],[{"start":{"row":42,"column":23},"end":{"row":42,"column":24},"action":"insert","lines":["A"],"id":785}],[{"start":{"row":42,"column":23},"end":{"row":42,"column":24},"action":"remove","lines":["A"],"id":786}],[{"start":{"row":42,"column":23},"end":{"row":42,"column":24},"action":"insert","lines":["a"],"id":787}],[{"start":{"row":42,"column":24},"end":{"row":42,"column":25},"action":"insert","lines":[" "],"id":788}],[{"start":{"row":42,"column":25},"end":{"row":42,"column":26},"action":"insert","lines":["c"],"id":789}],[{"start":{"row":42,"column":26},"end":{"row":42,"column":27},"action":"insert","lines":["a"],"id":790}],[{"start":{"row":42,"column":27},"end":{"row":42,"column":28},"action":"insert","lines":["n"],"id":791}],[{"start":{"row":42,"column":28},"end":{"row":42,"column":29},"action":"insert","lines":["c"],"id":792}],[{"start":{"row":42,"column":29},"end":{"row":42,"column":30},"action":"insert","lines":["e"],"id":793}],[{"start":{"row":42,"column":30},"end":{"row":42,"column":31},"action":"insert","lines":["l"],"id":794}],[{"start":{"row":42,"column":31},"end":{"row":42,"column":32},"action":"insert","lines":["a"],"id":795}],[{"start":{"row":42,"column":32},"end":{"row":42,"column":33},"action":"insert","lines":["s"],"id":796}],[{"start":{"row":42,"column":32},"end":{"row":42,"column":33},"action":"remove","lines":["s"],"id":797}],[{"start":{"row":42,"column":32},"end":{"row":42,"column":33},"action":"insert","lines":["d"],"id":798}],[{"start":{"row":42,"column":33},"end":{"row":42,"column":34},"action":"insert","lines":["p"],"id":799}],[{"start":{"row":42,"column":33},"end":{"row":42,"column":34},"action":"remove","lines":["p"],"id":800}],[{"start":{"row":42,"column":33},"end":{"row":42,"column":34},"action":"insert","lines":["o"],"id":801}],[{"start":{"row":42,"column":34},"end":{"row":42,"column":35},"action":"insert","lines":[" "],"id":802}],[{"start":{"row":42,"column":35},"end":{"row":42,"column":36},"action":"insert","lines":["l"],"id":803}],[{"start":{"row":42,"column":36},"end":{"row":42,"column":37},"action":"insert","lines":["a"],"id":804}],[{"start":{"row":42,"column":37},"end":{"row":42,"column":38},"action":"insert","lines":[" "],"id":805}],[{"start":{"row":42,"column":38},"end":{"row":42,"column":39},"action":"remove","lines":["o"],"id":806}],[{"start":{"row":42,"column":38},"end":{"row":42,"column":39},"action":"remove","lines":[" "],"id":807}],[{"start":{"row":42,"column":38},"end":{"row":42,"column":39},"action":"remove","lines":["u"],"id":808}],[{"start":{"row":42,"column":38},"end":{"row":42,"column":39},"action":"remove","lines":["n"],"id":809}],[{"start":{"row":42,"column":38},"end":{"row":42,"column":39},"action":"remove","lines":["a"],"id":810}],[{"start":{"row":42,"column":38},"end":{"row":42,"column":39},"action":"remove","lines":[" "],"id":811}],[{"start":{"row":69,"column":22},"end":{"row":69,"column":24},"action":"remove","lines":["no"],"id":812},{"start":{"row":69,"column":22},"end":{"row":69,"column":23},"action":"insert","lines":["p"]}],[{"start":{"row":69,"column":23},"end":{"row":69,"column":24},"action":"insert","lines":["r"],"id":813}],[{"start":{"row":69,"column":24},"end":{"row":69,"column":25},"action":"insert","lines":["o"],"id":814}],[{"start":{"row":69,"column":25},"end":{"row":69,"column":26},"action":"insert","lines":["p"],"id":815}],[{"start":{"row":69,"column":26},"end":{"row":69,"column":27},"action":"insert","lines":["i"],"id":816}],[{"start":{"row":69,"column":27},"end":{"row":69,"column":28},"action":"insert","lines":["a"],"id":817}],[{"start":{"row":78,"column":8},"end":{"row":78,"column":21},"action":"remove","lines":["echo $propia;"],"id":818}],[{"start":{"row":42,"column":46},"end":{"row":42,"column":49},"action":"remove","lines":["día"],"id":819}],[{"start":{"row":91,"column":52},"end":{"row":91,"column":55},"action":"remove","lines":["día"],"id":820}]]},"ace":{"folds":[],"scrolltop":1415.5555930549726,"scrollleft":0,"selection":{"start":{"row":91,"column":52},"end":{"row":91,"column":52},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":302,"mode":"ace/mode/php"}},"timestamp":1456074634000,"hash":"581f4986961ea5f12c720382c366ab680ea11680"}