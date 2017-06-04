<?php


class Subscribe extends Model
{
    public function subscribeUser($login)
    {
        $login = $this->db->escape($login);
        $sql = "select * from subscribe where login = '{$login}' limit 1";
        $result = $this->db->query($sql);
        if (isset($result[0])) {
            return $result[0];
        }
        return false;
    }
    public function addSubscribe($form_fields){
        $login=$form_fields['login'];
        $email=$form_fields['email'];
        $sql="
            insert into subscribe
            set login='{$login}',
                email='{$email}',
               ";
        if( $this->db->query($sql)){
            return $this->subbscribe($login);
        }return false;

    }
}