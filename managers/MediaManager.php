<?php 

class MediaManager extends AbstractManager{

    public function findAll() : array
    {
        $query = $this->db->prepare('SELECT * FROM media');
        $query->execute();
        $media = $query->fetchAll(PDO::FETCH_ASSOC);
        
        return $media;
    }

    public function getMediaById(int $id) : Media
    {
        $query = $this->db->prepare('SELECT * FROM media WHERE id = :id');
        
        $parameters = [
        'id' => $id
        ];
        
        $query->execute($parameters);
        
        $media = $query->fetch(PDO::FETCH_ASSOC);
        
        $newMedia= new Media($media['type'], $media['filename'], $media['url']);
        
        $newMedia->setId($media['id']);
        
        return $newMedia;
    }
    
    public function insertMedia(Media $media) : Media
    {
        $query = $this->db->prepare('INSERT INTO media VALUES(:id, :type, :filename, :url)');
        
        $parameters = [
        'id' => null,
        'type' => $media->getType(),
        'filename' => $media->getName(),
        'url' => $media->getUrl()
        ];
        
        $query->execute($parameters);
        
        $id = $this->db->LastInsertId();
        $media->setId($id);

        $newMedia = $query->fetch(PDO::FETCH_ASSOC);
        return $this->getMediaById($id);
        
    }
    
    public function updateMedia(Media $media) : Media
    {
        $query = $this->db->prepare('UPDATE media SET type = :newType, name = :newName, url = :newUrl WHERE id = :id');
        
        $parameters = [
        'id' => $media->getId(),
        'newType' => $media->getType(),
        'newFormat' => $media->getName(),
        'newUrl' => $media->getUrl()
        ];
        
        $query->execute($parameters);

        return $media;
        
    }

    public function findMediasByArtiicleId(int $id) : array
    {
        $query = $this->db->prepare('SELECT media.* FROM medias JOIN media_artiicles ON media.id = media_articles.id_media JOIN articles ON articles.id = media_articles.id_articles WHERE id_articles = :id');

        $parameters = [

            'id' => $id
        ];

        $query->execute($parameters);

        $medias = $query->fetchAll(PDO::FETCH_ASSOC);

        $mediasArray = [];

        foreach($medias as $media){

            $newMedia = new Media($media['type'], $media['filename'], $media['url']);
            $newMedia->setId($media['id']);
            $mediasArray[] = $newMedia;
        }

        return $mediasArray;
    }

    public function deleteMedia(Media $media) : void
    {
        $query = $this->db->prepare('DELETE FROM media WHERE id = :id');

        $parameters = [

            'id' => $media->getId()
        ];

        $query->execute($parameters);
    }
}