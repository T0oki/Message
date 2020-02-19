<?php

namespace App;

class Message
{
    public static function get(){
        $db = Database::database();
        $req = $db->query("SELECT nick, message FROM message ORDER BY id DESC");
        $rows = array();
        while($r = $req->fetch()) {
            unset($r[0]);
            unset($r[1]);
            $rows[] = $r;
        }
        print json_encode($rows);
    }
    public static function poste($nick, $message) {
        $nick = ($nick == "") ? "<i> - Anonyme</i>" : htmlspecialchars($nick);
        if ($message !== "") {
            $db = Database::database();
            $req = $db->prepare('INSERT INTO message(nick, message, ip) VALUES(:nick, :message, :ip)');
            $req->execute(array(
                'nick' => $nick,
                'message' => htmlspecialchars($message),
                'ip' => Tracker::getIP()
            ));
        }
        echo "sended";
    }
}