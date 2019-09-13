<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Medias_model extends CI_Model {
    
    const TABLE_MEDIAS = 'medias';
    const TABLE_MEDIAS_PRESTA = 'medias_presta';
    
    
    
    const ID_MEDIA = 'id_media';
    const ID_PRESTA = 'id_presta';
    
    
    public function getAllMediaFromPresta($idPresta) {
        
        $query = $this->db->select()
                ->from(self::TABLE_MEDIAS)                
                ->join(self::TABLE_MEDIAS_PRESTA,'medias_presta.id_media = medias.id_media')
                ->where("medias_presta.id_presta = $idPresta");
        
        $medias = $query->get()->result();
        
        if($medias != null){
            return $medias;
        }else{
            return false;
        }
        
    }
    
}
